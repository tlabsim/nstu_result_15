<div class="row" style="margin-top: 10px;">
	<div class="col-xs-6 col-md-3" style="padding: 0px 5px;">
		<?php
			$is_result_published = DB::table('units')->where('unit', 'A')->pluck('is_result_published');
			if(empty($is_result_published))
			{
				echo '<div class="alert alert-warning">';
				echo '<h4>Unit A</h4>';
				echo '<p>Result not published yet.</p>';
				echo '</div>';
			}
			else
			{
				echo '<div class="alert alert-success">';
				echo '<h4>Unit A</h4>';
				echo '<p>Result published.</p>';
				echo '</div>';
			}
		?>
	</div>

	<div class="col-xs-6 col-md-3" style="padding: 0px 5px;">
		<?php
			$is_result_published = DB::table('units')->where('unit', 'B')->pluck('is_result_published');
			if(empty($is_result_published))
			{
				echo '<div class="alert alert-warning">';
				echo '<h4>Unit B</h4>';
				echo '<p>Result not published yet.</p>';
				echo '</div>';
			}
			else
			{
				echo '<div class="alert alert-success">';
				echo '<h4>Unit B</h4>';
				echo '<p>Result published.</p>';
				echo '</div>';
			}
		?>
	</div>

	<div class="col-xs-6 col-md-3" style="padding: 0px 5px;">
		<?php
			$is_result_published = DB::table('units')->where('unit', 'C')->pluck('is_result_published');
			if(empty($is_result_published))
			{
				echo '<div class="alert alert-warning">';
				echo '<h4>Unit C</h4>';
				echo '<p>Result not published yet.</p>';
				echo '</div>';
			}
			else
			{
				echo '<div class="alert alert-success">';
				echo '<h4>Unit C</h4>';
				echo '<p>Result published.</p>';
				echo '</div>';
			}
		?>
	</div>

	<div class="col-xs-6 col-md-3" style="padding: 0px 5px;">
		<?php
			$is_result_published = DB::table('units')->where('unit', 'D')->pluck('is_result_published');
			if(empty($is_result_published))
			{
				echo '<div class="alert alert-warning">';
				echo '<h4>Unit D</h4>';
				echo '<p>Result not published yet.</p>';
				echo '</div>';
			}
			else
			{
				echo '<div class="alert alert-success">';
				echo '<h4>Unit D</h4>';
				echo '<p>Result published.</p>';
				echo '</div>';
			}
		?>
	</div>

</div>
