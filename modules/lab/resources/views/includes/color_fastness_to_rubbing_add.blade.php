<div class="color_fastness_to_rubbing">
	<h6><u>01. Colour Fastness to Rubbing:</u></h6>
	<p>Test
		Method: {!! Form::text('color_fastness_to_rubbing["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<p>Sample condition before
		test {!! Form::text('color_fastness_to_rubbing["condition_before_test"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
		/
		Conditioning before
		assessment {!! Form::text('color_fastness_to_rubbing["conditioning_before_assessment"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
		(Temp.20&#177;2&#176;C, Relative humidity 65&#177;4%)
	</p>
	<div class="col-md-8 col-md-offset-2">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Test Condition</th>
				<th>Result</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>Dry</th>
				<td>
					{!! Form::text('color_fastness_to_rubbing["dry_result"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>Wet</th>
				<td>
					{!! Form::text('color_fastness_to_rubbing["wet_result"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>