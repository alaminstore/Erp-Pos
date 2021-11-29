<div class="twisting">
	<h6><u>16. Twisting:</u></h6>
	<p>Test
		Method: {{ array_key_exists('test_method', $fabric_test_work_sheet->twisting) ? $fabric_test_work_sheet->twisting['test_method'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">After Wash</th>
				<th class="width-25p">Result</th>
				<th class="width-25p">Requirements</th>
				<th class="width-25p">Remarks</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>Spirality</th>
				<td>&#37;</td>
				<td>
					{{ array_key_exists('requirements', $fabric_test_work_sheet->twisting) ? $fabric_test_work_sheet->twisting['requirements'] : '' }}
				</td>
				<td>
					{{ array_key_exists('remarks', $fabric_test_work_sheet->twisting) ? $fabric_test_work_sheet->twisting['remarks'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>