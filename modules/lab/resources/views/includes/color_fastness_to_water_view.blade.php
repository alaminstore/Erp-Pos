<div class="color_fastness_to_water">
	<h6><u>09. Colour Fastness to water:</u></h6>
	<p>Test
		Method: {{ $fabric_test_work_sheet->color_fastness_to_water['test_method'] }}
	</p>
	<p>
		Conditioning Before
		assessment: {{ $fabric_test_work_sheet->color_fastness_to_water['conditioning_before_assessment'] }}
		(Temp.20&#177;2&#8451;, Relative humidity 65&#177;4%)
	</p>
	
	<div class="col-md-12">
		<table class="reportTable">
			<thead>
			<tr>
				<th rowspan="2" class="width-25p">Colour Change</th>
				<th colspan="6">Staining On</th>
			</tr>
			<tr>
				<td>Acetate</td>
				<td>Cotton</td>
				<td>Nylon</td>
				<td>Polyester</td>
				<td>Acrylic</td>
				<td>Wool</td>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_water['color_change'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_water['acetate'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_water['cotton'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_water['nylon'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_water['polyester'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_water['acrylic'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_water['wool'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
