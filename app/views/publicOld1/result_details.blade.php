<div id ="accordion_result_details" class="collapse in">
	<div class="panel panel-default" style="margin-top:10px; margin-bottom: 0px;">
		<div class="panel-heading">
			<h4 class="panel-title"><a class="" data-toggle="collapse" data-parent="#accordion_result_details" href="#collapse_result_details">Result details</a></h4>
		</div>
		<div style="" id="collapse_result_details" class="panel-collapse collapse">
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Subject</th>
							<th>Marks obtained</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($result_details->physics))
							{
								echo '<tr><td>Physics</td><td>';
								echo $result_details->physics;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->chemistry))
							{
								echo '<tr><td>Chemistry</td><td>';
								echo $result_details->chemistry;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->biology))
							{
								echo '<tr><td>Biology</td><td>';
								echo $result_details->biology;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->math))
							{
								echo '<tr><td>Mathematics</td><td>';
								echo $result_details->math;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->ban_eng))
							{
								echo '<tr><td>Bangla and English</td><td>';
								echo $result_details->ban_eng;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->bangla))
							{
								echo '<tr><td>Bangla</td><td>';
								echo $result_details->bangla;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->english))
							{
								echo '<tr><td>English</td><td>';
								echo $result_details->english;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->analytical_ability))
							{
								echo '<tr><td>Analytical ability</td><td>';
								echo $result_details->analytical_ability;
								echo '</td></tr>';
							}
						?>
						<?php
							if(!empty($result_details->general_knowledge))
							{
								echo '<tr><td>General knowledge</td><td>';
								echo $result_details->general_knowledge;
								echo '</td></tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>