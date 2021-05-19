<?php

namespace App\Http\Controllers;


use App\AboutPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Storage;
use App\Permission;
use Gate;

class AboutPageController extends Controller
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

        return view('aboutpage.create')->with('aboutpage', AboutPage::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('aboutpage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $aboutpage = AboutPage::create([

            'who_we_are' => $request->who_we_are,
            'what_we_do' =>  $request->what_we_do,
            'who_we_are_ar' => $request->who_we_are,
            'what_we_do_ar' =>  $request->what_we_do,
        ]);



        //flash a msg

        session()->flash('success', 'page created successfully');

        //redirect
        return redirect(route('about.index'));
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
    public function edit(AboutPage $aboutPage)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('about.create')->with(['aboutpage' => $aboutPage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //construct data
        $data = $request->only(['who_we_are','what_we_do', 'who_we_are_ar','what_we_do_ar']);

        // dd($data);
        $aboutPage = AboutPage::first();

        $aboutPage->who_we_are = $request->who_we_are;
        $aboutPage->what_we_do = $request->what_we_do;


        $aboutPage->who_we_are_ar = $request->who_we_are_ar;
        $aboutPage->what_we_do_ar = $request->what_we_do_ar;

        $aboutPage->save();




        //flash a msg

        session()->flash('success', 'page updated successfully');

        //redirect
        return view('aboutpage.create')->with('aboutpage', AboutPage::first());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



}
