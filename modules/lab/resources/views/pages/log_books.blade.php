@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="box-header">
				<h2>Log Book List</h2>
			</div>
			<div class="box-body b-t">
				<div class="box-body">
					<a class="btn btn-sm btn-info" href="{{ url('/log-books/create') }}">
						<i class="glyphicon glyphicon-plus"></i> New Entry
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
							<th>Reference No</th>
							<th>Buyer</th>
							<th>Booking No</th>
							<th>Color</th>
							<th>Size</th>
							<th>Batch No</th>
							<th>Shift</th>
							<th>Qty</th>
							<th>Roll</th>
							<th>Time</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@if(!$log_books->getCollection()->isEmpty())
							@foreach($log_books->getCollection() as $log_book)
								<tr class="tr-height">
									<td>{{ $loop->iteration }}</td>
									<td>{{ $log_book->requisition->receive_no }}</td>
									<td>{{ $log_book->reference_no }}</td>
									<td>{{ $log_book->requisition->buyer_id }}</td>
									<td>{{ $log_book->requisition->booking_no }}</td>
									<td>{{ $log_book->requisition->color }}</td>
									<td>{{ $log_book->requisition->size }}</td>
									<td>{{ $log_book->requisition->batch_no }}</td>
									<td>{{ $log_book->shift }}</td>
									<td>{{ $log_book->requisition->qty }}</td>
									<td>{{ $log_book->roll }}</td>
									<td>{{ $log_book->time }}</td>
									<td>
										<a class="btn btn-xs btn-success" href="{{ url('log-books/'.$log_book->id.'/edit') }}"
										   data-toggle="tooltip" data-placement="top" title="Edit"><i
													class="fa fa-edit"></i></a>
										<button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
										        data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
										        data-url="{{ url('log-books/'.$log_book->id) }}">
											<i class="fa fa-times"></i>
										</button>
									</td>
								</tr>
							@endforeach
						@else
							<tr class="tr-height">
								<td colspan="13" align="center" class="text-danger">No Data</td>
							</tr>
						@endif
						</tbody>
						<tfoot>
						@if($log_books->total() > 15)
							<tr>
								<td colspan="13" align="center">{{ $log_books->appends(request()->except('page'))->links() }}</td>
							</tr>
						@endif
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection