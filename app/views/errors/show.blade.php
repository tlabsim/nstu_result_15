@extends('errors.layout')

@section('title')
	<title>{{{ $error_title }}}</title> 
@stop

@section('contents')
	<div class="error_header">
		{{{ $error_code }}}
	</div>
	<div class="error_details">
		{{{ $error_details }}}
	</div>
@stop