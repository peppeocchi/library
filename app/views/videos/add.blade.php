@extends('layout.main')
@section('content')
<h1 class="page-header">Add Video</h1>
<div class="row">
	<div class="col-sm-12">
		<form method="POST" action="{{ URL::route('autocomplete') }}">
			<div class="col-sm-4 col-sm-offset-4">
				<input type="search" class="form-control" name="title" placeholder="Autocomplete...">
			</div>
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
	</div>
	<div class="col-sm-6">
		<form method="POST" action="{{ URL::route('addVideoPost') }}">
			<div class="form-group">
				<label class="control-label">Title</label>
				<input class="form-control" type="text" name="title" />
			</div>
			<div class="form-group">
				<label class="control-label">Description</label>
				<textarea class="form-control" name="description"></textarea>
			</div>
			<div class="form-group">
				<label class="control-label">Category</label>
				@if($data['categories'])
				<select class="form-control" multiple name="category[]">
					@foreach($data['categories'] as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
				@endif
				<a class="btn btn-sm btn-link" href="{{ URL::route('addCategoryForm') }}">Add Category</a>
			</div>
			<div class="form-group">
				<label class="control-label">Actor/s</label>
				@if($data['actors'])
				<select class="form-control" multiple name="actor[]">
					@foreach($data['actors'] as $actor)
					<option value="{{ $actor->id }}">{{ $actor->name }}</option>
					@endforeach
				</select>
				@endif
				<a class="btn btn-sm btn-link" href="{{ URL::route('addActorForm') }}">Add Actor</a>
			</div>
			<div class="form-group">
				<label class="control-label">Director/s</label>
				@if($data['directors'])
				<select class="form-control" multiple name="director[]">
					@foreach($data['directors'] as $director)
					<option value="{{ $director->id }}">{{ $director->name }}</option>
					@endforeach
				</select>
				@endif
				<a class="btn btn-sm btn-link" href="{{ URL::route('addDirectorForm') }}">Add Directors</a>
			</div>
			<button class="btn btn-primary" type="submit">Add</button>
		</form>
	</div>
	<div class="col-sm-6">
		<hr>
		@if($autocomplete_list = Session::get('autocomplete_list'))
			<ul>
				@foreach($autocomplete_list as $a)
					<li><a href="{{ URL::route('autocompleteSuggestion', array('id' => $a->imdbID)) }}">{{ $a->Title }} - <span class="text-muted">{{ $a->Year }}</span></a></li>
				@endforeach
			</ul>
		@elseif($a = Session::get('autocomplete_suggestion'))
			<img style="max-height: 250px; margin-right: 10px" class="thumbnail pull-left" src="{{ $a->Poster }}" />
			<p><span class="text-muted">Title</span> {{ $a->Title }}</p>
			<p><span class="text-muted">Year</span> {{ $a->Year }}</p>
			<p><span class="text-muted">Category</span> {{ $a->Genre }}</p>
			<p><span class="text-muted">Length</span> {{ $a->Runtime }}</p>
			<p><span class="text-muted">Director</span> {{ $a->Director }}</p>
			<p><span class="text-muted">Actors</span> {{ $a->Actors }}</p>
			<p><span class="text-muted">Description</span> {{ $a->Plot }}</p>
		@endif
	</div>
</div>
@stop