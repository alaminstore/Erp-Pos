<div class="fabric_weight">
	<h6><u>02. Fabric Weight:</u></h6>
	<p>Test
		Method: {!! Form::text('fabric_weight["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<p>Sample condition before
		test {!! Form::text('fabric_weight["condition_before_test"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
		(Temp.20&#177;2&#176;C, Relative humidity 65&#177;4%)
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Test Condition</th>
				<th>1<sup>st</sup></th>
				<th>2<sup>nd</sup></th>
				<th>3<sup>rd</sup></th>
				<th>4<sup>th</sup></th>
				<th>5<sup>th</sup></th>
				<th>Average</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{!! Form::text('fabric_weight["test_condition"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('fabric_weight["first"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('fabric_weight["second"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('fabric_weight["third"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('fabric_weight["fourth"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('fabric_weight["fifth"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
				<td>
					{!! Form::text('fabric_weight["average"]', null,['class' => 'custom-input-field', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>