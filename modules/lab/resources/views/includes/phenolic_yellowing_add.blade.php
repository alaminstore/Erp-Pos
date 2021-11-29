<div class="phenolic_yellowing">
	<h6><u>12. Phenolic Yellowing:</u></h6>
	<p> Method
		Followed: {!! Form::text('phenolic_yellowing["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Enter test method...']) !!}
	</p>
	<div class="col-md-12">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p"></th>
				<th class="width-25p">Grade</th>
				<th class="width-25p">Requirements</th>
				<th class="width-25p">Result</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Grade</td>
				<td>
					{!! Form::text('phenolic_yellowing["grade"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('phenolic_yellowing["requirements"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('phenolic_yellowing["result"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>

			</tr>
			</tbody>
		</table>
	</div>
</div>