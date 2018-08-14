@extends('layouts.admin')
@section('content')
<h2>Edit Or Update Users</h2>
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
{!!Form::select('is_active',array(1=>'Active',0=>'Non Active'),0,['class'=>'form-control'])!!}

</div>
<div class="form-group">
  {!!Form::label('password','Password:')!!}
  {!!Form::password('password',['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::submit('Create User',['class'=>'btn btn-primary'])!!}
</div>
{!!Form::close()!!}

@include('includes.formError')



@stop
<!-- <h4>Hello I am Up</h4> -->
