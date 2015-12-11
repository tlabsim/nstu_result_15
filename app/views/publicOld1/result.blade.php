@extends('public.layouts.common.basic')

@section('title')
	<title>NSTU Admission test result 2014</title>
@stop

@section('menu_items')
	<li class="active"><a href="/">View result</a></li>
	<li><a href="/downloads">Result download</a></li>	
@stop

@section('contents')
	<div class="main">
		<div class="container">
			<?php
				$show_publication_summary = Settings::GetSettings('show_result_publication_summary');
				if(!empty($show_publication_summary))
				{
					echo View::make('public.result_publication_summary');
				}				
			?>

			<div class="row" style="margin-top: 10px;">
				<div class="col-md-6 col-md-offset-3" style="padding:0px 5px;">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Search result</h3>
						</div>
						<div class="panel-body">
							<?php
								$is_result_search_enabled = Settings::GetSettings('is_result_search_enabled');
								if(!empty($is_result_search_enabled))
								{
									if (isset($roll))
									{
										echo View::make('public.result_search')->with('roll', $roll);
									}
									else
									{
										echo View::make('public.result_search');
									}
								}
								else
								{
									echo '<p>Sorry, Result search is currently disabled.</p>';
								}
							?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
@stop