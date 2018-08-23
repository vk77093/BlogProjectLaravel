@extends('layouts.admin')

@section('content')
<h2>View All comments</h2>
<table class="table table-hover">
   <thead>
     <tr>
       <th>Id</th>
       <th>Is Active</th>
       <th>Name</th>
       <th>Email</th>
       <th>Comment</th>
     </tr>
   </thead>
       <tbody>
         @if($comment)
         @foreach($comment as $cmt)
         <tr>
         <td>{{$cmt->id}}</td>
         <td>{{$cmt->is_active}}</td>
         <td>{{$cmt->author}}</td>
         <td>{{$cmt->email}}</td>
         <td>{{$cmt->body}}</td>
         <td>{{$cmt->photos}}</td>
         </tr>
         @endforeach
         @endif
       </tbody>

</table>
@endsection
