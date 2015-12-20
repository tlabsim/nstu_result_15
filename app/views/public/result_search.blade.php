<form action="/result" method="post" onsubmit="return validateSearchForm(this);"> 
	<div class="input-group form-search">
		<input placeholder="Search by exam roll" id="search_by_roll" class="form-control search-query" name="roll" value="{{ isset($roll) ? $roll : ''; }}"> 
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
	$result = null;
	$show_examinee_details = true;

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
			$show_result_details = Settings::GetSettings('show_result_details') | true;
			$show_failers_details = Settings::GetSettings('show_failers_details') | false;

			$list = $result->list;
			$group = $result->group;
			$igwr = $result->is_groupwise | false;
			$merit_position = $result->merit_position;
			$cum_merit = $result->cumulative_merit_position;
			$total_seats = $unit_info->total_seats;
			$igw = $unit_info->is_groupwise | false;

			if(!empty($merit_position))
			{
				switch($list)
				{
					case "Merit":													

						if(!$igw || empty($group))
						{
							$cong_text = 'Your merit position is '.$merit_position.'.';

							if($merit_position > $total_seats)
							{
								$cong_text .= ' You are at position '.($merit_position-$total_seats).' of waiting list.';
							}
							else
							{
								$cong_text .= ' You are in the main merit list.';
							}
						}
						else
						{
							$group_seats = 0;

							switch(strtolower($group))
							{
								case 'science':
									$group_seats = $unit_info->science_seats;
									break;
								case 'humanities':
								case 'arts':
									$group_seats = $unit_info->humanities_seats;
									break;
								case 'commerce':
								case 'business':
								case 'business studies':
									$group_seats = $unit_info->commerce_seats;
									break;
								default:
									$group_seats = 0;
									break;
							}

							$cong_text = 'Your merit position is '.$merit_position." in ".$group." group.";

							if($merit_position > $group_seats)
							{
								$cong_text .= ' You are at position '.($merit_position-$group_seats).' of waiting list (in '.$group.' group).';
							}
							else
							{
								$cong_text .= ' You are in the main (non-waiting) merit list.';
							}

						}						

						echo '<div id="alert_passed" class="alert alert-info"  style="margin-top: 10px;">';			
						echo '<h4>Congratulation! You are in the merit list.</h4>';
						echo '<p>'.$cong_text.'</p>';
						echo '<br><a class="btn btn-primary" href="/instructions">See the instructions</a>';
						echo '</div>';

						$passed = true;
						break;

					case "FFQ":
					case "FF":
						$ff_seats = 0;

						if(!$igw || empty($group))
						{
							$ff_seats = $unit_info->ff_seats;

							$cong_text = 'Your merit position is '.$merit_position.'.';
						
							if($merit_position > $ff_seats)
							{
								$cong_text .= ' You are at position '.($merit_position-$ff_seats).' of quota waiting list.';
							}
							else
							{
								$cong_text .= ' You are in the main (non-waiting) list.';
							}

							if(!empty($cum_merit) and is_numeric($cum_merit))
							{
								$cong_text .= '<br>Your cumulative merit position is '.$cum_merit.'.';

								if($cum_merit > $total_seats)
								{
									$cong_text .= ' You are at position '.($cum_merit-$total_seats).' of merit waiting list.';
								}
								else
								{
									$cong_text .= ' So, you are also in the main merit list.';
								}
							}
						}
						else
						{
							switch(strtolower($group))
							{
								case 'science':
									$ff_seats = $unit_info->ff_science_seats;
									break;
								case 'humanities':
								case 'arts':
									$ff_seats = $unit_info->ff_humanities_seats;
									break;
								case 'commerce':
								case 'business':
								case 'business studies':
									$ff_seats = $unit_info->ff_commerce_seats;
									break;
								default:
									$ff_seats = 0;
									break;
							}

							$cong_text = 'Your merit position (in '.$group.' group quota) is '.$merit_position.'.';
						
							if($merit_position > $ff_seats)
							{
								$cong_text .= ' You are at position '.($merit_position-$ff_seats).' of '.$group .' group quota waiting list.';
							}
							else
							{
								$cong_text .= ' You are in the main (non-waiting) list for '.$group .' group.';
							}


							if(!empty($cum_merit) and is_numeric($cum_merit))
							{
								$cong_text .= '<br>Your cumulative merit position is '.$cum_merit.'.';

								if(!$igwr)
								{
									if($cum_merit > $total_seats)
									{
										$cong_text .= ' You are at position '.($cum_merit-$total_seats).' of merit waiting list.';
									}
									else
									{
										$cong_text .= ' So, you are also in the main merit list.';
									}
								}
								else
								{
									$group_seats = 0;

									switch(strtolower($group))
									{
										case 'science':
											$group_seats = $unit_info->science_seats;
											break;
										case 'humanities':
										case 'arts':
											$group_seats = $unit_info->humanities_seats;
											break;
										case 'commerce':
										case 'business':
										case 'business studies':
											$group_seats = $unit_info->commerce_seats;
											break;
										default:
											$group_seats = 0;
											break;
									}

									if($cum_merit > $group_seats)
									{
										$cong_text .= ' You are at position '.($cum_merit-$group_seats).' of merit waiting list for '.$group.' group.';
									}
									else
									{
										$cong_text .= ' So, you are also in the main merit list for '.$group.' group.';
									}
								}
							}	
						}		

						echo '<div id="alert_passed" class="alert alert-info"  style="margin-top: 10px;">';			
						echo '<h4>Congratulation! You are enlisted in Freedom Fighter quota.</h4>';
						echo '<p>'.$cong_text.'</p>';
						echo '<br><a class="btn btn-primary" href="/instructions">See the instructions</a>';
						echo '</div>';

						$passed = true;
						break;

					case "Tribal":
					case "TQ":
						$tribal_seats = 0;

						if(!$igw || empty($group))
						{
							$tribal_seats = $unit_info->tribal_seats;

							$cong_text = 'Your merit position is '.$merit_position.'.';
						
							if($merit_position > $tribal_seats)
							{
								$cong_text .= ' You are at position '.($merit_position-$tribal_seats).' of quota waiting list.';
							}
							else
							{
								$cong_text .= ' You are in the main (non-waiting) list.';
							}

							if(!empty($cum_merit) and is_numeric($cum_merit))
							{
								$cong_text .= '<br>Your cumulative merit position is '.$cum_merit.'.';

								if($cum_merit > $total_seats)
								{
									$cong_text .= ' You are at position '.($cum_merit-$total_seats).' of merit waiting list.';
								}
								else
								{
									$cong_text .= ' So, you are also in the main merit list.';
								}
							}
						}
						else
						{
							switch(strtolower($group))
							{
								case 'science':
									$tribal_seats = $unit_info->tribal_science_seats;
									break;
								case 'humanities':
								case 'arts':
									$tribal_seats = $unit_info->tribal_humanities_seats;
									break;
								case 'commerce':
								case 'business':
								case 'business studies':
									$tribal_seats = $unit_info->tribal_commerce_seats;
									break;
								default:
									$tribal_seats = 0;
									break;
							}

							$cong_text = 'Your merit position (in '.$group.' group quota) is '.$merit_position.'.';
						
							if($merit_position > $tribal_seats)
							{
								$cong_text .= ' You are at position '.($merit_position-$tribal_seats).' of '.$group .' group quota waiting list.';
							}
							else
							{
								$cong_text .= ' You are in the main (non-waiting) list for '.$group .' group.';
							}


							if(!empty($cum_merit) and is_numeric($cum_merit))
							{
								$cong_text .= '<br>Your cumulative merit position is '.$cum_merit.'.';

								if(!$igwr)
								{
									if($cum_merit > $total_seats)
									{
										$cong_text .= ' You are at position '.($cum_merit-$total_seats).' of merit waiting list.';
									}
									else
									{
										$cong_text .= ' So, you are also in the main merit list.';
									}
								}
								else
								{
									$group_seats = 0;

									switch(strtolower($group))
									{
										case 'science':
											$group_seats = $unit_info->science_seats;
											break;
										case 'humanities':
										case 'arts':
											$group_seats = $unit_info->humanities_seats;
											break;
										case 'commerce':
										case 'business':
										case 'business studies':
											$group_seats = $unit_info->commerce_seats;
											break;
										default:
											$group_seats = 0;
											break;
									}

									if($cum_merit > $group_seats)
									{
										$cong_text .= ' You are at position '.($cum_merit-$group_seats).' of merit waiting list for '.$group.' group.';
									}
									else
									{
										$cong_text .= ' So, you are also in the main merit list for '.$group.' group.';
									}
								}
							}	
						}						
						

						echo '<div id="alert_passed" class="alert alert-info"  style="margin-top: 10px;">';		
						echo '<h4>Congratulation! You are enlisted in Tribal quota.</h4>';
						echo '<p>'.$cong_text.'</p>';
						echo '<br><a class="btn btn-primary" href="/instructions">See the instructions</a>';
						echo '</div>';

						$passed = true;
						break;

					case 'PDQ':	
						$cong_text = 'Your merit position is '.$merit_position.'.';					
						
						echo '<div id="alert_passed" class="alert alert-info"  style="margin-top: 10px;">';		
						echo '<h4>Congratulation! You are enlisted in Physically Disabled quota.</h4>';
						echo '<p>'.$cong_text.'</p>';
						echo '<br><a class="btn btn-primary" href="/instructions">See the instructions</a>';
						echo '</div>';

						$passed = true;
						break;

					case 'Invalid':
						echo '<div id="alert_failed" class="alert alert-danger"  style="margin-top: 10px;">';			
						echo '<h4>Sorry, your roll is marked as invalid.</h4>';
						echo '<p>May be there was some problem in your answer script or with any of you documents. You are considered as failed.</p>';						
						echo '</div>';
						break;

					case 'No':
					case "Fail":	
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
			if ($show_examinee_details)
			{
				echo View::make('public.result_summary_failed')->with('examinee', $examinee)->with('result', $result);	
			}			
		}
		else
		{
			if ($show_examinee_details)
			{
				echo View::make('public.result_summary')->with('examinee', $examinee)->with('result', $result);	
			}
		}	

		if($show_examinee_details)
		{
			echo View::make('public.examinee_details')->with('examinee', $examinee);
		}		

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


