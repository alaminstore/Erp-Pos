<div class="appearance_after_wash">
	<h6><u>17. Appearance after wash:</u></h6>
	<p>Test
		Method: {!! Form::text('appearance_after_wash["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">Test</th>
				<th class="width-25p">Lab Result
					(After {!! Form::text('appearance_after_wash["no_of_wash"]', null,['class' => 'custom-input-field', 'placeholder' => '...', 'style' => 'width: 40px;text-align: center;']) !!}
					Wash)
				</th>
				<th class="width-25p">Requirement</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{!! Form::textarea('appearance_after_wash["test_description"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
				<td>
					{!! Form::textarea('appearance_after_wash["result_description"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
				<td>
					{!! Form::textarea('appearance_after_wash["requirement"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>