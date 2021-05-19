<?php

namespace App\Http\Controllers;


use App\Service;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Storage;
use App\Permission;
use Gate;

class ServicesController extends Controller
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

        return view('services.index')->with('services', Service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $service = Service::create([

            'name' => $request->name,
            'description' =>  $request->description,
            'name_ar' => $request->name_ar,
            'description_ar' =>  $request->description_ar,
        ]);

        if ($request->file('photo'))
        {
            if($service->photo)
            {
                $service->photo->delete();
                $service->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
            elseif(!$service->photo)
            {
                $service->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
        }


        //flash a msg

        session()->flash('success', 'service created successfully');

        //redirect
        return redirect(route('services.index'));
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
    public function edit(Service $service)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('services.create')->with(['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //construct data
        $data = $request->only(['name','description', 'name_ar','description_ar']);


        $service->update($data);

        // check if new image delete old one
        if ($request->file('photo'))
        {
            if($service->photo)
            {
                $service->photo->delete();
                $service->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
            elseif(!$service->photo)
            {
                $service->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
        }


        //flash a msg

        session()->flash('success', 'service updated successfully');

        //redirect
        return redirect(route('services.index'));
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
        $service = Service::findOrFail($id);

        $service->delete();


        session()->flash('success', 'service Deleted');

        return redirect(route('services.index'));
    }


}
