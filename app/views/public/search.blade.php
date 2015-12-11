@extends('public.layouts.common.basic')

@section('title')
	<title>Search | NSTU Admission test result 2015</title>
@stop

@section('menu_items')
	<li><a href="/result">View result</a></li>
	<li><a href="/downloads">Result download</a></li>	
	<li><a href="/instructions">Instructions</a></li>
@stop

@section('contents')
	<div class="main">
		<div class="container">
			<?php
			if(isset($keyword))
			{
				$mk = trim($keyword);
				if (strlen($mk)<3)
				{
					echo '<div class="row" style="margin-top: 10px">';
					echo '<div class="col-md-6 col-md-offset-3">';
					echo '<div class="alert alert-warning "><strong>Empty or too short search keyword!</strong></div>';
					echo '</div>';
					echo '</div>';
				}
				else
				{
					DB::insert('INSERT INTO search_stats(search_keyword, searched_from) VALUES(?,?)', [$keyword, 'topbar_search']);
					echo View::make('public.search_results')->with('keyword', $mk);
				}
			}
			else
			{
				echo '<div class="row" style="margin-top: 10px">';
				echo '<div class="col-md-6 col-md-offset-3">';
				echo '<div class="alert alert-warning "><strong>Empty search keyword!</strong></div>';
				echo '</div>';
				echo '</div>';
			}

			?>
		</div>
	</div>
@stop
