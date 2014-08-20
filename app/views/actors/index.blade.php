@extends('layout.main')
@section('content')
<h1 class="page-header">Actors</h1>
<a class="btn btn-default" href="{{ URL::route('addActorForm') }}">Add new</a>
@if($actors->count())
<table class="table">
	<thead>
		<th>Name</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($actors as $actor)
		<tr>
			<td>{{ $actor->name }}</td>
			<td>
				<a href="actors/edit/{{ $actor->id }}">Edit</a>
				<a href="actors/delete/{{ $actor->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
<a href="{{ URL::route('videos') }}">Back to Videos</a>
@stop