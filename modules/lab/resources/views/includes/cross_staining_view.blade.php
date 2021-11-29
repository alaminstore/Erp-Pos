<div class="cross_staining">
	<h6><u>19. Cross Staining:</u></h6>
	<p>Test
		Method: {{ array_key_exists('test_method', $fabric_test_work_sheet->cross_staining) ? $fabric_test_work_sheet->cross_staining['test_method'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<tbody>
			<tr>
				<th class="width-40p">Colour Change:</th>
				<td>
					{{ array_key_exists('color_change', $fabric_test_work_sheet->cross_staining) ? $fabric_test_work_sheet->cross_staining['color_change'] : '' }}
				</td>
			</tr>
			<tr>
				<th>Colour Staining:</th>
				<td>
					{{ array_key_exists('color_staining', $fabric_test_work_sheet->cross_staining) ? $fabric_test_work_sheet->cross_staining['color_staining'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>