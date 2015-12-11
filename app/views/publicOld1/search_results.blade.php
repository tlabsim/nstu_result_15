<?php	
	$mk = '%'.$keyword.'%';
	$examinees = DB::table('examinees')->whereRaw('exam_roll LIKE "'.$mk.'" or hsc_roll LIKE "'.$mk.'" or hsc_reg_no LIKE "'.$mk.'" or ssc_roll LIKE "'.$mk.'" or ssc_reg_no LIKE "'.$mk.'"')->get();
?>

<div class="row" style="margin-top: 10px;">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
		<div class="panel-heading"><h4>Search result :: {{ $keyword }}</h4></div>
		<div class="panel-body" style="padding: 0px;"></div>
			<?php
				if(!empty($examinees) and count($examinees) > 0)
				{
					echo '<div class="list-group">';
					foreach ($examinees as $e)
					{
						echo '<a href="#" sl="'.$e->exam_roll.'" class="search_result_link list-group-item">';
						echo '<h5 class="list-group-item-heading">'.$e->name.'</h5>';
						echo '<p class="list-group-item-text">';
						echo 'Unit '.$e->unit.' | Exam roll: '.$e->exam_roll.' | HSC roll: '.$e->hsc_roll.' | SSC roll: '.$e->ssc_roll;
						echo '</p>';
						echo '</a> ';
					}
					echo '</div>';
				}
				else
				{
					echo '<div style="padding: 5px 10px;"><h4>No results.</h4></div>';
				}
			?>	
		</div>
	</div>
</div>

<form id="rs_form" action="/result" method="post">
	<input id="rs_input" name="roll" value="" type="hidden"/>
</form>

<script>
	$(document).ready(function(){
		$('.search_result_link').bind('click', function(e)
			{
				e.preventDefault(); // cancel the link itself
				var roll= $(this).attr('sl');				
			    $('#rs_input').val(roll);
			    $('#rs_form').submit();
	    });
	});	
</script>
