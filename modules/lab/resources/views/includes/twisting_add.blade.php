<div class="twisting">
	<h6><u>16. Twisting:</u></h6>
	<p>Test
		Method: {!! Form::text('twisting["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}&nbsp;
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">After Wash</th>
				<th class="width-25p">Result</th>
				<th class="width-25p">Requirements</th>
				<th class="width-25p">Remarks</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>Spirality</th>
				<td>&#37;</td>
				<td>
					{!! Form::text('twisting["requirements"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('twisting["remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>