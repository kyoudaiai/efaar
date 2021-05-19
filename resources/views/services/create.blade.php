@extends('layout.master')
@section('title', 'Create Service')
@section('parentPageTitle', 'CMS')
@section('content')

<div class="card card-default">
    <div class="card-header">{{ isset($service) ? 'Edit Service' : 'Create New Service' }}</div>

    <div class="card-body">



        <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @isset($service)
                @method('PUT')
            @endisset




            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" id="title" value="{{ isset($service) ? $service->name : '' }}">
            </div>
            <div class="form-group">
                <label for="title">Name Arabic</label>
                <input type="text" class="form-control" name="name_ar" id="title_ar" value="{{ isset($service) ? $service->name_ar : '' }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="50" rows="5">{{ isset($service) ? $service->description : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="description">Description Arabic</label>
                <textarea class="form-control" name="description_ar" id="description_ar" cols="50" rows="5">{{ isset($service) ? $service->description_ar : '' }}</textarea>
            </div>



            @isset($service)
                <div class="form-group">
                    <img src="{{ asset("storage/$service->image") }}" alt=""style="width: 100%">
                </div>
            @endisset
            <div class="form-group">
                <label for="photo">Image</label>
                <input type="file" class="form-control" name="photo" id="photo">
            </div>

            <div class="form-group">
             <button type="submit" class="btn-success">{{ isset($service) ? 'Edit Service' : 'Create Service' }}</button>
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
