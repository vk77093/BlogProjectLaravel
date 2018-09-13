<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Blog Page</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                <h4>hello i am The main application interface Of Codehacking 2</h4>
                <a href="/login">Log In Page</a>
            </div>
        </div>
        <!-- <div class="container">
            <div class="content">
                <div class="title">Foodcoast Inetrnational</div>
                <h4 class="lead">Welcome to the HR Mangement System</h4>
                <a href="/login">Log In Page</a>
            </div>
        </div> -->


    <!-- </body>
</html> -->
@extends('layouts.blog-home')
<link href="{{asset('css/libs.css')}}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{asset('css/blog-home.css')}}" rel="stylesheet">
@section('content')
<div class="col-md-8">
@if($postsData)
@foreach($postsData as $post)
    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>

    <!-- First Blog Post -->
    <h2>
        <a href="{{route('home.post',$post->id)}}">{{$post->title}}</a>
    </h2>
    <p class="lead">
        by <a href="{{route('user.name',$post->user->id)}}">{{$post->user->name}}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
    <hr>
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file:'/images/noImages.jpg'}}" alt="POST Photo">
    <hr>
    <p>{{str_limit($post->body,100)}}</p>
    <a class="btn btn-primary" href="{{route('home.post',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>

    @endforeach
    @endif


    <!-- Pager -->
    <div class="row">
      <div class="col-sm-6 col-sm-offset-5">
        {{$postsData->render()}}
      </div>
    </div>
    <!-- <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul> -->

</div>
@endsection
