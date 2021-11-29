<div class="nickel_test">
	<h6><u>22. Nickel Test:</u></h6>
	<p>Test
		Method: {!! Form::text('nickel_test["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<tbody>
			<tr>
				<th class="width-25p">
					Accessories Name: {!! Form::text('nickel_test["accessories_name"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
				</th>
				<th class="width-25p">Cotton Bud</th>
				<th class="width-25p">Changed Color</th>
			</tr>
			<tr>
				<th>Test Result</th>
				<td>{!! Form::text('nickel_test["cotton_bud"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}</td>
				<td>{!! Form::text('nickel_test["changed_color"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>