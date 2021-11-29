<div class="color_fastness_to_washing">
	<h6><u>08. Colour Fastness to washing:</u></h6>
	<p>Test
		Method: {!! Form::text('color_fastness_to_washing["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Enter test method...']) !!}
		&nbsp; Test
		Condition: {!! Form::text('color_fastness_to_washing["test_condition"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
	</p>
	<p>
		Conditioning Before
		assessment: {!! Form::text('color_fastness_to_washing["conditioning_before_assessment"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
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
					{!! Form::text('color_fastness_to_washing["color_change"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_washing["acetate"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_washing["cotton"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_washing["nylon"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_washing["polyester"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_washing["acrylic"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_washing["wool"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
