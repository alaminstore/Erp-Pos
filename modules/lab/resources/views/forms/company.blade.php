@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box">
					<div class="box-header">
						<h2>{{ $company ? 'Update Company' : 'New Company' }}</h2>
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
								
								{!! Form::model($company, ['url' => $company ? 'companies/'.$company->id : 'companies', 'method' => $company ? 'PUT' : 'POST', 'files' => true]) !!}
								<div class="form-group row">
									<label for="name" class="col-sm-2 form-control-label">Company Name</label>
									<div class="col-sm-10">
										{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Write company\'s name here']) !!}
										
										@if($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label for="address" class="col-sm-2 form-control-label">Company Address</label>
									<div class="col-sm-10">
										{!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Write company\'s address here']) !!}
										
										@if($errors->has('address'))
											<span class="text-danger">{{ $errors->first('address') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label for="responsible_person" class="col-sm-2 form-control-label">Responsible Person</label>
									<div class="col-sm-10">
										{!! Form::text('responsible_person', null, ['class' => 'form-control', 'id' => 'responsible_person', 'placeholder' => 'Write company\'s responsible person here']) !!}
										
										@if($errors->has('responsible_person'))
											<span class="text-danger">{{ $errors->first('responsible_person') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label for="phone_no" class="col-sm-2 form-control-label">Phone No</label>
									<div class="col-sm-10">
										{!! Form::text('phone_no', null, ['class' => 'form-control', 'id' => 'phone_no', 'placeholder' => 'Write company\'s phone no here']) !!}
										
										@if($errors->has('phone_no'))
											<span class="text-danger">{{ $errors->first('phone_no') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group row m-t-md">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn white">{{ $company ? 'Update' : 'Create' }}</button>
										<a class="btn white" href="{{ url('companies') }}">Cancel</a>
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