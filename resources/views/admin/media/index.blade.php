@extends('layouts.admin')
@section('content')
<h1>ALL MEDIA File Details</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created_At</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  @if($photos)
  @foreach($photos as $ph)
  <tr>
  <td>{{$ph->id}}</td>
  <td><img height="30"src="{{$ph->file ? $ph->file :'No Image'}}"{{$ph->file}}></td>
  <td>{{$ph->created_at->diffForHumans()}}</td>
  <td>
    {!!Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$ph->id]])!!}
    {!!Form::submit('DELETE',['class'=>'btn btn-danger'])!!}
    {!!Form::close()!!}
  </td>
  </tr>
  @endforeach
  @endif
  </tbody>
</table>


@stop
