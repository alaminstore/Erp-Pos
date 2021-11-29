<div class="bursting_strength">
	<h6><u>03. Bursting Strength:</u></h6>
	<p>Method
		Followed: {!! Form::text('bursting_strength["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Test Name</th>
				<th>Average</th>
				<th>Tested Area</th>
				<th>Requirements</th>
				<th>Results</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Bursting Strength</td>
				<td>
					{!! Form::text('bursting_strength["average"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('bursting_strength["tested_area"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('bursting_strength["requirements"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('bursting_strength["results"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>