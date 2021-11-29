<div class="stitch_recovery">
	<h6><u>07. Stitch Recovery:</u></h6>
	<p>Test
		Method: {{ $fabric_test_work_sheet->stitch_recovery['test_method'] }}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">Elongation at 14.71N(&#37;)</th>
				<th class="width-25p">Recovered Elongation at 30 secs(&#37;)</th>
				<th class="width-25p">Recovered Elongation at 1 mins (&#37;)</th>
				<th class="width-25p">Recovered Elongation at 30 mins (&#37;)</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{{ $fabric_test_work_sheet->stitch_recovery['elongation_at_fourteen_point_seven_n'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->stitch_recovery['elongation_at_thirty_sec'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->stitch_recovery['elongation_at_one_min'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->stitch_recovery['elongation_at_thirty_min'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>