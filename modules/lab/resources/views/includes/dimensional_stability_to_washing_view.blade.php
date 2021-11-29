<div class="dimensional_stability_to_washing">
	<h6><u>15. Dimensional Stability to Washing:</u></h6>
	<p>Test
		Method: {{ array_key_exists('test_method', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['test_method'] : '' }}
		FOLLOWED BY DRY: {{ array_key_exists('followed_by_dry', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['followed_by_dry'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>After Wash</th>
				<th>Percentage</th>
				<th>Requirement</th>
				<th>Remarks</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th class="width-25p">Length Wise:</th>
				<td>
					{{ array_key_exists('length_wise_percentage', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['length_wise_percentage'] : '' }}
				</td>
				<td>
					{{ array_key_exists('length_wise_requirement', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['length_wise_requirement'] : '' }}
				</td>
				<td>
					{{ array_key_exists('length_wise_remarks', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['length_wise_remarks'] : '' }}
				</td>
			</tr>
			<tr>
				<th class="width-25p">Width Wise:</th>
				<td>
					{{ array_key_exists('width_wise_percentage', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['width_wise_percentage'] : '' }}
				</td>
				<td>
					{{ array_key_exists('width_wise_requirement', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['width_wise_requirement'] : '' }}
				</td>
				<td>
					{{ array_key_exists('width_wise_remarks', $fabric_test_work_sheet->dimensional_stability_to_washing) ? $fabric_test_work_sheet->dimensional_stability_to_washing['width_wise_remarks'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>