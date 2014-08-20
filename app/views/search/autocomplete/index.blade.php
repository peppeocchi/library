@extends('layout.main')
@section('content')
<h1 class="page-header text-center">I'm feeling lucky</h1>
<form action="{{ URL::route('searchAutocomplete') }}" method="GET">
	<div class="col-sm-8 col-sm-offset-1">
		<input class="form-control" type="search" name="title">
	</div>
	<div class="col-sm-2">
		<button class="btn btn-primary" type="submit">Search</button>
	</div>
</form>
@if(isset($list))
<div class="clearfix"></div>
<hr>
<div class="row">
<?php $i = 0; ?>
@foreach($list as $m)
	<div class="col-sm-6">
		<img style="max-height: 300px; margin-right: 10px" class="thumbnail pull-left" src="{{ $m->Poster }}" />
		<p><span class="text-muted">Title</span> {{ $m->Title }}</p>
		<p><span class="text-muted">Year</span> {{ $m->Year }}</p>
		<p><span class="text-muted">Category</span> {{ $m->Genre }}</p>
		<p><span class="text-muted">Length</span> {{ $m->Runtime }}</p>
		<p><span class="text-muted">Director</span> {{ $m->Director }}</p>
		<p><span class="text-muted">Actors</span> {{ $m->Actors }}</p>
		<p><span class="text-muted">Description</span> {{ $m->Plot }}</p>
	</div>
@endforeach
</div>
@endif
@stop