<div class="stitch_recovery">
	<h6><u>07. Stitch Recovery:</u></h6>
	<p>Test
		Method: {!! Form::text('stitch_recovery["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
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
					{!! Form::text('stitch_recovery["elongation_at_fourteen_point_seven_n"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('stitch_recovery["elongation_at_thirty_sec"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('stitch_recovery["elongation_at_one_min"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('stitch_recovery["elongation_at_thirty_min"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>