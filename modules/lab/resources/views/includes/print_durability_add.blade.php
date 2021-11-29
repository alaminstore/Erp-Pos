<div class="print_durability">
	<h6><u>18. Print durability:</u></h6>
	<p>Test
		Method: {!! Form::text('print_durability["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">Test</th>
				<th class="width-25p">Lab Result
					(After {!! Form::text('print_durability["no_of_wash"]', null,['class' => 'custom-input-field', 'placeholder' => '...', 'style' => 'width: 40px;text-align: center;']) !!}
					Wash)
				</th>
				<th class="width-25p">Requirement</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{!! Form::textarea('print_durability["test_description"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
				<td>
					{!! Form::textarea('print_durability["result_description"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
				<td>
					{!! Form::textarea('print_durability["requirement"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>