@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="box-header">
				<h2>COMPANY</h2>
			</div>
			<div class="box-body table-responsive b-t">
				<div class="box-body">
					<a class="btn btn-sm btn-info" href="{{ url('companies/create') }}">
						<i class="glyphicon glyphicon-plus"></i> New Company
					</a>
				</div>
				<div class="flash-message">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))
							<div class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</div>
						@endif
					@endforeach
				</div>
				<table class="reportTable">
					<thead>
					<tr>
						<th> SL</th>
						<th> Company Name</th>
						<th> Company Address</th>
						<th> Responsible Person</th>
						<th> Phone no</th>
						<th> Action</th>
					</tr>
					</thead>
					<tbody>
					@if(!$companies->getCollection()->isEmpty())
						@foreach($companies->getCollection() as $cmp)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $cmp->name }}</td>
								<td>{{ $cmp->address }}</td>
								<td>{{ $cmp->responsible_person }}</td>
								<td>{{ $cmp->phone_no }}</td>
								<td>
									<a href="{{url('companies/'.$cmp->id.'/edit')}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i
												class="fa fa-edit"></i></a>
									<button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
									        data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
									        data-url="{{ url('companies/'.$cmp->id) }}">
										<i class="fa fa-times"></i>
									</button>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="6" align="center">No Data</td>
						</tr>
					@endif
					</tbody>
					<tfoot>
					@if($companies->total() > 15)
						<tr>
							<td colspan="4" align="center">{{ $companies->appends(request()->except('page'))->links() }}</td>
						</tr>
					@endif
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection