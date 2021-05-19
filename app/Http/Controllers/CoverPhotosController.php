<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Storage;
use App\Permission;
use App\CoverPhoto;
use Gate;

class CoverPhotosController extends Controller
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

        return view('coverphotos.index')->with('coverphotos', CoverPhoto::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('coverphotos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $coverphoto = CoverPhoto::create([

            'name' => $request->name,
            'description' =>  $request->description,
        ]);

        if ($request->file('photo'))
        {
            if($coverphoto->photo)
            {
                $coverphoto->photo->delete();
                $coverphoto->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
            elseif(!$coverphoto->photo)
            {
                $coverphoto->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
        }


        //flash a msg

        session()->flash('success', 'Cover Photo created successfully');

        //redirect
        return redirect(route('coverphotos.index'));
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
    public function edit(CoverPhoto $coverphoto)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('coverphotos.create')->with(['coverphoto' => $coverphoto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoverPhoto $coverphoto)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //construct data
        $data = $request->only(['name','description']);


        $coverphoto->update($data);

        // check if new image delete old one
        if ($request->file('photo'))
        {
            if($coverphoto->photo)
            {
                $coverphoto->photo->delete();
                $coverphoto->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
            elseif(!$coverphoto->photo)
            {
                $coverphoto->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
        }


        //flash a msg

        session()->flash('success', 'Cover Photo updated successfully');

        //redirect
        return redirect(route('coverphotos.index'));
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
        $coverphoto = CoverPhoto::findOrFail($id);

        $coverphoto->delete();


        session()->flash('success', 'Photo Deleted');

        return redirect(route('coverphotos.index'));
    }


}
