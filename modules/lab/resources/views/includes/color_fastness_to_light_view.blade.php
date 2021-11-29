<div class="color_fastness_to_light">
	<h6><u>13. Color Fastness to Light:</u></h6>
	<p>Method
		Followed: {{ array_key_exists('test_method', $fabric_test_work_sheet->color_fastness_to_light) ? $fabric_test_work_sheet->color_fastness_to_light['test_method']: '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<td class="width-25p">{{ array_key_exists('test_method', $fabric_test_work_sheet->color_fastness_to_light) ? $fabric_test_work_sheet->color_fastness_to_light['test_sample']: '' }}</td>
				<th class="width-25p">Grade</th>
				<th class="width-25p">Requirements</th>
				<th class="width-25p">Remarks</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>Grade</th>
				<td>
					{{ array_key_exists('grade', $fabric_test_work_sheet->color_fastness_to_light) ? $fabric_test_work_sheet->color_fastness_to_light['grade']: '' }}
				</td>
				<td>
					{{ array_key_exists('requirements', $fabric_test_work_sheet->color_fastness_to_light) ? $fabric_test_work_sheet->color_fastness_to_light['requirements']: '' }}
				</td>
				<td>
					{{ array_key_exists('remarks', $fabric_test_work_sheet->color_fastness_to_light) ? $fabric_test_work_sheet->color_fastness_to_light['remarks']: '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
