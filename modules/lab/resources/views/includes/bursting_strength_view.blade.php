<div class="bursting_strength">
	<h6><u>03. Bursting Strength:</u></h6>
	<p>Method
		Followed: {{ $fabric_test_work_sheet->bursting_strength['test_method'] }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Test Name</th>
				<th>Average</th>
				<th>Tested Area</th>
				<th>Requirements</th>
				<th>Results</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Bursting Strength</td>
				<td>
					{{ $fabric_test_work_sheet->bursting_strength['average'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->bursting_strength['tested_area'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->bursting_strength['requirements'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->bursting_strength['results'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>