@extends('layouts.admin')
@section('content')
<h1>ALL MEDIA File Details</h1>
<form action="/delete/media" method="POST" class="form-inline">
  <div class="form-group">
    <select name="checkBoxArray" id="">
<option value="delete">Delete</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" />
  </div>

<table class="table table-hover">
  <thead>
    <tr>
      <th><input type="checkbox" id="options" /></th>


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
    <td>
      <input class="checkbox" name="checkBoxArray[]" type="checkbox" value="{{$ph->id}}" />
    </td>
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

</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  //console.log('hello');
  $('#options').click(function(){
    if(this.checked){
      $('.checkbox').each(function(){
        this.checked=true;
      });
    }else{
      $('.checkbox').each(function(){
        this.checked=false;
      });
    }
  });

});
</script>


<div class="row">
<div class="col-sm-6 col-sm-offset-5">
  {{$photos->render()}}
</div>

</div>


@stop
