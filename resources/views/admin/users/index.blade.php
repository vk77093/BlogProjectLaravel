@extends('layouts.admin')
@section('content')
<h2>User List</h2>
<table class="table table-hover">
   <thead>
     <tr>
       <th>Id</th>
       <th>Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th>Status</th>
       <th>Created_At</th>
       <th>Updated_At</th>

     </tr>
   </thead>
   <tbody>
     @if($users)
     @foreach($users as $user)
     <tr>
       <td>{{$user->id}}</td>
       <td>{{$user->name}}</td>
       <td>{{$user->email}}</td>
       <td>{{$user->role->name}}</td>
       <td>{{$user->is_active==1 ? 'Active' : 'Not Active'}}</td>
       <td>{{$user->created_at->diffForHumans()}}</td>
       <td>{{$user->updated_at->diffForHumans()}}</td>
     </tr>
     @endforeach
    @endif
   </tbody>
 </table>
@endsection
