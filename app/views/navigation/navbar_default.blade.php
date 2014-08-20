<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href=""><i class="fa fa-database"></i> Library</a>
		</div>

		<div class="collapse navbar-collapse" id="top-nav">
			<ul class="nav navbar-nav">
				<li @if(URL::current() == URL::route('videos')) class="active" @endif><a href="{{ URL::route('videos') }}"><i class="fa fa-stack-overflow"></i> Videos</a></li>
				<li @if(URL::current() == URL::route('actors')) class="active" @endif><a href="{{ URL::route('actors') }}"><i class="fa fa-pied-piper-alt"></i> Actors</a></li>
				<li @if(URL::current() == URL::route('categories')) class="active" @endif><a href="{{ URL::route('categories') }}"><i class="fa fa-windows"></i> Categories</a></li>
				<li @if(URL::current() == URL::route('directors')) class="active" @endif><a href="{{ URL::route('directors') }}"><i class="fa fa-qq"></i> Directors</a></li>
			</ul>
			<form action="{{ URL::route('searchAutocomplete') }}" method="GET" class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" name="title" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-soundcloud"></i> Wishlist <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>