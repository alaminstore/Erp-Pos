@extends('lab::layout')

@section('content')
	<div class="padding">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box">
					<div class="box-header">
						<h2>{{ $purchase_order ? 'Update Purchase Order' : 'New Purchase Order' }}</h2>
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

								{!! Form::model($purchase_order, ['url' => $purchase_order ? 'purchase-orders/'.$purchase_order->id : 'purchase-orders', 'method' => $purchase_order ? 'PUT' : 'POST']) !!}
								<div class="form-group row">
									<label for="name" class="col-sm-2 form-control-label">Select Buyer</label>
									<div class="col-sm-10">
										{!! Form::select('name', $buyers ?? [], null, ['class' => 'form-control select2-input', 'id' => 'name', 'placeholder' => 'Select buyer']) !!}

										@if($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
								</div>
								@php
									if(old('buyer_id')) {
										$buyer_id = old('buyer_id');
										$styles = \SkylarkSoft\GoRMG\Lab\Models\Style::where('buyer_id', $buyer_id)->pluck('booking_no', 'id');
									}
									if (old('style_id')) {
										$style_id = old('style_id');
									}
								@endphp
								<div class="form-group row">
									<label for="style_id" class="col-sm-2 form-control-label">Select Booking No</label>
									<div class="col-sm-10">
										{!! Form::select('style_id', $styles ?? [], $style_id ?? null, ['class' => 'form-control select2-input', 'id' => 'style_id', 'placeholder' => 'Select Booking No']) !!}

										@if($errors->has('style_id'))
											<span class="text-danger">{{ $errors->first('style_id') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label for="name" class="col-sm-2 form-control-label">Purchase Order Name</label>
									<div class="col-sm-10">
										{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Write style\'s name here']) !!}

										@if($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group row m-t-md">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn white">{{ $purchase_order ? 'Update' : 'Create' }}</button>
										<a class="btn white" href="{{ url('purchase-orders') }}">Cancel</a>
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
@section('scripts')
	<script src="{{ asset('modules/lab/js/purchase_order_entry.js') }}"></script>
@endsection
