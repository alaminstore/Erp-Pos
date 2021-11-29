<div class="color_fastness_to_rubbing">
	<h6><u>01. Colour Fastness to Rubbing:</u></h6>
	<p>Test
		Method: {{ $fabric_test_work_sheet->color_fastness_to_rubbing['test_method'] }}
	</p>
	<p>Sample condition before
		test {{ $fabric_test_work_sheet->color_fastness_to_rubbing['condition_before_test'] }}
		/
		Conditioning before
		assessment {{ $fabric_test_work_sheet->color_fastness_to_rubbing['conditioning_before_assessment'] }}
		(Temp.20&#177;2&#176;C, Relative humidity 65&#177;4%)
	</p>
	<div class="col-md-8 col-md-offset-2">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Test Condition</th>
				<th>Result</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>Dry</th>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_rubbing['dry_result'] }}
				</td>
			</tr>
			<tr>
				<th>Wet</th>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_rubbing['wet_result'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>