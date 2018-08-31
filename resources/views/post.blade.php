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
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">

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

        <!-- Comment -->
        @if(count($comment)>0)
        @foreach($comment as $cmt)

        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="{{$cmt->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$cmt->auauthor}}
                    <small>{{$cmt->created_at->diffForHumans()}}</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
            @if(Session::has('cmt_msgReply'))
            <p class="alert alert-success">
              {{session('cmt_msgReply')}}
            </p>
            @endif
            <div class="form-group">
              {!!Form::open(['method'=>'post','action'=>'PostCommentsRepliesConroller@createReply'])!!}
              {!!Form::label('body','BODY:')!!}
              {!!Form::textarea('body',null,['class'=>'form-control','rows'=>'1'])!!}

              {!! Form::hidden('comment_id', $post->id) !!}
              {!!Form::submit('Reply',['class'=>'bt btn-info'])!!}
              {!!Form::close()!!}
            </div>
        </div>
        @endforeach
        @endif


        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>

</div>

@endsection
