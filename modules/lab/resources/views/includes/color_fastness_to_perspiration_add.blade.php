<div class="color_fastness_to_perspiration">
	<h6><u>10. Colour Fastness to Perspiration:</u></h6>
	<p>Test
		Method: {!! Form::text('color_fastness_to_perspiration["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Enter test method...']) !!}
	</p>
	<p>
		Conditioning Before
		assessment: {!! Form::text('color_fastness_to_perspiration["conditioning_before_assessment"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
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
					{!! Form::text('color_fastness_to_perspiration["acid_color_change"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["acid_acetate"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["acid_cotton"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["acid_nylon"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["acid_polyester"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["acid_acrylic"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["acid_wool"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			
			</tr>
			<tr>
				<td>Alkali</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["alkali_color_change"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["alkali_acetate"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["alkali_cotton"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["alkali_nylon"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["alkali_polyester"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["alkali_acrylic"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_perspiration["alkali_wool"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
