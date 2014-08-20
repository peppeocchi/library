@extends('layout.main')
@section('content')
<h1 class="page-header">Add Category</h1>
<form method="POST" action="{{ URL::route('addCategoryPost') }}">
	<div class="form-group">
		<label class="contro-label">Name</label>
		<input class="form-control" type="text" name="name" />
	</div>
	<button class="btn btn-primary" type="submit">Add</button>
</form>
@stop