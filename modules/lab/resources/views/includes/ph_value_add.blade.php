<div class="ph_value">
	<h6><u>14. PH Value:</u></h6>
	<p>Method
		Followed: {!! Form::text('ph_value["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Sample</th>
				<th class="width-25p">PH</th>
				<th>Average</th>
				<th>Requirements</th>
				<th>Result</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>1</th>
				<td>
					{!! Form::text('ph_value["one_ph"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td rowspan="3">
					{!! Form::textarea('ph_value["average"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows'=> '2']) !!}
				</td>
				<td rowspan="3">
					{!! Form::textarea('ph_value["requirements"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows'=> '2']) !!}
				</td>
				<td rowspan="3">
					{!! Form::textarea('ph_value["result"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows'=> '2']) !!}
				</td>
			</tr>
			<tr>
				<th>2</th>
				<td>
					{!! Form::text('ph_value["two_ph"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>3</th>
				<td>
					{!! Form::text('ph_value["three_ph"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>