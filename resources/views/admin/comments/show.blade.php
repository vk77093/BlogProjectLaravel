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
       <th>
         Photo
       </th>
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
         <td>
           @if($cmt->is_active==1)
           {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$cmt->id]])!!}
           <input type="hidden" name="is_active" value="0" />
           <div class="form-group">
             {!!Form::submit('Unapprove',['class'=>'btn btn-info'])!!}
             {!!Form::close()!!}
           </div>

           @else
           <div class="form-group">
             {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$cmt->id]])!!}
             <input type="hidden" name="is_active" value="1" />
             {!!Form::submit('Approve',['class'=>'btn btn-primary'])!!}
             {!!Form::close()!!}

           </div>
           @endif
         </td>
         <td>
           <div class="form-group">
             {!!Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$cmt->id]])!!}
             {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
             {!!Form::close()!!}
           </div>
         </td>
         </tr>
         @endforeach
         @endif
       </tbody>

</table>
@endsection
