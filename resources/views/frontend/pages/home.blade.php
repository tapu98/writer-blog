@extends('frontend.layouts.front-layout')

@section('pageTiltle', isset($pageTitle) ? $pageTiltle : 'Index')

@section('content')
 <!-- Page Header-->
 <header class="masthead" style="background-image: url('./frontend/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        @foreach ($blogs as $blog)          
        
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('website.post')}}">
                    <h2 class="post-title">{{ $blog->name }}</h2>
                    <h3 class="post-subtitle">{{ $blog->type }}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 24, 2023
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
           
            <!-- Pager-->
            
        </div>2

        @endforeach
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
    </div>
</div>
@endsection