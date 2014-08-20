@extends('install.layout')
@section('content')
<h1 class="page-header">Install database</h1>
<div class="row">
  <div class="col-sm-12">
    @if(isset($data['error']))
    <h3 class="text-danger">{{ $data['error'] }}</h3>
    @else
    @endif
  </div>
</div>
@stop