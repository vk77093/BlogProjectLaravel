@extends('layouts.blog-post')

@section('content')


<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo ? $post->photo->file:'/images/noImages.jpg'}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        @if(Session::has('cmt_msg'))
        <p class="alert alert-success">
          {{session('cmt_msg')}}
        </p>
        @endif
        @if(Auth::check())
        <div class="well">
            <h4>Leave a Comment:</h4>
{!!Form::open(['method'=>'POST','action'=>'PostCommentsController@store'])!!}
<!-- <input type="hidden" name="post_id" placeholder="{{$post->id}}" /> -->
{!!Form::label('body','Commets IT:')!!}
{!!Form::textarea('body',null,['class'=>'form-control'])!!}
{!! Form::hidden('post_id', $post->id) !!}
{!!Form::submit('Comment It',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

            <!-- <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> -->
        </div>
@endif
        <hr>

        <!-- Posted Comments -->


@endsection
