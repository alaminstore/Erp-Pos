@extends('lab::layout')
@section('styles')
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    .left-align-table {
      float: left;
      width: 40%;
    }

    .right-align-table {
      float: right;
      width: 40%;
    }

    .signature-area {
      margin-top: 3rem;
    }

    p {
      margin-bottom: 0.2rem;
    }

    h1, h2, h3, h4, h5, h6 {
      margin-bottom: 0.2rem !important;
    }

    .width-33p {
      width: 33% !important;
    }

    .width-25p {
      width: 25% !important;
    }

    .width-20p {
      width: 20% !important;
    }

    .width-16-5p {
      width: 16.5% !important;
    }

    .float-left {
      float: left;
    }

    .top-buttons {
      display: flex; /* or inline-flex */
      flex-direction: row;
      justify-content: space-evenly;
      align-content: center;
      align-items: center;
    }

    .care-image-section {
      display: flex;
      justify-content: center;
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
      .reportTable > tbody > tr > td {
        font-size: 10px !important;
        padding: 1px 0px !important;
      }

      .service-type-section {
        font-size: 11px;
      }

      .box-body, .box-header {
        margin-top: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
      }

      .signature-area {
        margin-top: 0.1rem!important;
      }
    }
  </style>
@endsection
@section('content')
  <div class="padding">
    <div class="box">
      <div class="box-header">
        <div class="text-center">
          <h5 class="text-center">Testing Laboratory</h5>
          <h5 class="text-center">Tropical Knitex Ltd.</h5>
        </div>
      </div>
      <div class="box-body">
        <div class="row noprint">
          <div class="pull-right top-buttons" style="margin-top: -72px;">
            <button type="button" class="btn btn-primary btn-xs m-r-1" onclick="window.print();">
              <i class="fa fa-print"></i>
            </button>
            {{--						|<a href="{{ url('/requisitions/pdf-download/'.$requisitions->id) }}" class="m-l-1"><i style="color: #DC0A0B" class="fa fa-file-pdf-o"></i></a>--}}
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="left-align-table table-responsive">
              <h6>Applicant Information</h6>
              <table class="reportTable">
                <tbody>
                <tr>
                  <td style="text-align: left"><b>TRF No:</b></td>
                  <td style="text-align: left">{{ $requisitions->receive_no}}</td>
                </tr>
                <tr style="text-align: left">
                  <td style="text-align: left"><b>Company:</b></td>
                  <td style="text-align: left">{{ $requisitions->userDetails->company->name ?? 'N/A' }}</td>
                </tr>
                <tr style="text-align: left">
                  <td style="text-align: left"><b>Address:</b></td>
                  <td style="text-align: left">{{ $requisitions->userDetails->company->address ?? 'N/A' }}</td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Contact Person:</b></td>
                  <td style="text-align: left">{{ $requisitions->userDetails->company->responsible_person  ?? 'N/A' }}</td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Mobile No:</b></td>
                  <td style="text-align: left">{{ $requisitions->userDetails->phone_no ?? "N/A"}}</td>
                </tr>

                <tr>
                  <td style="text-align: left"><b>Email Address:</b></td>
                  <td style="text-align: left">{{ $requisitions->userDetails->email ?? 'N/A'}}</td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="right-align-table table-responsive">
              <h6>Laboratory Use Only</h6>
              <table class="reportTable">
                <tbody>
                <tr>
                  <td style="text-align: left; width: 50%;"><b>Type Of Sample:</b></td>
                  <td style="text-align: left"></td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Sample Quantity:</b></td>
                  <td style="text-align: left"></td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Login Date:</b></td>
                  <td style="text-align: left"></td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Report Due Date:</b></td>
                  <td style="text-align: left"></td>
                </tr>

                <tr>
                  <td style="text-align: left"><b>Reference No:</b></td>
                  <td style="text-align: left"></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="table-responsive">
              <h6>General Information</h6>
              <table class="reportTable">
                <tbody>
                <tr>
                  <th style="text-align: left; width: 25%;">Buyer Name:</th>
                  <td style="text-align: left; width: 25%;">{{ $requisitions->buyer_id }}</td>
                  <th style="text-align: left; width: 25%;">Color:</th>
                  <td style="text-align: left; width: 25%;">{{ $requisitions->color }}</td>
                </tr>
                <tr>
                  <th style="text-align: left">Booking No:</th>
                  <td style="text-align: left">{{ $requisitions->booking_no }}</td>
                  <th style="text-align: left">Size:</th>
                  <td style="text-align: left">{{ $requisitions->size }}</td>
                </tr>
                <tr>
                  <th style="text-align: left"><b>Batch No:</b></th>
                  <td style="text-align: left">{{ $requisitions->batch_no }}</td>
                  <th style="text-align: left"><b>GSM:</b></th>
                  <td style="text-align: left">{{ $requisitions->gsm }}</td>
                </tr>
                <tr>
                  <th style="text-align: left"><b>Quantity:</b></th>
                  <td style="text-align: left">{{ $requisitions->qty }}</td>
                  <th style="text-align: left"><b>Fabric Content:</b></th>
                  <td style="text-align: left">{{ $requisitions->fabric }}</td>
                </tr>
                <tr>
                  <th style="text-align: left"><b>Style No:</b></th>
                  <td style="text-align: left">{{ $requisitions->style_no }}</td>
                  <th style="text-align: left"><b>Previous Report No(if retest):</b></th>
                  <td style="text-align: left">{{ $requisitions->pre_report }}</td>
                </tr>
                <tr>
                  <th style="text-align: left"><b>PO No:</b></th>
                  <td style="text-align: left">{{ $requisitions->po_no }}</td>
                  <th style="text-align: left"><b>Any Other Information's:</b></th>
                  <td style="text-align: left">{{ $requisitions->other_info }}</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-sm-12">
            <h6>Service Type</h6>
            @php
              $service_type_details = [
               'Regular' => '(3Working days)',
               'Express' => '(2Working days)<br>(30% Surcharge)',
               'Emergency' => '(1.5Working days)<br>(70% Surcharge)'
              ];
            @endphp
            @foreach(['Regular', 'Express', 'Emergency'] as $key)
              <div class="width-33p float-left service-type-section">
                <p style="pointer-events: none; cursor: context-menu;">
									<span
                      class="fa {{ $requisitions->service_type == $key ? 'fa-check-square-o' : 'fa-square-o' }}"></span>
                  <span class="font-weight-bold">{{ $key }}</span><br>
                  <span>{!! $service_type_details[$key] !!}</span>
                </p>
              </div>
            @endforeach
          </div>
          <div class="col-sm-12" style="margin-top: 1rem;">
            <div class="table-responsive">
              <table class="reportTable">
                <tbody>
                <tr>
                  <td rowspan="4" style="text-align: left"><b>Invoice To</b></td>
                  <td style="text-align: left"><b>Company
                      Name:</b> {{ $requisitions->company->name  ?? '' }}</td>
                  <td style="text-align: left"><b>Contact
                      Person:</b> {{ $requisitions->contact_person  ?? '' }}</td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Address:</b> {{ $requisitions->company->address ?? '' }}</td>
                  <td style="text-align: left">&nbsp;</td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Mobile No/ Tel
                      No:</b> {{ $requisitions->mobile_no  ?? 'N/A' }}</td>
                  <td style="text-align: left">&nbsp;</td>
                </tr>
                <tr>
                  <td style="text-align: left"><b>Email Address:</b> {{ $requisitions->email  ?? 'N/A' }}</td>
                  <td style="text-align: left">&nbsp;</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="width-20p float-left service-type-section">
              <h6>Test Method</h6>
            </div>
            @php $test_method = explode(',',$requisitions->test_method); @endphp
            @foreach(['ISO', 'American', 'European', 'Other'] as $key)
              <div class="width-20p float-left service-type-section">
                <p style="pointer-events: none; cursor: context-menu;">
                  <span
                      class="fa {{ in_array($key, $test_method, true) ? 'fa-check-square-o' : 'fa-square-o' }}"></span>
                  <span class="font-weight-bold">{{ $key }}</span><br>
                </p>
              </div>
            @endforeach
          </div>
          <div class="col-sm-12" style="margin-top: 1rem">
            <div class="float-left service-type-section care-image-section">
              <h6 class="float-left">Care Instruction</h6>
              @if($requisitions->care)
              <img src="{{ asset('storage/requisition_images/'.$requisitions->care) }}" alt="image"
                   class="image image-responsive float-left" style="max-height: 50px; width: auto;">
              @endif
            </div>


            <div class="col-sm-12 table-responsive" style="margin-top: 1rem;">
              <h6>TEST REQUESTED [PLEASE PUT (&#10004;) MARK]</h6>
              <table class="reportTable">
                <tbody>
                <tr>
                  <th colspan="2" style="text-align: left">Color Fastness Test</th>
                  <th style="text-align: left">Dimensional Stability</th>
                </tr>
                <tr>
                  <td style="text-align: left" colspan="2">
                    @php $colorfastness_test = explode(',',$requisitions->color_fastness); @endphp
                    @foreach($colorfastness as $key)
                      <p style="pointer-events: none; cursor: context-menu;">
                        <span
                            class="fa {{ in_array($key, $colorfastness_test, true) ? 'fa-check-square-o' : 'fa-square-o' }}"></span>
                        <span class="title-checkbox">{{ $key }}</span>
                      </p>
                    @endforeach
                  </td>
                  <td style="text-align: left">
                    @php $dimensional_test = explode(',',$requisitions->dimentional_stability); @endphp
                    @foreach($dimensional as $key)
                      <p style="pointer-events: none; cursor: context-menu;">
                        <span
                            class="fa {{ in_array($key, $dimensional_test, true) ? 'fa-check-square-o' : 'fa-square-o' }}"></span>
                        <span class="title-checkbox">{{ $key }}</span>
                      </p>
                    @endforeach
                  </td>
                </tr>
                <tr>
                  <th style="text-align: left">Physical Test</th>
                  <th style="text-align: left">Yarn Test</th>
                  <th style="text-align: left">Chemical Test</th>
                </tr>
                <tr>
                  <td style="text-align: left">
                    @php $physical_test = explode(',',$requisitions->physical_test);
                                     //$physical_test_chunk= array_chunk($physical->toArray(), 7);

                    @endphp
                    @foreach($physical as $key)
                      <p style="pointer-events: none; cursor: context-menu;">
                        <span
                            class="fa {{ in_array($key, $physical_test, true) ? 'fa-check-square-o' : 'fa-square-o' }}"></span>
                        <span class="title-checkbox">{{ $key }}</span>
                      </p>
                    @endforeach
                  </td>
                  <td style="text-align: left">

                    @php
                      $yarn_test = explode(',',$requisitions->yarn);
                    @endphp

                    @foreach($yarn as $key)
                      <p style="pointer-events: none; cursor: context-menu;">
                        <span
                            class="fa {{ in_array($key, $yarn_test, true) ? 'fa-check-square-o' : 'fa-square-o' }}"></span>
                        <span class="title-checkbox">{{ $key }}</span>
                      </p>
                    @endforeach
                  </td>
                  <td style="text-align: left">
                    @php $chemical_test = explode(',',$requisitions->chemical_test); @endphp
                    @foreach($chemical as $key)
                      <p style="pointer-events: none; cursor: context-menu;">
                        <span
                            class="fa {{ in_array($key, $chemical_test, true) ? 'fa-check-square-o' : 'fa-square-o' }}"></span>
                        <span class="title-checkbox">{{ $key }}</span>
                      </p>
                    @endforeach
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="col-sm-12 signature-area">
              <div class="left-align-table">
                <p><strong>Authorized Signature</strong></p>
                <p>Date:</p>
              </div>
              <div class="right-align-table">
                <p><strong>Received By</strong></p>
                <p>Date:</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection