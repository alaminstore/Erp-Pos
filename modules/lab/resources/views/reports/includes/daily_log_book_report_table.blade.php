<thead>
<tr style="text-align: center;">
	<th rowspan="3">Sl.</th>
	<th rowspan="3">Shift</th>
	<th rowspan="3">Reference No.</th>
	<th rowspan="3">Booking No.</th>
	<th rowspan="3">Batch No.</th>
	<th rowspan="3">Buyer name</th>
	<th rowspan="3">Color</th>
	<th rowspan="3">Fabric Type</th>
	<th rowspan="3">QTY</th>
	<th rowspan="3">Roll</th>
	<th rowspan="3">Time</th>
	<th rowspan="3">Dyeing Procedure</th>
	<th colspan="16">Request Test</th>
</tr>
<tr style="text-align: center;">
	<th rowspan="2">CF to wash</th>
	<th rowspan="2">CF to Water</th>
	<th rowspan="2">CF to Perspiration</th>
	<th rowspan="2">Pilling</th>
	<th rowspan="2">Bursting</th>
	<th colspan="3">Shrinkage</th>
	<th colspan="2">CF to Rubbing</th>
	<th rowspan="2">R. Width</th>
	<th rowspan="2">T. Width</th>
	<th rowspan="2">R. GSM</th>
	<th rowspan="2">F. GSM</th>
	<th colspan="2" align="center">Report to QC</th>
</tr>
<tr style="text-align: center;">
	<th>L.W.</th>
	<th>W.W.</th>
	<th>SP&#37;</th>
	<th>Dry</th>
	<th>Wet</th>
	<th>Time</th>
	<th>Signature</th>
</tr>
</thead>
<tbody>
@if($reports && $reports->count())
	@foreach($reports as $report)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $report->shift }}</td>
			<td>{{ $report->reference_no }}</td>
			<td>{{ $report->requisition->booking_no }}</td>
			<td>{{ $report->requisition->batch_no }}</td>
			<td>{{ $report->requisition->buyer_id }}</td>
			<td>{{ $report->requisition->color }}</td>
			<td>{{ $report->fabric_type }}</td>
			<td>{{ $report->requisition->qty }}</td>
			<td>{{ $report->roll }}</td>
			<td>{{ $report->time }}</td>
			<td>{{ $report->dyeing_procedure }}</td>
			<td>{{ $report->cf_to_wash }}</td>
			<td>{{ $report->cf_to_water }}</td>
			<td>{{ $report->cf_to_perspiration }}</td>
			<td>{{ $report->pilling }}</td>
			<td>{{ $report->bursting }}</td>
			<td>{{ $report->shrinkage_l_w }}</td>
			<td>{{ $report->shrinkage_w_w }}</td>
			<td>{{ $report->shrinkage_sp_percentage }}</td>
			<td>{{ $report->cf_to_rubbing_dry }}</td>
			<td>{{ $report->cf_to_rubbing_wet }}</td>
			<td>{{ $report->r_width }}</td>
			<td>{{ $report->t_width }}</td>
			<td>{{ $report->r_gsm }}</td>
			<td>{{ $report->f_gsm }}</td>
			<td>{{ $report->report_to_qc_time }}</td>
			<td>&nbsp;</td>
		</tr>
	@endforeach
@else
	<tr>
		<th colspan="28">No data</th>
	</tr>
@endif
</tbody>