<div id="accordion_examinee_details" class="collapse in">
	<div class="panel panel-default" style="margin-top: 10px; margin-bottom: 0px;">
		<div class="panel-heading">
			<h4 class="panel-title"><a class="" data-toggle="collapse" data-parent="#accordion_examinee_details" href="#collapse_examinee_details">More examinee details</a></h4>
		</div>
		<div id="collapse_examinee_details" class="panel-collapse collapse">
			<div class="panel-body">
				<table class="table" style="margin-bottom: 0px;">
					<tbody>						
						<tr>
							<td>Father's name</td>
							<td>{{ $examinee->father_name }}</td>
						</tr>
						<tr>
							<td>Mother's name</td>
							<td>{{ $examinee->mother_name }}</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>{{ $examinee->gender}}</td>
						</tr>
						<tr>
							<td>Date of birth</td>
							<td>{{ $examinee->dob}}</td>
						</tr>
						<tr>
							<td>Quota</td>
							<td>{{ $examinee->quota}}</td>
						</tr>
						<tr>
							<td>HSC board</td>
							<td>{{ $examinee->hsc_board }}</td>
						</tr>	
						<tr>
							<td>HSC group</td>
							<td>{{ $examinee->hsc_group }}</td>
						</tr>	
						<tr>
							<td>HSC roll</td>
							<td>{{ $examinee->hsc_roll }}</td>
						</tr>
						<tr>
							<td>HSC registration</td>
							<td>{{ $examinee->hsc_reg_no }}</td>
						</tr>	
						<tr>
							<td>HSC GPA</td>
							<td>{{ number_format($examinee->hsc_gpa, 2) }}</td>
						</tr>		
						<tr>
							<td>HSC GPA excluding 4th subject</td>
							<td>{{ number_format($examinee->hsc_gpa_ex_fourth, 2) }}</td>
						</tr>
						<tr>
							<td>SSC board</td>
							<td>{{ $examinee->ssc_board }}</td>
						</tr>	
						<tr>
							<td>SSC group</td>
							<td>{{ $examinee->ssc_group }}</td>
						</tr>	
						<tr>
							<td>SSC roll</td>
							<td>{{ $examinee->ssc_roll }}</td>
						</tr>
						<tr>
							<td>SSC registration</td>
							<td>{{ $examinee->ssc_reg_no }}</td>
						</tr>	
						<tr>
							<td>SSC GPA</td>
							<td>{{ number_format($examinee->ssc_gpa, 2) }}</td>
						</tr>		
						<tr>
							<td>SSC GPA excluding 4th subject</td>
							<td>{{ number_format($examinee->ssc_gpa_ex_fourth, 2) }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>