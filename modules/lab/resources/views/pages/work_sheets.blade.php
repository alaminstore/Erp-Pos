@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="box-header">
				<h2>Work Sheet List</h2>
			</div>
			<div class="box-body b-t">
				<div class="box-body">
					<a class="btn btn-sm btn-info" href="{{ url('/work-sheets/create') }}">
						<i class="glyphicon glyphicon-plus"></i> New Entry
					</a>
				</div>
				<div class="flash-message">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))
							<div class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</div>
						@endif
					@endforeach
				</div>
				
				<div class="table-responsive">
					<table class="reportTable">
						<thead>
						<tr>
							<th>SL</th>
							<th>TRF No</th>
							<th>Buyer</th>
							<th>Booking No</th>
							<th>Color</th>
							<th>Size</th>
							<th>Batch No</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@if(!$work_sheets->getCollection()->isEmpty())
							@foreach($work_sheets->getCollection() as $work_sheet)
								<tr class="tr-height">
									<td>{{ $loop->iteration }}</td>
									<td>{{ $work_sheet->requisition->receive_no }}</td>
									<td>{{ $work_sheet->requisition->buyer_id }}</td>
									<td>{{ $work_sheet->requisition->booking_no }}</td>
									<td>{{ $work_sheet->requisition->color }}</td>
									<td>{{ $work_sheet->requisition->size }}</td>
									<td>{{ $work_sheet->requisition->batch_no }}</td>
									<td>
										<a class="btn btn-xs btn-success" href="{{ url('work-sheets/'.$work_sheet->requisition_id.'/edit') }}"
										   data-toggle="tooltip" data-placement="top" title="Edit"><i
													class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-primary" href="{{ url('work-sheets/'.$work_sheet->requisition_id.'/show') }}"
										   data-toggle="tooltip" data-placement="top" title="View"><i
													class="fa fa-eye"></i></a>
										<button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
										        data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
										        data-url="{{ url('work-sheets/'.$work_sheet->requisition_id) }}">
											<i class="fa fa-times"></i>
										</button>
									</td>
								</tr>
							@endforeach
						@else
							<tr class="tr-height">
								<td colspan="8" align="center" class="text-danger">No Data</td>
							</tr>
						@endif
						</tbody>
						<tfoot>
						@if($work_sheets->total() > 15)
							<tr>
								<td colspan="8" align="center">{{ $work_sheets->appends(request()->except('page'))->links() }}</td>
							</tr>
						@endif
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection