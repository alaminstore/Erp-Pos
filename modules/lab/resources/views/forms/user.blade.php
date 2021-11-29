@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h2>{{ $user ? 'Update User' : 'New User' }}</h2>
					</div>
					<div class="box-divider m-a-0"></div>
					<div class="box-body">
						{!! Form::model($user, ['url' => $user ? 'users/'.$user->id : 'users', 'method' => $user ? 'PUT' : 'POST', 'autocomplete' => 'off']) !!}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="name" class="col-sm-2 form-control-label">First Name</label>
									<div class="col-sm-10">
										{!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Write first name here']) !!}
										
										@if($errors->has('first_name'))
											<span class="text-danger">{{ $errors->first('first_name') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="last_name" class="col-sm-2 form-control-label">Last Name</label>
									<div class="col-sm-10">
										{!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Write user last name here']) !!}
										
										@if($errors->has('last_name'))
											<span class="text-danger">{{ $errors->first('last_name') }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="email" class="col-sm-2 form-control-label">E-mail</label>
									<div class="col-sm-10">
										{!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Write user email here']) !!}
										
										@if($errors->has('email'))
											<span class="text-danger">{{ $errors->first('email') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="last_name" class="col-sm-2 form-control-label">Phone No.</label>
									<div class="col-sm-10">
										{!! Form::text('phone_no', null, ['class' => 'form-control', 'id' => 'phone_no', 'placeholder' => 'Write user phone no here']) !!}
										
										@if($errors->has('phone_no'))
											<span class="text-danger">{{ $errors->first('phone_no') }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="address" class="col-sm-2 form-control-label">Address</label>
									<div class="col-sm-10">
										{!! Form::textarea('address', null, ['rows' => '1','class' => 'form-control', 'id' => 'address', 'placeholder' => 'Write user address here']) !!}
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="designation" class="col-sm-2 form-control-label">Designation</label>
									<div class="col-sm-10">
										{!! Form::text('designation', null, ['class' => 'form-control', 'id' => 'designation', 'placeholder' => 'Write user designation here']) !!}
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="department" class="col-sm-2 form-control-label">Department</label>
									<div class="col-sm-10">
										{!! Form::text('department', null, ['class' => 'form-control', 'id' => 'department', 'placeholder' => 'Write user department here']) !!}
										
										@if($errors->has('department'))
											<span class="text-danger">{{ $errors->first('department') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="company_id" class="col-sm-2 form-control-label">Company</label>
									<div class="col-sm-10">
										{!! Form::select('company_id', $companies, null, ['class' => 'form-control select2-input', 'id' => 'company_id', 'placeholder' => 'Select a Company']) !!}
										
										@if($errors->has('company_id'))
											<span class="text-danger">{{ $errors->first('company_id') }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="password" class="col-sm-2 form-control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password"
										       placeholder="Give password here">
										<span style="color: red;">{{ $errors->first('password') }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="confirm_password" class="col-sm-2 form-control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="confirm_password"
										       name="confirm_password" placeholder="Give confrim password here">
										<span style="color: red;">{{ $errors->first('confirm_password') }}</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row m-t-md">
							<div class="col-sm-offset-5 col-sm-4">
								<button type="submit" class="btn success">{{ $user ? 'Update' : 'Create' }}</button>
								<button type="button" class="btn danger"><a href="{{ url('users') }}">Cancel</a>
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