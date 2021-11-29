<div class="cross_staining">
	<h6><u>19. Cross Staining:</u></h6>
	<p>Test
		Method: {!! Form::text('cross_staining["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<tbody>
			<tr>
				<th class="width-40p">Colour Change:</th>
				<td>
					{!! Form::text('cross_staining["color_change"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>Colour Staining:</th>
				<td>
					{!! Form::text('cross_staining["color_staining"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>