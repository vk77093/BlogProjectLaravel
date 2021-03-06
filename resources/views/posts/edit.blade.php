@extends('layouts.admin')

@section('content')
<h3>Edit Post</h3>
<div class="row">

{!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>'true'])!!}
<div class="form-group">
  {!!Form::label('title','Title:')!!}
  {!!Form::text('title',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('category_id','Category:')!!}
<!-- {!!Form::select('category_id',array(1=>'PHP',2=>'Java'),null,['class'=>'form-control'])!!} -->
{!!Form::select('category_id',$categories,null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('photo_id','Photo:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control'])!!}

</div>
<div class="form-group">
  {!!Form::label('body','Content:')!!}
  {!!Form::textarea('body',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
  {!!Form::submit('Update Post',['class'=>'btn btn-primary col-sm-3'])!!}
</div>
{!!Form::close()!!}
{!!Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id]])!!}
{!!Form::submit('Delete User',['class'=>'btn btn-danger col-sm-3'])!!}
</div>
<div class="row">
  @include('includes.formError')
</div>

@endsection
