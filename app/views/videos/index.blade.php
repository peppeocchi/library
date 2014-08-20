@extends('layout.main')
@section('content')
<h1 class="page-header">Videos</h1>
<a class="btn btn-default" href="{{ URL::route('addVideoForm') }}">Add new</a>
@if($videos->count())
<table class="table">
	<thead>
		<th>Title</th>
		<th>Description</th>
		<th>Category</th>
		<th>Director</th>
		<th>Cast</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($videos as $video)
		<tr>
			<td><a href="videos/video/{{ $video->id }}">{{ $video->title }}</a></td>
			<td>{{ $video->description }}</td>
			<td></td>
			<td></td>
			<td></td>
			<td>
				<a href="videos/edit/{{ $video->id }}">Edit</a>
				<a href="videos/delete/{{ $video->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
@stop