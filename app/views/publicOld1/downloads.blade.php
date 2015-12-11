@extends('public.layouts.common.basic')

@section('title')
	<title>NSTU Admission test result 2014 | Downloads</title>
@stop

@section('menu_items')
	<li><a href="/">View result</a></li>
	<li class="active"><a href="/downloads">Result download</a></li>	
@stop

@section('contents')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<div style="" class="panel-group panel-group-lists collapse in" id="accordion2">
				<div class="panel">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse_u_all">All units</a></h4>
					</div>
					<div id="collapse_u_all" class="panel-collapse collapse in">
						<div class="panel-body">
							<!-- Download links for all units -->
							<?php
								echo View::make('public.download_links', array('unit'=>'_'));
							?>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse_u_a">Unit A</a></h4>
					</div>
					<div id="collapse_u_a" class="panel-collapse collapse">
						<div class="panel-body">
							<!-- Download links for unit A -->
							<?php
								echo View::make('public.download_links', array('unit'=>'A'));
							?>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse_u_b">Unit B</a></h4>
					</div>
					<div id="collapse_u_b" class="panel-collapse collapse">
						<div class="panel-body">
							<!-- Download links for unit B -->
							<?php
								echo View::make('public.download_links', array('unit'=>'B'));
							?>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse_u_c">Unit C</a></h4>
					</div>
					<div id="collapse_u_c" class="panel-collapse collapse">
						<div class="panel-body">
							<!-- Download links for unit C -->
							<?php
								echo View::make('public.download_links', array('unit'=>'C'));
							?>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse_u_d">Unit D</a></h4>
					</div>
					<div id="collapse_u_d" class="panel-collapse collapse">
						<div class="panel-body">
							<!-- Download links for unit D -->
							<?php
								echo View::make('public.download_links', array('unit'=>'D'));
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

