@extends('lab::layout')

@section('styles')
	<style>
		.custom-input-field {
			border-color: rgba(120, 130, 140, 0.2);
			border-radius: 0;
			font-size: 1rem;
			line-height: 1.5;
			color: #55595c;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
		}
		
		.w-100p {
			width: 100%;
		}
		
		.width-25p {
			width: 25%;
		}
		
		th.width_th {
			width: 6%;
		}
		
		.width-40p {
			width: 40%;
		}
		
		#loader {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: rgba(226, 226, 226, 0.75) no-repeat center center;
			width: 100%;
			z-index: 1000;
		}
		
		.spin-loader {
			position: relative;
			top: 46%;
			left: 5%;
		}
	</style>
@endsection
@section('content')
	<div class="padding">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h2>Work Sheet Entry</h2>
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
						{!! Form::open(['url' => $work_sheet ? 'work-sheets/'.$work_sheet->requisition_id : 'work-sheets', 'method' => $work_sheet ? 'PUT' : 'POST', 'id' => 'work_sheet_entry_form']) !!}
						{!! Form::hidden('id', $work_sheet ? $work_sheet->id : null, ['disabled' => true]) !!}
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<label for="requisition_id" class="form-control-label font-weight-bold">Select TRF No</label>
									{!! Form::select('requisition_id', $requisitions ?? [], $work_sheet ? $work_sheet->requisition_id : null, ['class' => 'form-control select2-input', 'id' => 'requisition_id', 'placeholder' => 'Select TRF No']) !!}
									<span class="text-danger requisition_id"></span>
									@if($errors->has('requisition_id'))
										<span class="text-danger">{{ $errors->first('requisition_id') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 table-responsive requisition_info_table">
								<table class="reportTable">
									<tbody>
									<tr>
										<th style="width: 25%;">Buyer</th>
										<td style="width: 25%;">&nbsp;</td>
										<th style="width: 25%;">Report No</th>
										<td style="width: 25%;">&nbsp;</td>
									</tr>
									<tr>
										<th>Batch No</th>
										<td>&nbsp;</td>
										<th>Date</th>
										<td>{{ date('d/m/Y') }}</td>
									</tr>
									<tr>
										<th>Booking No</th>
										<td>&nbsp;</td>
										<th>Roll</th>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th>Color</th>
										<td>&nbsp;</td>
										<th>Type</th>
										<td>&nbsp;</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<label for="test_property" class="form-control-label font-weight-bold">Select Test Property</label>
									{!! Form::select('test_property', $test_properties ?? [], null, ['class' => 'form-control select2-input', 'id' => 'test_property', 'placeholder' => 'Select Test Property']) !!}
									@if($errors->has('test_property'))
										<span class="text-danger">{{ $errors->first('test_property') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row hide" id="conditioning_area">
							<div class="col-md-12">
								<h5>(Conditioning area)</h5>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.color_fastness_to_rubbing_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.fabric_weight_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.bursting_strength_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.pilling_resistance_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.abrasion_resistance_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.pull_test_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.stitch_recovery_add')
									</div>
								</div>
							</div>
						</div>
						<div class="row hide" id="physical_area">
							<div class="col-md-12">
								<h5>(Physical area)</h5>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.color_fastness_to_washing_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.color_fastness_to_water_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.color_fastness_to_perspiration_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.color_fastness_to_saliva_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.phenolic_yellowing_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.color_fastness_to_light_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.ph_value_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.dimensional_stability_to_washing_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.twisting_add')
									</div>
								</div>
								<hr>
							</div>
						</div>
						<div class="row hide" id="others">
							<div class="col-md-12">
								<h5>(Others)</h5>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.appearance_after_wash_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.print_durability_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.cross_staining_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.best_in_class_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.fiber_composition_add')
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.nickel_test_add')
									</div>
								</div>
								<hr>
							</div>
						</div>
						<div class="row hide" id="yarn">
							<div class="col-md-12">
								<h5>(Yarn)</h5>
								<div class="row">
									<div class="col-md-12">
										@includeIf('lab::includes.yarn_test_result_add')
									</div>
								</div>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row m-t-md">
									<div class="col-sm-offset-5 col-sm-4">
										<button type="submit" class="btn btn-success">{{ $work_sheet ? 'Update' : 'Create' }}</button>
										<a class="btn btn-danger" href="{{ url('work-sheets') }}">Cancel</a>
									</div>
								</div>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		<div id="loader">
			<div class="text-center spin-loader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('modules/lab/js/worksheet_entry.js') }}"></script>
@endsection
