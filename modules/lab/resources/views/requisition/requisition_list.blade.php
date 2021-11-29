@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="box-header">
				<h2>Requistion List</h2>
			</div>
			<div class="box-body b-t">
				<div class="box-body">
					<a class="btn btn-sm btn-info" href="{{ url('requisition/create') }}">
						<i class="glyphicon glyphicon-plus"></i> New Requisition
					</a>
				</div>
				{{--<div class="pull-right m-b-1">
					<form action="{{ url('/search-users') }}" method="GET">
						<div class="pull-left" style="margin-right: 10px;">
							<input type="text" class="form-control" name="q" value="{{ $q ?? '' }}">
						</div>
						<div class="pull-right">
							<input type="submit" class="btn btn-md btn-info" value="Search">
						</div>
					</form>
				</div>--}}
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
								<th>Booking no</th>
								<th>Batch no</th>
								<th>Qty.</th>
								<th>Company Name</th>
								<th>Email</th>
								<th>Mobile no</th>
								<th>Contact Person</th>
								<th>Test Method</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($requisitions->getCollection() as $requisition)
								<tr class="tr-height">
									<td>{{ $loop->iteration }}</td>
									<td>{{ $requisition->receive_no }}</td>
									<td>{{ $requisition->buyer_id }}</td>
									<td>{{ $requisition->booking_no }}</td>
									<td>{{ $requisition->batch_no }}</td>
									<td>{{ $requisition->qty }}</td>
									<td>{{ $requisition->company->name }}</td>
									<td>{{ $requisition->email }}</td>
									<td>{{ $requisition->mobile_no }}</td>
									<td>{{ $requisition->contact_person }}</td>
									<td>{{ $requisition->test_method }}</td>
									<td>
										<a class="btn btn-xs btn-success" href="{{ url('requisition/'.$requisition->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-info" href="{{ url('requisition/'.$requisition->id.'/view') }}" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
										<a class="btn btn-xs btn-primary" href="{{ url('log-books/create?requisition_id='.$requisition->id) }}" data-toggle="tooltip" data-placement="top" title="Log Book Entry"><i class="fa fa-plus"></i></a>
										<button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
														data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
														data-url="{{ url('requisition/'. $requisition->id .'/delete') }}">
											<i class="fa fa-times"></i>
										</button>
									</td>
								</tr>
							@empty
								<tr class="tr-height">
									<td colspan="12" align="center" class="text-danger">No Requistion</td>
								</tr>
							@endforelse
						</tbody>
						<tfoot>
						@if($requisitions->total() > 15)
							<tr>
								<td colspan="11" align="center">{{ $requisitions->appends(request()->except('page'))->links() }}</td>
							</tr>
						@endif
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection