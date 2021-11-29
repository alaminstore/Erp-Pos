<div class="pull_test">
	<h6><u>06. Pull Test:</u></h6>
	<p>Test
		Method: {!! Form::text('pull_test["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<tbody>
			<tr>
				<th rowspan="2" class="width-25p">COLOR:</th>
				<td rowspan="2" class="width-25p">
					{!! Form::text('pull_test["color"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
				</td>
				<th class="width-25p">PASS</th>
				<td class="width-25p">
					{!! Form::text('pull_test["pass"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>FAIL</th>
				<td>
					{!! Form::text('pull_test["fail"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>