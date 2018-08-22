@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
@stop
@section('content')
<h2>Upload Files</h2>
{!!Form::open(['method'=>'POST','action'=>'AdminMediaController@store','file'=>true,'class'=>'dropzone','id'=>'my-awesome-dropzone'])!!}
{!!Form::close()!!}
<br />
{!!Form::submit('Upload File',['class'=>'bt btn-primary'])!!}

@stop
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@stop
