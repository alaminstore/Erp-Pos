<div class="yarn_test">
	<div class="col-md-12 table-responsive">
		<table class="reportTable">
			<tbody>
			<tr>
				<th colspan="4" style="text-align: left;">Test Sample General Information</th>
			</tr>
			<tr>
				<th class="width-25p">Submitted By</th>
				<td class="width-25p">
					{!! Form::text('submitted_by', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<th class="width-25p">Lab. No.</th>
				<td class="width-25p">
					{!! Form::text('lab_no', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th class="width-25p">Lot No</th>
				<td class="width-25p">
					{!! Form::text('lot_no', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<th class="width-25p">Date In</th>
				<td class="width-25p">
					{!! Form::date('date_in', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th class="width-25p">Brand</th>
				<td class="width-25p">
					{!! Form::text('brand', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<th class="width-25p">Date Out</th>
				<td class="width-25p">
					{!! Form::date('date_out', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th class="width-25p">Count</th>
				<td class="width-25p">
					{!! Form::text('count', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<th class="width-25p">&nbsp;</th>
				<th class="width-25p">&nbsp;</th>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-12 table-responsive">
		<table class="reportTable">
			<thead>
			<tr>
				<th>Test Result</th>
				<th>Sample-&#8544;</th>
				<th>Sample-&#8544;&#8544;</th>
				<th>Sample-&#8544;&#8544;&#8544;</th>
				<th>Average</th>
				<th>CV &#37;</th>
				<th>Remarks</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th>Sample weight in gm</th>
				<td>
					{!! Form::text('yarn_test_results["sample_weight_sample_1"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["sample_weight_sample_2"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["sample_weight_sample_3"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["sample_weight_average"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["sample_weight_cv"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["sample_weight_remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>Count(Ne)</th>
				<td>
					{!! Form::text('yarn_test_results["count_sample_1"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["count_sample_2"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["count_sample_3"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["count_average"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["count_cv"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["count_remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>Strength(lbf)</th>
				<td>
					{!! Form::text('yarn_test_results["strength_sample_1"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["strength_sample_2"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["strength_sample_3"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["strength_average"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["strength_cv"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["strength_remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>CSP</th>
				<td>
					{!! Form::text('yarn_test_results["csp_sample_1"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["csp_sample_2"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["csp_sample_3"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["csp_average"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["csp_cv"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["csp_remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			<tr>
				<th>Twist(TPI)</th>
				<td>
					{!! Form::text('yarn_test_results["twist_sample_1"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["twist_sample_2"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["twist_sample_3"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["twist_average"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["twist_cv"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
				<td>
					{!! Form::text('yarn_test_results["twist_remarks"]', null,['class' => 'custom-input-field w-100p', 'placeholder' => '']) !!}
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>