<div class="print_durability">
	<h6><u>18. Print durability:</u></h6>
	<p>Test
		Method: {{ array_key_exists('test_method', $fabric_test_work_sheet->print_durability) ? $fabric_test_work_sheet->print_durability['test_method'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">Test</th>
				<th class="width-25p">Lab Result
					(After {{ array_key_exists('no_of_wash', $fabric_test_work_sheet->print_durability) ? $fabric_test_work_sheet->print_durability['no_of_wash'] : '' }}
					Wash)
				</th>
				<th class="width-25p">Requirement</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{{ array_key_exists('test_description', $fabric_test_work_sheet->print_durability) ? $fabric_test_work_sheet->print_durability['test_description'] : '' }}
				</td>
				<td>
					{{ array_key_exists('result_description', $fabric_test_work_sheet->print_durability) ? $fabric_test_work_sheet->print_durability['result_description'] : '' }}
				</td>
				<td>
					{{ array_key_exists('requirement', $fabric_test_work_sheet->print_durability) ? $fabric_test_work_sheet->print_durability['requirement'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>