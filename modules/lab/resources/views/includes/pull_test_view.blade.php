<div class="pull_test">
	<h6><u>06. Pull Test:</u></h6>
	<p>Test
		Method: {{ $fabric_test_work_sheet->pull_test['test_method'] }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<tbody>
			<tr>
				<th rowspan="2" class="width-25p">COLOR:</th>
				<td rowspan="2" class="width-25p">
					{{ $fabric_test_work_sheet->pull_test['color'] }}
				</td>
				<th class="width-25p">PASS</th>
				<td class="width-25p">
					{{ $fabric_test_work_sheet->pull_test['pass'] }}
				</td>
			</tr>
			<tr>
				<th>FAIL</th>
				<td>
					{{ $fabric_test_work_sheet->pull_test['fail'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>