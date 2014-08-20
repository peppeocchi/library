@extends('layout.main')
@section('content')
<h1 class="page-header">Directors</h1>
<a class="btn btn-default" href="{{ URL::route('addDirectorForm') }}">Add new</a>
@if($directors->count())
<table class="table">
	<thead>
		<th>Name</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($directors as $director)
		<tr>
			<td>{{ $director->name }}</td>
			<td>
				<a href="directors/edit/{{ $director->id }}">Edit</a>
				<a href="directors/delete/{{ $director->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
<a href="{{ URL::route('videos') }}">Back to Videos</a>
@stop