<div class="ph_value">
	<h6><u>14. PH Value:</u></h6>
	<p>Method
		Followed: {{ array_key_exists('test_method', $fabric_test_work_sheet->ph_value) ? $fabric_test_work_sheet->ph_value['test_method'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Sample</th>
				<th class="width-25p">PH</th>
				<th>Average</th>
				<th>Requirements</th>
				<th>Result</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>1</th>
				<td>
					{{ array_key_exists('one_ph', $fabric_test_work_sheet->ph_value) ? $fabric_test_work_sheet->ph_value['one_ph'] : '' }}
				</td>
				<td rowspan="3">
					{{ array_key_exists('average', $fabric_test_work_sheet->ph_value) ? $fabric_test_work_sheet->ph_value['average'] : '' }}
				</td>
				<td rowspan="3">
					{{ array_key_exists('requirements', $fabric_test_work_sheet->ph_value) ? $fabric_test_work_sheet->ph_value['requirements'] : '' }}
				</td>
				<td rowspan="3">
					{{ array_key_exists('result', $fabric_test_work_sheet->ph_value) ? $fabric_test_work_sheet->ph_value['result'] : '' }}
				</td>
			</tr>
			<tr>
				<th>2</th>
				<td>
					{{ array_key_exists('two_ph', $fabric_test_work_sheet->ph_value) ? $fabric_test_work_sheet->ph_value['two_ph'] : '' }}
				</td>
			</tr>
			<tr>
				<th>3</th>
				<td>
					{{ array_key_exists('three_ph', $fabric_test_work_sheet->ph_value) ? $fabric_test_work_sheet->ph_value['three_ph'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>