<div class="fabric_weight">
	<h6><u>02. Fabric Weight:</u></h6>
	<p>Test
		Method: {{ $fabric_test_work_sheet->fabric_weight['test_method'] }}
	</p>
	<p>Sample condition before
		test {{ $fabric_test_work_sheet->fabric_weight['condition_before_test'] }}
		(Temp.20&#177;2&#176;C, Relative humidity 65&#177;4%)
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Test Condition</th>
				<th>1<sup>st</sup></th>
				<th>2<sup>nd</sup></th>
				<th>3<sup>rd</sup></th>
				<th>4<sup>th</sup></th>
				<th>5<sup>th</sup></th>
				<th>Average</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{{ $fabric_test_work_sheet->fabric_weight['test_condition'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->fabric_weight['first'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->fabric_weight['second'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->fabric_weight['third'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->fabric_weight['fourth'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->fabric_weight['fifth'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->fabric_weight['average'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>