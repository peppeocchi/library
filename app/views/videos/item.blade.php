@extends('layout.main')
@section('content')
<h1 class="page-header">{{ $video->title }}</h1>
<p>{{ $video->description }}</p>
@stop