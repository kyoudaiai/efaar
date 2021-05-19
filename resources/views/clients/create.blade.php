@extends('layout.master')
@section('title', 'Create Client')
@section('parentPageTitle', 'Pages')
@section('content')

<div class="card card-default">
    <div class="card-header">{{ isset($client) ? 'Edit Client' : 'Create Client' }}</div>

    <div class="card-body">



        <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @isset($client)
                @method('PUT')
            @endisset




            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" id="title" value="{{ isset($client) ? $client->name : '' }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="50" rows="5">{{ isset($client) ? $client->description : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="description">URL</label>
                <input type="text" class="form-control" name="url" id="title" value="{{ isset($client) ? $client->url : '' }}">
            </div>


            @isset($client)
                <div class="form-group">
                    <img src="{{ asset("storage/$client->image") }}" alt=""style="width: 100%">
                </div>
            @endisset
            <div class="form-group">
                <label for="photo">Image</label>
                <input type="file" class="form-control" name="photo" id="photo">
            </div>

            <div class="form-group">
             <button type="submit" class="btn-success">{{ isset($client) ? 'Edit Client' : 'Create Client' }}</button>
            </div>



        </form>
    </div>
</div>

@endsection

@section('page-script')
    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>

    <script>


$(function () {

    $('.select2').select2();
    $(".search-select").select2({
        allowClear: true
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    CKEDITOR.replace('ckeditor');
    CKEDITOR.config.height = 300;

});

</script>

@endsection

@section('page-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" integrity="sha256-vu9SAWhYz3+PNEdy/FtYE0QBaAS2e/cB7OcSWV28WcM=" crossorigin="anonymous" />

<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>

@endsection
