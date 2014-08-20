@extends('layout.main')
@section('content')
<h1 class="page-header">Categories</h1>
<a class="btn btn-default" href="{{ URL::route('addCategoryForm') }}">Add new</a>
@if($categories->count())
<table class="table">
	<thead>
		<th>Name</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($categories as $category)
		<tr>
			<td>{{ $category->name }}</td>
			<td>
				<a href="categories/edit/{{ $category->id }}">Edit</a>
				<a href="categories/delete/{{ $category->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
<a href="{{ URL::route('videos') }}">Back to Videos</a>
@stop