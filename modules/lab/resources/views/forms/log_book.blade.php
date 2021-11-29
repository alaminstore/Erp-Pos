@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h2>{{ $log_book ? 'Update Log Book' : 'New Log Book' }}</h2>
					</div>
					<div class="box-divider m-a-0"></div>
					<div class="box-body">
						{!! Form::model($log_book, ['url' => $log_book ? 'log-books/'.$log_book->id : 'log-books', 'method' => $log_book ? 'PUT' : 'POST', 'autocomplete' => 'off']) !!}
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									@if($log_book)
										<h4 class="text-center font-weight-bold">TRF
											No: {{ $log_book->requisition->receive_no }}</h4>
										{!! Form::hidden('requisition_id', $log_book->requisition_id) !!}
									@elseif($requisition_id && $requisition_data && $requisition_data->count())
										<h4 class="text-center font-weight-bold">TRF
											No: {{ $requisition_data->receive_no }}</h4>
										{!! Form::hidden('requisition_id', $requisition_id) !!}
									@else
										<label for="requisition_id" class="form-control-label font-weight-bold">Select TRF No</label>
										{!! Form::select('requisition_id', $requisitions ?? [], null, ['class' => 'form-control select2-input', 'id' => 'requisition_id', 'placeholder' => 'Select TRF No']) !!}
										
										@if($errors->has('requisition_id'))
											<span class="text-danger">{{ $errors->first('requisition_id') }}</span>
										@endif
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 table-responsive">
								<table class="reportTable">
									<thead>
									<tr>
										<th>Buyer</th>
										<th>Batch No</th>
										<th>Booking No</th>
										<th>PO</th>
										<th>Color</th>
										<th>Size</th>
										<th>QTY</th>
									</tr>
									</thead>
									<tbody class="requisition_info_table">
									@if($log_book)
										<tr>
											<td>{{ $log_book->requisition->buyer_id }}</td>
											<td>{{ $log_book->requisition->batch_no }}</td>
											<td>{{ $log_book->requisition->booking_no }}</td>
											<td>{{ $log_book->requisition->po_no }}</td>
											<td>{{ $log_book->requisition->color }}</td>
											<td>{{ $log_book->requisition->size }}</td>
											<td>{{ $log_book->requisition->qty }}</td>
										</tr>
									@elseif($requisition_data && $requisition_data->count())
										<tr>
											<td>{{ $requisition_data->buyer_id }}</td>
											<td>{{ $requisition_data->batch_no }}</td>
											<td>{{ $requisition_data->booking_no }}</td>
											<td>{{ $requisition_data->po_no }}</td>
											<td>{{ $requisition_data->color }}</td>
											<td>{{ $requisition_data->size }}</td>
											<td>{{ $requisition_data->qty }}</td>
										</tr>
									@else
										<tr>
											<td colspan="7">Please Select TRF No</td>
										</tr>
									@endif
									</tbody>
								</table>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="reference_no" class="form-control-label font-weight-bold">Reference No</label>
									{!! Form::text('reference_no', null, ['class' => 'form-control', 'id' => 'reference_no', 'placeholder' => 'Enter reference no']) !!}
									
									@if($errors->has('reference_no'))
										<span class="text-danger">{{ $errors->first('reference_no') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="shift" class="form-control-label font-weight-bold">Shift</label>
									{!! Form::text('shift', null, ['class' => 'form-control', 'id' => 'shift', 'placeholder' => 'Enter Shift']) !!}
									
									@if($errors->has('shift'))
										<span class="text-danger">{{ $errors->first('shift') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="fabric_type" class="form-control-label font-weight-bold">Fabric Type</label>
									{!! Form::text('fabric_type', null, ['class' => 'form-control', 'id' => 'fabric_type', 'placeholder' => 'Enter fabric type']) !!}
									
									@if($errors->has('fabric_type'))
										<span class="text-danger">{{ $errors->first('fabric_type') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="roll" class="form-control-label font-weight-bold">Roll</label>
									{!! Form::text('roll', null, ['class' => 'form-control', 'id' => 'roll', 'placeholder' => 'Enter Roll']) !!}
									
									@if($errors->has('roll'))
										<span class="text-danger">{{ $errors->first('roll') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="time" class="form-control-label font-weight-bold">Time</label>
									{!! Form::text('time', null, ['class' => 'form-control', 'id' => 'time', 'placeholder' => 'Enter Time']) !!}
									
									@if($errors->has('time'))
										<span class="text-danger">{{ $errors->first('time') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="dyeing_procedure" class="form-control-label font-weight-bold">Dyeing Procedure</label>
									{!! Form::text('dyeing_procedure', null, ['class' => 'form-control', 'id' => 'dyeing_procedure', 'placeholder' => 'Enter dyeing procedure']) !!}
									
									@if($errors->has('dyeing_procedure'))
										<span class="text-danger">{{ $errors->first('dyeing_procedure') }}</span>
									@endif
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<h5 class="text-center">Request Test</h5>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cf_to_wash" class="form-control-label font-weight-bold">CF to wash</label>
									{!! Form::text('cf_to_wash', null, ['class' => 'form-control', 'id' => 'cf_to_wash', 'placeholder' => 'Enter CF to wash']) !!}
									
									@if($errors->has('cf_to_wash'))
										<span class="text-danger">{{ $errors->first('cf_to_wash') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cf_to_water" class="form-control-label font-weight-bold">CF to Water</label>
									{!! Form::text('cf_to_water', null, ['class' => 'form-control', 'id' => 'cf_to_water', 'placeholder' => 'Enter CF to Water']) !!}
									
									@if($errors->has('cf_to_water'))
										<span class="text-danger">{{ $errors->first('cf_to_water') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="cf_to_perspiration" class="form-control-label font-weight-bold">CF to Perspiration</label>
									{!! Form::text('cf_to_perspiration', null, ['class' => 'form-control', 'id' => 'cf_to_perspiration', 'placeholder' => 'Enter CF to Perspiration']) !!}
									
									@if($errors->has('cf_to_perspiration'))
										<span class="text-danger">{{ $errors->first('cf_to_perspiration') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="pilling" class="form-control-label font-weight-bold">Pilling</label>
									{!! Form::text('pilling', null, ['class' => 'form-control', 'id' => 'pilling', 'placeholder' => 'Enter Pilling']) !!}
									
									@if($errors->has('pilling'))
										<span class="text-danger">{{ $errors->first('pilling') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="bursting" class="form-control-label font-weight-bold">Bursting</label>
									{!! Form::text('bursting', null, ['class' => 'form-control', 'id' => 'bursting', 'placeholder' => 'Enter Bursting']) !!}

									@if($errors->has('bursting'))
										<span class="text-danger">{{ $errors->first('bursting') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<h5 class="text-center">Shrinkage</h5>
							<div class="col-md-6">
								<div class="form-group">
									<label for="shrinkage_l_w" class="form-control-label font-weight-bold">L.W.</label>
									{!! Form::text('shrinkage_l_w', null, ['class' => 'form-control', 'id' => 'shrinkage_l_w', 'placeholder' => 'Enter Shrinkage L.W.']) !!}
									
									@if($errors->has('shrinkage_l_w'))
										<span class="text-danger">{{ $errors->first('shrinkage_l_w') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="shrinkage_w_w" class="form-control-label font-weight-bold">W.W</label>
									{!! Form::text('shrinkage_w_w', null, ['class' => 'form-control', 'id' => 'shrinkage_w_w', 'placeholder' => 'Enter Shrinkage W.W']) !!}
									
									@if($errors->has('shrinkage_w_w'))
										<span class="text-danger">{{ $errors->first('shrinkage_w_w') }}</span>
									@endif
								</div>
							</div>
							</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="shrinkage_sp_percentage" class="form-control-label font-weight-bold">SP&#37;</label>
									{!! Form::text('shrinkage_sp_percentage', null, ['class' => 'form-control', 'id' => 'shrinkage_sp_percentage', 'placeholder' => 'Enter Shrinkage SP%']) !!}
									
									@if($errors->has('shrinkage_sp_percentage'))
										<span class="text-danger">{{ $errors->first('shrinkage_sp_percentage') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<h5 class="text-center">CF to Rubbing</h5>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cf_to_rubbing_dry" class="form-control-label font-weight-bold">Dry</label>
									{!! Form::text('cf_to_rubbing_dry', null, ['class' => 'form-control', 'id' => 'cf_to_rubbing_dry', 'placeholder' => 'Enter CF to Rubbing Dry']) !!}
									
									@if($errors->has('cf_to_rubbing_dry'))
										<span class="text-danger">{{ $errors->first('cf_to_rubbing_dry') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cf_to_rubbing_wet" class="form-control-label font-weight-bold">Wet</label>
									{!! Form::text('cf_to_rubbing_wet', null, ['class' => 'form-control', 'id' => 'cf_to_rubbing_wet', 'placeholder' => 'Enter CF to Rubbing Wet']) !!}
									
									@if($errors->has('cf_to_rubbing_wet'))
										<span class="text-danger">{{ $errors->first('cf_to_rubbing_wet') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="r_width" class="form-control-label font-weight-bold">R. Width</label>
									{!! Form::text('r_width', null, ['class' => 'form-control', 'id' => 'r_width', 'placeholder' => 'Enter R. Width']) !!}
									
									@if($errors->has('r_width'))
										<span class="text-danger">{{ $errors->first('r_width') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="t_width" class="form-control-label font-weight-bold">T. Width</label>
									{!! Form::text('t_width', null, ['class' => 'form-control', 'id' => 't_width', 'placeholder' => 'Enter T. Width']) !!}
									
									@if($errors->has('t_width'))
										<span class="text-danger">{{ $errors->first('t_width') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="r_gsm" class="form-control-label font-weight-bold">R. GSM</label>
									{!! Form::text('r_gsm', null, ['class' => 'form-control', 'id' => 'r_gsm', 'placeholder' => 'Enter R. GSM']) !!}
									
									@if($errors->has('r_gsm'))
										<span class="text-danger">{{ $errors->first('r_gsm') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="f_gsm" class="form-control-label font-weight-bold">F. GSM</label>
									{!! Form::text('f_gsm', null, ['class' => 'form-control', 'id' => 'f_gsm', 'placeholder' => 'Enter F. GSM']) !!}
									
									@if($errors->has('f_gsm'))
										<span class="text-danger">{{ $errors->first('f_gsm') }}</span>
									@endif
								</div>
							</div>
							</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="report_to_qc_time" class="form-control-label font-weight-bold">Report to QC Time</label>
									{!! Form::text('report_to_qc_time', null, ['class' => 'form-control', 'id' => 'report_to_qc_time', 'placeholder' => 'Enter Report to QC Time']) !!}
									
									@if($errors->has('report_to_qc_time'))
										<span class="text-danger">{{ $errors->first('report_to_qc_time') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group row m-t-md">
							<div class="col-sm-offset-5 col-sm-4">
								<button type="submit" class="btn success">{{ $log_book ? 'Update' : 'Create' }}</button>
								<button type="button" class="btn danger"><a href="{{ url('log-books') }}">Cancel</a>
								</button>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('modules/lab/js/log_book_entry.js') }}"></script>
@endsection
