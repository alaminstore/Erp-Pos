@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="box-header">
				<h2>COLOR</h2>
			</div>
			<div class="box-body table-responsive b-t">
				<div class="box-body">
					<a class="btn btn-sm btn-info" href="{{ url('colors/create') }}">
						<i class="glyphicon glyphicon-plus"></i> New Color
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
						<th> Color Name</th>
						<th> Action</th>
					</tr>
					</thead>
					<tbody>
					@if(!$colors->getCollection()->isEmpty())
						@foreach($colors->getCollection() as $color)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $color->name }}</td>
								<td>
									<a href="{{url('colors/'.$color->id.'/edit')}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i
												class="fa fa-edit"></i></a>
									<button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
									        data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
									        data-url="{{ url('colors/'.$color->id) }}">
										<i class="fa fa-times"></i>
									</button>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3" align="center">No Data</td>
						</tr>
					@endif
					</tbody>
					<tfoot>
					@if($colors->total() > 15)
						<tr>
							<td colspan="3" align="center">{{ $colors->appends(request()->except('page'))->links() }}</td>
						</tr>
					@endif
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection