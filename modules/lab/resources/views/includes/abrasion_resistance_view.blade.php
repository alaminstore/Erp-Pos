<div class="abrasion_resistance">
	<h6><u>05. Abrasion Resistance:</u></h6>
	<p>Method
		Followed: {{ array_key_exists('test_method', $fabric_test_work_sheet->abrasion_resistance) ? $fabric_test_work_sheet->abrasion_resistance['test_method'] : '' }}
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
					{{ array_key_exists('grade', $fabric_test_work_sheet->abrasion_resistance) ? $fabric_test_work_sheet->abrasion_resistance['grade'] : '' }}
				</td>
				<td>
					{{ array_key_exists('requirements', $fabric_test_work_sheet->abrasion_resistance) ? $fabric_test_work_sheet->abrasion_resistance['requirements'] : '' }}
				</td>
				<td>
					{{ array_key_exists('results', $fabric_test_work_sheet->abrasion_resistance) ? $fabric_test_work_sheet->abrasion_resistance['results'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>