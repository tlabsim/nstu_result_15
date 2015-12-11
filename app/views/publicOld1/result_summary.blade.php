<div class="panel panel-default" style="margin-top: 10px; margin-bottom: 0px;">
<div class="panel-heading" style="margin: 0px 0px;"><h4 style="margin: 5px 10px;">Examinee details</h4></div>
<table class="table">
	<tbody>
		<tr>
			<td>Unit</td>
			<td><strong>{{ $examinee->unit }}</strong></td>
		</tr>
		<tr>
			<td>Exam roll</td>
			<td><strong>{{ $examinee->exam_roll }}</strong></td>
		</tr>
		<tr>
			<td>Name</td>
			<td>{{ $examinee->name }}</td>
		</tr>	
		<tr>
			<td>Merit position</td>
			<td>{{ $result->merit_position }}</td>
		</tr>
		<tr>
			<td>Admission test score</td>
			<td>{{ $result->score }}</td>
		</tr>
		<tr>
			<td>Total score</td>
			<td>{{ $result->total_score }}</td>
		</tr>		
	</tbody>
</table>
</div>