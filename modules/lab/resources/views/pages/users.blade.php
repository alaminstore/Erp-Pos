@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="box-header">
				<h2>User List</h2>
			</div>
			<div class="box-body b-t">
				<div class="box-body">
					<a class="btn btn-sm btn-info" href="{{ url('users/create') }}">
						<i class="glyphicon glyphicon-plus"></i> New User
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
							<th>F. Name</th>
							<th>L. Name</th>
							<th>Email</th>
							<th>Phone No.</th>
							<th>Designation</th>
							<th>Address</th>
							<th>Department</th>
							<th style="width:20%">Company</th>
							<th style="width:10%">Action</th>
						</tr>
						</thead>
						<tbody>
						@if(!$users->getCollection()->isEmpty())
							@foreach($users->getCollection() as $user)
								<tr class="tr-height">
									<td>{{ $loop->iteration }}</td>
									<td>{{ $user->first_name }}</td>
									<td>{{ $user->last_name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->phone_no }}</td>
									<td>{{ $user->designation }}</td>
									<td>{{ $user->address }}</td>
									<td>{{ $user->department ?? 'N/A' }}</td>
									<td>{{ $user->company->name ?? 'N/A' }}</td>
									<td>
										<a class="btn btn-xs btn-success" href="{{ url('users/'.$user->id.'/edit') }}" data-toggle="tooltip"
										   data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
										<button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
										        data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
										        data-url="{{ url('users/'.$user->id) }}">
											<i class="fa fa-times"></i>
										</button>
									</td>
								</tr>
							@endforeach
						@else
							<tr class="tr-height">
								<td colspan="11" align="center" class="text-danger">No Users</td>
							</tr>
						@endif
						</tbody>
						<tfoot>
						@if($users->total() > 15)
							<tr>
								<td colspan="11" align="center">{{ $users->appends(request()->except('page'))->links() }}</td>
							</tr>
						@endif
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection