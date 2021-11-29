<div class="pilling_resistance">
	<h6><u>04. Pilling Resistance:</u></h6>
	<p>Method
		Followed: {{ $fabric_test_work_sheet->pilling_resistance['test_method'] }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">REV</th>
				<th class="width-25p">Grade</th>
				<th class="width-25p">Requirements</th>
				<th class="width-25p">Results</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Revolution</td>
				<td>
					{{ $fabric_test_work_sheet->pilling_resistance['grade'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->pilling_resistance['requirements'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->pilling_resistance['results'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>