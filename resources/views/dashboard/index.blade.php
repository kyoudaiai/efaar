@extends('layout.master')
@section('title', 'Dashboard')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
@stop
@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-6">
        <div class="card mcard_4">
            <div class="body">
                <ul class="header-dropdown list-unstyled">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-menu"></i> </a>
                    </li>
                </ul>
                <div class="img">
                    <img src="{{ ($user->profile && $user->profile->photo)? $user->profile->photo->getUrl() : asset('assets/images/avatar_male.png') }}" class="rounded-circle" alt="profile-image">
                </div>
                <div class="user">
                    <h5 class="mt-3 mb-1">{{$user->name}}</h5>
                    <small class="text-muted">{{$user->roles->first()->title}}</small>
                </div>
                <ul class="list-unstyled social-links">
                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-dribbble"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

</div>


<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic">
            <div class="body">
                <h6>Posts</h6>
                <h2>{{ \App\Post::count() }}</h2>
                <div class="progress">
                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic">
            <div class="body">
                <h6>Clients</h6>
                <h2>{{ \App\Client::count() }}</h2>
                <div class="progress">
                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic">
            <div class="body">
                <h6>Projects</h6>
                <h2>{{ \App\Portfolio::count() }}</h2>
                <div class="progress">
                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic">
            <div class="body">
                <h6>Services</h6>
                <h2>{{ \App\Service::count() }}</h2>
                <div class="progress">
                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                </div>
            </div>
        </div>
    </div>



</div>


@stop
@section('page-script')



<script src="{{asset('assets/js/pages/index.js')}}"></script>
@stop
