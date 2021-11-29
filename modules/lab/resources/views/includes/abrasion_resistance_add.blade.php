<div class="abrasion_resistance">
	<h6><u>05. Abrasion Resistance:</u></h6>
	<p>Method
		Followed: {!! Form::text('abrasion_resistance["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">REV</th>
				<th class="width-25p">Grade</th>
				<th class="width-25p">Requirements</th>
				<th class="width-25p">Results</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Revolution</td>
				<td>
					{!! Form::text('abrasion_resistance["grade"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('abrasion_resistance["requirements"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('abrasion_resistance["results"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>