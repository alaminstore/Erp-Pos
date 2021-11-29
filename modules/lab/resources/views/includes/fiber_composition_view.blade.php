<div class="fiber_composition">
	<h6><u>21. Fiber Composition:</u></h6>
	<p>Test
		Method: {{ array_key_exists('test_method', $fabric_test_work_sheet->fiber_composition) ? $fabric_test_work_sheet->fiber_composition['test_method'] : '' }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">Cotton&#37;</th>
				<th class="width-25p">Polyester&#37;</th>
				<th class="width-25p">Viscose&#37;</th>
				<th class="width-25p">Others&#37;</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{{ array_key_exists('cotton', $fabric_test_work_sheet->fiber_composition) ? $fabric_test_work_sheet->fiber_composition['cotton'] : '' }}
				</td>
				<td>
					{{ array_key_exists('polyester', $fabric_test_work_sheet->fiber_composition) ? $fabric_test_work_sheet->fiber_composition['polyester'] : '' }}
				</td>
				<td>
					{{ array_key_exists('viscose', $fabric_test_work_sheet->fiber_composition) ? $fabric_test_work_sheet->fiber_composition['viscose'] : '' }}
				</td>
				<td>
					{{ array_key_exists('others', $fabric_test_work_sheet->fiber_composition) ? $fabric_test_work_sheet->fiber_composition['others'] : '' }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>