<div class="dimensional_stability_to_washing">
	<h6><u>15. Dimensional Stability to Washing:</u></h6>
	<p>Test
		Method: {!! Form::text('dimensional_stability_to_washing["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}&nbsp;
		FOLLOWED BY DRY: {!! Form::text('dimensional_stability_to_washing["followed_by_dry"]', null,['class' => 'custom-input-field', 'placeholder' => '']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>After Wash</th>
				<th>Percentage</th>
				<th>Requirement</th>
				<th>Remarks</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th class="width-25p">Length Wise:</th>
				<td>
					{!! Form::text('dimensional_stability_to_washing["length_wise_percentage"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('dimensional_stability_to_washing["length_wise_requirement"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('dimensional_stability_to_washing["length_wise_remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th class="width-25p">Width Wise:</th>
				<td>
					{!! Form::text('dimensional_stability_to_washing["width_wise_percentage"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('dimensional_stability_to_washing["width_wise_requirement"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('dimensional_stability_to_washing["width_wise_remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>