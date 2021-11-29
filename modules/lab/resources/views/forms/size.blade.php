@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box">
					<div class="box-header">
						<h2>{{ $size ? 'Update Size' : 'New Size' }}</h2>
					</div>
					<div class="box-divider m-a-0"></div>
					<div class="box-body">
						<div class="flash-message">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
								@if(Session::has('alert-' . $msg))
									<div class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</div>
								@endif
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
								
								{!! Form::model($size, ['url' => $size ? 'sizes/'.$size->id : 'sizes', 'method' => $size ? 'PUT' : 'POST']) !!}
								<div class="form-group row">
									<label for="name" class="col-sm-2 form-control-label">Size Name</label>
									<div class="col-sm-10">
										{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Write size\'s name here']) !!}
										
										@if($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group row m-t-md">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn white">{{ $size ? 'Update' : 'Create' }}</button>
										<a class="btn white" href="{{ url('sizes') }}">Cancel</a>
									</div>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection