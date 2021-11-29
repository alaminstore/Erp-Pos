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

    .text-center {
      text-align: center !important;
    }

    .text-left {
      text-align: left !important;
    }
    h2 {
      margin-bottom: 0.3rem!important;
    }

    .box-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    @media print {
      .padding {
        padding: 0px;
      }

      .app-header ~ .app-body {
        padding: 0px !important;
      }

      .aside, nav, .navbar, .app-header, .noprint {
        display: none;
      }

      .reportTable thead,
      .reportTable tbody,
      .reportTable th,
      .reportTable td {
        padding: 1px !important;
      }

      .reportTable > thead > tr > th,
      .reportTable > thead > tr > td,
      .reportTable > tbody > tr > th,
      .reportTable > tbody > tr > td {
        font-size: 10px !important;
        padding: 1px 0px !important;
        text-align: left!important;
      }

      .service-type-section {
        font-size: 11px;
      }

      .signature-area {
        margin-top: 0.1rem!important;
      }

      p {
        margin: 0;
        padding: 0;
      }
    }
  </style>
@endsection
@section('content')
  <div class="padding">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <div>&nbsp;</div>
            <div>
              <h2 class="text-center">Testing Laboratory</h2>
              <h2 class="text-center">Tropical Knitex Ltd.</h2>
            </div>
            <div class="pull-right">&nbsp;
              <button type="button" class="btn btn-primary btn-xs m-r-1 noprint" onclick="window.print();">
                <i class="fa fa-print"></i>
              </button>
            </div>
          </div>
          <div class="box-divider m-a-0"></div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 table-responsive requisition_info_table">
                <table class="reportTable">
                  <tbody>
                  <tr>
                    <th class="width-25p text-left">Buyer</th>
                    <td class="width-25p text-left">{{ $fabric_test_work_sheet->requisition->receive_no }}</td>
                    <th class="width-25p text-left">Report No</th>
                    <td class="width-25p text-left">{{ $fabric_test_work_sheet->report_no }}</td>
                  </tr>
                  <tr>
                    <th class="width-25p text-left">Batch No</th>
                    <td class="width-25p text-left">{{ $fabric_test_work_sheet->requisition->batch_no }}</td>
                    <th class="width-25p text-left">Date</th>
                    <td class="width-25p text-left">{{ date('d/m/Y', strtotime($fabric_test_work_sheet->created_at)) }}</td>
                  </tr>
                  <tr>
                    <th class="width-25p text-left">Booking No</th>
                    <td class="width-25p text-left">{{ $fabric_test_work_sheet->requisition->batch_no }}</td>
                    <th class="width-25p text-left">Roll</th>
                    <td class="width-25p text-left">{{ $fabric_test_work_sheet->roll }}</td>
                  </tr>
                  <tr>
                    <th class="width-25p text-left">Color</th>
                    <td class="width-25p text-left">{{ $fabric_test_work_sheet->requisition->color }}</td>
                    <th class="width-25p text-left">Type</th>
                    <td class="width-25p text-left">{{ $fabric_test_work_sheet->type }}</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @if($fabric_test_work_sheet->color_fastness_to_rubbing['test_method'] ||
              $fabric_test_work_sheet->fabric_weight['test_method'] ||
              $fabric_test_work_sheet->bursting_strength['test_method'] ||
              $fabric_test_work_sheet->pilling_resistance['test_method'] ||
              $fabric_test_work_sheet->abrasion_resistance['test_method'] ||
              $fabric_test_work_sheet->pull_test['test_method'] ||
              $fabric_test_work_sheet->stitch_recovery['test_method']
            )
              <div class="row" id="conditioning_area">
                <div class="col-md-12">
                  <h5>(Conditioning area)</h5>
                  @if($fabric_test_work_sheet->color_fastness_to_rubbing['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.color_fastness_to_rubbing_view')
                      </div>
                    </div>
                    <hr>
                  @endif()
                  @if($fabric_test_work_sheet->fabric_weight['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.fabric_weight_view')
                      </div>
                    </div>
                    <hr>
                  @endif()
                  @if($fabric_test_work_sheet->bursting_strength['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.bursting_strength_view')
                      </div>
                    </div>
                    <hr>
                  @endif()
                  @if($fabric_test_work_sheet->pilling_resistance['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.pilling_resistance_view')
                      </div>
                    </div>
                    <hr>
                  @endif()
                  @if($fabric_test_work_sheet->abrasion_resistance['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.abrasion_resistance_view')
                      </div>
                    </div>
                    <hr>
                  @endif()
                  @if($fabric_test_work_sheet->pull_test['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.pull_test_view')
                      </div>
                    </div>
                    <hr>
                  @endif()
                  @if($fabric_test_work_sheet->stitch_recovery['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.stitch_recovery_view')
                      </div>
                    </div>
                    <hr>
                  @endif()
                </div>
              </div>
            @endif
            @if($fabric_test_work_sheet->color_fastness_to_washing['test_method'] ||
              $fabric_test_work_sheet->color_fastness_to_water['test_method'] ||
              $fabric_test_work_sheet->color_fastness_to_perspiration['test_method'] ||
              $fabric_test_work_sheet->color_fastness_to_saliva['test_method'] ||
              $fabric_test_work_sheet->phenolic_yellowing['test_method'] ||
              $fabric_test_work_sheet->color_fastness_to_light['test_method'] ||
              $fabric_test_work_sheet->ph_value['test_method'] ||
              $fabric_test_work_sheet->dimensional_stability_to_washing['test_method'] ||
              $fabric_test_work_sheet->twisting['test_method']
            )
              <div class="row" id="physical_area">
                <div class="col-md-12">
                  <h5>(Physical area)</h5>
                  @if($fabric_test_work_sheet->color_fastness_to_washing['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.color_fastness_to_washing_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->color_fastness_to_water['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.color_fastness_to_water_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->color_fastness_to_perspiration['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.color_fastness_to_perspiration_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->color_fastness_to_saliva['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.color_fastness_to_saliva_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->phenolic_yellowing['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.phenolic_yellowing_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->color_fastness_to_light['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.color_fastness_to_light_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->ph_value['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.ph_value_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->dimensional_stability_to_washing['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.dimensional_stability_to_washing_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->twisting['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.twisting_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                </div>
              </div>
            @endif
            @if($fabric_test_work_sheet->appearance_after_wash['test_method'] ||
              $fabric_test_work_sheet->print_durability['test_method'] ||
              $fabric_test_work_sheet->cross_staining['test_method'] ||
              $fabric_test_work_sheet->best_in_class['test_method'] ||
              $fabric_test_work_sheet->fiber_composition['test_method'] ||
              $fabric_test_work_sheet->nickel_test['test_method']
            )
              <div class="row" id="others">
                <div class="col-md-12">
                  <h5>(Others)</h5>
                  @if($fabric_test_work_sheet->appearance_after_wash['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.appearance_after_wash_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->print_durability['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.print_durability_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->cross_staining['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.cross_staining_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->best_in_class['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.best_in_class_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->fiber_composition['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.fiber_composition_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                  @if($fabric_test_work_sheet->nickel_test['test_method'])
                    <div class="row">
                      <div class="col-md-12">
                        @includeIf('lab::includes.nickel_test_view')
                      </div>
                    </div>
                    <hr>
                  @endif
                </div>
              </div>
            @endif
            @if($fabric_test_work_sheet->yarnTestWorkSheet->submitted_by)
              <div class="row" id="yarn">
                <div class="col-md-12">
                  <h5>(Yarn)</h5>
                  <div class="row">
                    <div class="col-md-12">
                      @includeIf('lab::includes.yarn_test_result_view')
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection