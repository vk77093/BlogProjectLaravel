@extends('layouts.admin')

@section('content')
<h3>Post section</h3>
<table class="table table-hover">
   <thead>
     <tr>
       <th>Id</th>
       <th>Category</th>
       <th>User</th>
       <th>Photo</th>
       <th>Title</th>
       <th>Content</th>
       <th>Created_At</th>
       <th>Updated_At</th>

     </tr>
   </thead>
   <tbody>
@if($posts)
@foreach($posts as $post)
<tr>
  <td>{{$post->id}}</td>
  <td>{{$post->Category_id}}</td>
  <td>{{$post->user_id}}</td>
  <td>{{$post->photo_id}}</td>
  <td>{{$post->title}}</td>
  <td>{{$post->body}}</td>
  <td>{{$post->created_at->diffForHumans()}}</td>
  <td>{{$post->updated_at->diffForHumans()}}</td>


</tr>

@endforeach
@endif
</tbody>
</table>
@endsection
