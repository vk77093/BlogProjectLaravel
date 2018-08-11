@extends('layouts.admin')
@section('content')
<h2>Create Users</h2>
{!!Form::open(['method'=>'POST','action'=>'AdminUserController@create'])!!}
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
  {!!Form::select('role_id',['0'=>'---Choose Role----']+$roles ,null,['class'=>'form-control'])!!}
</div>
<!-- <div class="form-group">
  //{!!Form::label('status','Status:')!!}
  //{!!Form::text('status',null,['class'=>'form-control'])!!}
</div> -->
<div class="form-group">
{!!Form::label('status','Status:')!!}
{!!Form::select('status',array(1=>'Active',0=>'Non Active'),0,['class'=>'form-control'])!!}

</div>
<div class="form-group">
{!!Form::submit('Create User',['class'=>'btn btn-primary'])!!}
</div>
{!!Form::close()!!}
@stop
