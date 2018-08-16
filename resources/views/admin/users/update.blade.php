@extends('layouts.admin')
@section('content')
<div class="row">


<div class="col-sm-3">
<img src="{{$user->photo ? $user->photo->file:'/images/noImages.jpg'}}" alt="alps"class="img-responsive img-rounded" />

</div>
<h2>Edit Or Update Users</h2>
<div class="col-sm-9">
{!!Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>'true'])!!}
<div class="form-group">
  {!!Form::label('name','Name:')!!}
  {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('email','Email')!!}
{!!Form::email('email',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
  {!!Form::label('role_id','Role:')!!}
  {!!Form::select('role_id',$roles ,null,['class'=>'form-control'])!!}
</div>
<!-- <div class="form-group">
  //{!!Form::label('status','Status:')!!}
  //{!!Form::text('status',null,['class'=>'form-control'])!!}
</div>  -->
<div class="form-group">
{!!Form::label('photo_id','Files:')!!}
{!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('is_active','Status:')!!}
{!!Form::select('is_active',array(1=>'Active',0=>'Non Active'),null,['class'=>'form-control'])!!}

</div>
<div class="form-group">
  {!!Form::label('password','Password:')!!}
  {!!Form::password('password',['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::submit('Update User',['class'=>'btn btn-primary col-sm-3'])!!}
</div>
{!!Form::close()!!}

{!!Form::open(['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]])!!}
{!!Form::submit('Delete User',['class'=>'btn btn-danger col-sm-3'])!!}
{!!Form::close()!!}
</div>

</div>

<div class="row">
  @include('includes.formError')
</div>




@stop
<!-- <h4>Hello I am Up</h4> -->
