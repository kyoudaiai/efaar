<?php

namespace App\Http\Controllers;


use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Storage;
use App\Permission;
use App\PortfolioPhoto;
use Gate;

class PortfolioController extends Controller
{

    use MediaUploadingTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('portfolio.index')->with('portfolios', Portfolio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $portfolio = Portfolio::create([

            'name' => $request->name,
            'introduction' => $request->introduction,
            'video_url' => $request->video_url,
            'description' =>  $request->description,
            'url' =>  $request->url,
        ]);

        if ($request->file('photo'))
            {
                if($portfolio->photo)
                {
                    $portfolio->photo->delete();
                    $portfolio->addMedia($request->file('photo'))->toMediaCollection('photo');
                }
                elseif(!$portfolio->photo)
                {
                    $portfolio->addMedia($request->file('photo'))->toMediaCollection('photo');
                }
            }


        //flash a msg

        session()->flash('success', 'portfolio created successfully');

        //redirect
        return redirect(route('portfolio.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('portfolio.create')->with(['portfolio' => $portfolio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //construct data
        $data = $request->only(['name','description','url', 'introduction', 'video_url']);


        $portfolio->update($data);

        // check if new image delete old one
        if ($request->file('photo'))
        {
            if($portfolio->photo)
            {
                $portfolio->photo->delete();
                $portfolio->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
            elseif(!$portfolio->photo)
            {
                $portfolio->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
        }


        //flash a msg

        session()->flash('success', 'portfolio updated successfully');

        //redirect
        return redirect(route('portfolio.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();


        session()->flash('success', 'portfolio Deleted');

        return redirect(route('portfolio.index'));
    }

    public function portfolio_photos(Portfolio $portfolio) {

        $photos = $portfolio->photos;

        return view('portfolio.photos_index', ['portfolio'=> $portfolio, 'photos' => $photos]);
    }

    public function create_photo(Portfolio $portfolio)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('portfolio.photos_create', ['portfolio'=> $portfolio]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_photo(Portfolio $portfolio, Request $request)
    {

        $portfolioPhoto = $portfolio->photos()->create([
            'name' => $request->name,
            'description' =>  $request->description,
        ]);

        if ($request->file('photo'))
            {
                if($portfolioPhoto->photo)
                {
                    $portfolioPhoto->photo->delete();
                    $portfolioPhoto->addMedia($request->file('photo'))->toMediaCollection('photo');
                }
                elseif(!$portfolioPhoto->photo)
                {
                    $portfolioPhoto->addMedia($request->file('photo'))->toMediaCollection('photo');
                }
            }


        //flash a msg

        session()->flash('success', 'portfolio photo added successfully');

        //redirect
        return redirect(route('portfolio.photos', $portfolio->id));
    }

    public function del_photo(Portfolio $portfolio, PortfolioPhoto $photo)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $portfolioPhoto = PortfolioPhoto::findOrFail($photo->id);

        $portfolioPhoto->delete();


        session()->flash('success', 'portfolio Deleted');

        return redirect(route('portfolio.photos', $portfolio->id));
    }




}
