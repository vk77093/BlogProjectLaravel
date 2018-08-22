@extends('layouts.admin')
@section('content')
<h4>Edit or DELETE Category</h4>
<div class="row">
  <div class="col-sm-6">
    {!!Form::model($categories,['method'=>'PATCH','action'=>['AdminCategoryController@update',$categories->id]])!!}
    <div class="form-group">
      {!!Form::label('name','NAME:')!!}
      {!!Form::text('name',null,['class'=>'form-control'])!!}
      {!!Form::submit('Update_categories',['class'=>'btn btn-primary col-sm-6'])!!}
       {!!Form::close()!!}

    {!!Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$categories->id]])!!}
    {!!Form::Submit('Delete Post',['class'=>'btn btn-danger col-sm-6'])!!}
    {!!Form::close()!!}
  </div>
  </div>

</div>


@endsection
