<div class="appearance_after_wash">
	<h6><u>17. Appearance after wash:</u></h6>
	<p>Test
		Method: {{ array_key_exists('test_method', $fabric_test_work_sheet->appearance_after_wash) ? $fabric_test_work_sheet->appearance_after_wash['test_method'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">Test</th>
				<th class="width-25p">Lab Result
					(After {{ array_key_exists('no_of_wash', $fabric_test_work_sheet->appearance_after_wash) ? $fabric_test_work_sheet->appearance_after_wash['no_of_wash'] : '' }}
					Wash)
				</th>
				<th class="width-25p">Requirement</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{!! array_key_exists('test_description', $fabric_test_work_sheet->appearance_after_wash) ? $fabric_test_work_sheet->appearance_after_wash['test_description'] : '' !!}
				</td>
				<td>
					{!! array_key_exists('result_description', $fabric_test_work_sheet->appearance_after_wash) ? $fabric_test_work_sheet->appearance_after_wash['result_description'] : '' !!}
				</td>
				<td>
					{!! array_key_exists('requirement', $fabric_test_work_sheet->appearance_after_wash) ? $fabric_test_work_sheet->appearance_after_wash['requirement'] : '' !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>