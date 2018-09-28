@extends('layouts.admin')
@section('content')

<div class="col-sm-6">
<h4>Create Category</h4>
{!!Form::open(['method'=>'POST','action'=>'AdminCategoryController@store'])!!}
<div class="form-group">
  {!!Form::label('name','Category Name')!!}
  {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
  {!!Form::submit('Create Category',['class'=>'form-control btn btn-primary'])!!}
</div>
</div>
{!!Form::close()!!}

<div class="col-sm-6">
<h4>View Category</h4>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created_At</th>
    </tr>
  </thead>
  <tbody>
    @if($categories)
    @foreach($categories as $cat)
    <tr>
      <td><a href="{{route('admin.category.edit',$cat->id)}}">
    {{$cat->id}}</td>  </a>
      <td>{{$cat->name}}</td>
      <td>{{$cat->created_at ? $cat->created_at->diffForHumans() :'No Date'}}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
</div>

@endsection
