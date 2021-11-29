<div class="color_fastness_to_light">
	<h6><u>13. Color Fastness to Light:</u></h6>
	<p>Method
		Followed: {!! Form::text('color_fastness_to_light["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}&nbsp;
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<td class="width-25p">{!! Form::text('color_fastness_to_light["test_sample"]', null,['class' => 'custom-input-field', 'placeholder' => 'Type here...']) !!}</td>
				<th class="width-25p">Grade</th>
				<th class="width-25p">Requirements</th>
				<th class="width-25p">Remarks</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>Grade</th>
				<td>
					{!! Form::text('color_fastness_to_light["grade"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_light["requirements"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('color_fastness_to_light["remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
