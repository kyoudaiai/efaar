<?php

namespace App\Http\Controllers;


use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Storage;
use App\Permission;
use Gate;

class ClientsController extends Controller
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

        return view('clients.index')->with('clients', Client::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $client = Client::create([

            'name' => $request->name,
            'description' =>  $request->description,
            'url' =>  $request->url,
        ]);

        if ($request->file('photo'))
            {
                if($client->photo)
                {
                    $client->photo->delete();
                    $client->addMedia($request->file('photo'))->toMediaCollection('photo');
                }
                elseif(!$client->photo)
                {
                    $client->addMedia($request->file('photo'))->toMediaCollection('photo');
                }
            }


        //flash a msg

        session()->flash('success', 'client created successfully');

        //redirect
        return redirect(route('clients.index'));
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
    public function edit(Client $client)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('clients.create')->with(['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //construct data
        $data = $request->only(['name','description','url']);


        $client->update($data);

        // check if new image delete old one
        if ($request->file('photo'))
        {
            if($client->photo)
            {
                $client->photo->delete();
                $client->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
            elseif(!$client->photo)
            {
                $client->addMedia($request->file('photo'))->toMediaCollection('photo');
            }
        }


        //flash a msg

        session()->flash('success', 'client updated successfully');

        //redirect
        return redirect(route('clients.index'));
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
        $client = Client::findOrFail($id);

        $client->delete();


        session()->flash('success', 'client Deleted');

        return redirect(route('clients.index'));
    }


}
