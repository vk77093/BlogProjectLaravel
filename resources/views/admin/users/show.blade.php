@extends('layouts.admin')
@section('content')
<h4>Show page but just demo</h4>
<h2>Form without Form Laravel</h2>
 <form action=""method="post">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

@stop
