@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="box-header">
				<h2>Style</h2>
			</div>
			<div class="box-body table-responsive b-t">
				<div class="box-body">
					<a class="btn btn-sm btn-info" href="{{ url('styles/create') }}">
						<i class="glyphicon glyphicon-plus"></i> New Zalo Po
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
						<th>SL</th>
						<th>Buyer Name</th>
						<th>Zalo Po</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@if(!$styles->getCollection()->isEmpty())
						@foreach($styles->getCollection() as $style)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $style->buyer->name }}</td>
								<td>{{ $style->style }}</td>
								<td>
									<a href="{{url('styles/'.$style->id.'/edit')}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i
												class="fa fa-edit"></i></a>
									<button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
									        data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
									        data-url="{{ url('styles/'.$style->id) }}">
										<i class="fa fa-times"></i>
									</button>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="5" align="center">No Data</td>
						</tr>
					@endif
					</tbody>
					<tfoot>
					@if($styles->total() > 15)
						<tr>
							<td colspan="3" align="center">{{ $styles->appends(request()->except('page'))->links() }}</td>
						</tr>
					@endif
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection
