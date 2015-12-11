<form action="/result" method="post" onsubmit="return validateSearchForm(this);"> 
	<div class="input-group form-search">
		<input id="search_by_roll" class="form-control search-query" name="roll" value="{{ isset($roll) ? $roll : ''; }}"> 
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary" data-type="last">View result</button>
		</span>
	</div>
</form>


<!--Invalid input -->
<div id="alert_invalid_input" class="alert alert-danger alert-dismissable 
<?php
	if(isset($roll) and !is_numeric($roll))
	{
		echo "";
	}
	else echo "hidden";
?>
" style="margin-top: 10px;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>Invalid input!</h4>
	<p>Please input a valid roll.</p>
</div>


<!--No input -->
<div id="alert_no_input" class="alert alert-danger alert-dismissable 
<?php
	if(isset($roll) and empty($roll))
	{
		echo "";
	}
	else echo "hidden";
?>

"  style="margin-top: 10px;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>Empty input!</h4>
	<p>Please input a valid roll.</p>
</div>


<!--Roll not found -->
<div id="alert_not_found" class="alert alert-danger alert-dismissable 
<?php
	if (isset($roll))
	{
		$examinee = Examinee::find($roll);
		if($examinee)
		{
			echo "hidden";
		}
		else
		{
			echo "";
		}			
	}		
	else echo "hidden";
?>

"  style="margin-top: 10px;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>Roll not found!</h4>
	<p>Please input a valid roll.</p>
</div>

<?php
	$unit ='';
	$is_result_published=false;
	$passed = false;
	$show_result_details = false;
	$show_failers_details = false;

	if (!empty($examinee))
	{
		$unit = $examinee->unit;
		$unit_info = DB::table('units')->where('unit', $unit)->first();
		if(!empty($unit_info))
		{
			$is_result_published = $unit_info->is_result_published;	
		}		
	}		
?>

<!--Result not published -->
<div id="alert_result_not_published" class="alert alert-danger alert-dismissable 
<?php
	if (!empty($examinee))
	{	
		if(empty($is_result_published))	
		{
			echo "";
		}
		else echo "hidden";
	}		
	else echo "hidden";
?>

"  style="margin-top: 10px;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>Result not published!</h4>
	<p>The result of unit {{ empty($unit)? "" : $unit }} is not published yet.</p>
</div>

<?php
	if(isset($examinee) and !empty($is_result_published))
	{
		$exam_roll = $examinee->exam_roll;
		$result = DB::table('results')->where('exam_roll', $exam_roll)->first();

		if($result)
		{
			$show_result_details = Settings::GetSettings('show_result_details');
			$show_failers_details = Settings::GetSettings('show_failers_details');

			$list = $result->list;
			$merit_position = $result->merit_position;
			if(!empty($merit_position))
			{
				switch($list)
				{
					case "Merit":
						$merit_seats = $unit_info->merit_seats;
						$cong_text = 'Your merit position is '.$merit_position.'.';
						if($merit_position > $merit_seats)
						{
							$cong_text .= ' You are at position '.($merit_position-$merit_seats).' of waiting list.';
						}
						else
						{
							$cong_text .= ' You are in the main merit list.';
						}
						echo '<div id="alert_passed" class="alert alert-info"  style="margin-top: 10px;">';			
						echo '<h4>Congratulation! You are in the merit list.</h4>';
						echo '<p>'.$cong_text.'</p>';
						echo '</div>';

						$passed = true;
						break;
					case "FFQ":
					case "FF":
						$ff_seats = $unit_info->ff_seats;
						$cong_text = 'Your merit position is '.$merit_position.'.';
						if($merit_position > $ff_seats)
						{
							$cong_text .= ' You are at position '.($merit_position-$ff_seats).' of waiting list.';
						}
						else
						{
							$cong_text = ' You are in the main merit list.';
						}
						echo '<div id="alert_passed" class="alert alert-info"  style="margin-top: 10px;">';			
						echo '<h4>Congratulation! You are selected in Freedom Fighter quota.</h4>';
						echo '<p>'.$cong_text.'</p>';
						echo '</div>';

						$passed = true;
						break;
					case "Tribal":
					case "TQ":
						$tribal_seats = $unit_info->tribal_seats;
						$cong_text = 'Your merit position is '.$merit_position.'.';
						if($merit_position > $tribal_seats)
						{
							$cong_text .= ' You are at position '.($merit_position-$tribal_seats).' of waiting list.';
						}
						else
						{
							$cong_text = ' You are in the main merit list.';
						}
						echo '<div id="alert_passed" class="alert alert-info"  style="margin-top: 10px;">';		
						echo '<h4>Congratulation! You are selected in Tribal quota.</h4>';
						echo '<p>'.$cong_text.'</p>';
						echo '</div>';

						$passed = true;
						break;
					default:
						echo '<div id="alert_failed" class="alert alert-danger"  style="margin-top: 10px;">';			
						echo '<h4>Sorry, you have failed.</h4>';
						echo '<p>You have not passed the admission test.';						
						if(empty($show_result_details) or empty($show_failers_details))
						{
							echo ' Futher details are not available.';
						}
						echo '</p>';
						echo '</div>';
						break;
				}
			}
			else 
			{
				echo '<div id="alert_failed" class="alert alert-danger"  style="margin-top: 10px;">';			
				echo '<h4>Sorry, you have failed.</h4>';
				echo '<p>You have not passed the admission test. Futher details are not available.</p>';
				echo '</div>';
			}
		}
		else
		{
			echo '<div id="alert_failed" class="alert alert-danger"  style="margin-top: 10px;">';			
			echo '<h4>Sorry, you have failed.</h4>';
			echo '<p>You have not passed the admission test. Futher details are not available.</p>';
			echo '</div>';
		}
	}	
?>

<?php	
	if($is_result_published and !empty($examinee))
	{
		if(empty($result))
		{
			echo View::make('public.result_summary_failed')->with('examinee', $examinee)->with('result', $result);	
		}
		else
		{
			echo View::make('public.result_summary')->with('examinee', $examinee)->with('result', $result);	
		}		

		echo View::make('public.examinee_details')->with('examinee', $examinee);

		if($show_result_details)
		{
			if(!$passed and !$show_failers_details)
			{

			}
			else
			{
				$result_details = DB::table('results_details')->where('exam_roll', $exam_roll)->first();
				if(!empty($result_details))
				{
					echo View::make('public.result_details')->with('result_details', $result_details);
				}
			
			}
		}
	}

	
?>


