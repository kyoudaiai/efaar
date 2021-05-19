@extends('layout.master')
@section('title', 'About Page')
@section('parentPageTitle', 'CMS')
@section('content')

<div class="card card-default">
    <div class="card-header">{{ isset($aboutpage) ? 'Modify About Page' : 'Modify About Page' }}</div>

    <div class="card-body">



        <form action="{{ isset($aboutpage) ? route('about.update', $aboutpage->id) : route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @isset($aboutpage)
                @method('PUT')
            @endisset




            <div class="form-group">
                <label for="description">Who We Are</label>
                <textarea class="form-control" name="who_we_are" id="who_we_are" cols="50" rows="5">{{ isset($aboutpage) ? $aboutpage->who_we_are : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="description">Arabic: Who We Are</label>
                <textarea class="form-control" name="who_we_are_ar" id="who_we_are_ar" cols="50" rows="5">{{ isset($aboutpage) ? $aboutpage->who_we_are_ar : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="description">What We Do</label>
                <textarea class="form-control" name="what_we_do" id="what_we_do" cols="50" rows="5">{{ isset($aboutpage) ? $aboutpage->what_we_do : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="description">Arabic What We Do</label>
                <textarea class="form-control" name="what_we_do_ar" id="what_we_d_aro" cols="50" rows="5">{{ isset($aboutpage) ? $aboutpage->what_we_do_ar : '' }}</textarea>
            </div>





            <div class="form-group">
             <button type="submit" class="btn-success">{{ isset($aboutpage) ? 'Edit' : 'Create' }}</button>
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

    CKEDITOR.replace('who_we_are');
    CKEDITOR.replace('what_we_do');
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
