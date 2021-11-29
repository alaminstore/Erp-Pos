<div class="nickel_test">
	<h6><u>22. Nickel Test:</u></h6>
	<p>Test
		Method: {{ array_key_exists('test_method', $fabric_test_work_sheet->nickel_test) ? $fabric_test_work_sheet->nickel_test['test_method'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<tbody>
			<tr>
				<th class="width-25p">
					Accessories Name: {{ array_key_exists('accessories_name', $fabric_test_work_sheet->nickel_test) ? $fabric_test_work_sheet->nickel_test['accessories_name'] : '' }}
				</th>
				<th class="width-25p">Cotton Bud</th>
				<th class="width-25p">Changed Color</th>
			</tr>
			<tr>
				<th>Test Result</th>
				<td>
					{{ array_key_exists('cotton_bud', $fabric_test_work_sheet->nickel_test) ? $fabric_test_work_sheet->nickel_test['cotton_bud'] : '' }}
				</td>
				<td>
					{{ array_key_exists('changed_color', $fabric_test_work_sheet->nickel_test) ? $fabric_test_work_sheet->nickel_test['changed_color'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>