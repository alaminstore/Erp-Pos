<table class="reportTable">
	<tbody>
	<tr>
		<th>Buyer</th>
		<td>{{ $requisition->buyer_id }}</td>
		<th>Report No</th>
		<td style="width: 25%;">{!! Form::text('report_no', $fabric_test_work_sheet->report_no ?? null, ['class' => 'form-control', 'style' => 'height: 15px;', 'placeholder' => 'Report no']) !!}</td>
	</tr>
	<tr>
		<th>Batch No</th>
		<td>{{ $requisition->batch_no }}</td>
		<th>Date</th>
		<td>{{ date('d/m/Y') }}</td>
	</tr>
	<tr>
		<th>Booking No</th>
		<td>{{ $requisition->booking_no }}</td>
		<th>Roll</th>
		<td>{!! Form::text('roll', $fabric_test_work_sheet->roll ?? null, ['class' => 'form-control', 'style' => 'height: 15px;', 'placeholder' => 'Roll']) !!}</td>
	</tr>
	<tr>
		<th>Color</th>
		<td>{{ $requisition->color }}</td>
		<th>Type</th>
		<td>{!! Form::text('type', $fabric_test_work_sheet->type ?? null, ['class' => 'form-control', 'style' => 'height: 15px;', 'placeholder' => 'Type']) !!}</td>
	</tr>
	</tbody>
</table>