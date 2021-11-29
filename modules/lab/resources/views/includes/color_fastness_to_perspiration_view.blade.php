<div class="color_fastness_to_perspiration">
	<h6><u>10. Colour Fastness to Perspiration:</u></h6>
	<p>Test
		Method: {{ $fabric_test_work_sheet->color_fastness_to_perspiration['test_method'] }}
	</p>
	<p>
		Conditioning Before
		assessment: {{ $fabric_test_work_sheet->color_fastness_to_perspiration['conditioning_before_assessment'] }}
		(Temp.20&#177;2&#8451;, Relative humidity 65&#177;4%)
	</p>
	<div class="col-md-12">
		<table class="reportTable">
			<thead>
			<tr>
				<th rowspan="2" class="width_th">Test</th>
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
				<td>Acid</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['acid_color_change'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['acid_acetate'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['acid_cotton'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['acid_nylon'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['acid_polyester'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['acid_acrylic'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['acid_wool'] }}
				</td>
			
			</tr>
			<tr>
				<td>Alkali</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['alkali_color_change'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['alkali_acetate'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['alkali_cotton'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['alkali_nylon'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['alkali_polyester'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['alkali_acrylic'] }}
				</td>
				<td>
					{{ $fabric_test_work_sheet->color_fastness_to_perspiration['alkali_wool'] }}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
