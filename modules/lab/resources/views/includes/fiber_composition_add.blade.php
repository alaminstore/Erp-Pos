<div class="fiber_composition">
	<h6><u>21. Fiber Composition:</u></h6>
	<p>Test
		Method: {!! Form::text('fiber_composition["test_method"]', null,['class' => 'custom-input-field', 'placeholder' => 'Test method']) !!}
	</p>
	<div class="table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th class="width-25p">Cotton&#37;</th>
				<th class="width-25p">Polyester&#37;</th>
				<th class="width-25p">Viscose&#37;</th>
				<th class="width-25p">Others&#37;</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					{!! Form::text('fiber_composition["cotton"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
				<td>
					{!! Form::text('fiber_composition["polyester"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
				<td>
					{!! Form::text('fiber_composition["viscose"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
				<td>
					{!! Form::text('fiber_composition["others"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '', 'rows' => '3']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>