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

    /*  tr:nth-child(even) {
                background-color: #dddddd;
        }*/

    .left-align-table {
      float: left;
      width: 40%;
    }

    .right-align-table {
      float: right;
      width: 40%;
    }

    .rejection-details {
      float: left;
      width: 50%;
    }

    .form-full-width {
      width: 100%;
      border-color: transparent;
    }

    .signature-area {
      padding-top: 65px;
    }

    .signature-area > div {
      display: inline-block;
      text-transform: capitalize;
      width: 33%;
    }

    .signature-area > p {
      border-top: 2px solid #d4d4d4;
      font-size: 14px !important;
      display: inline-block;
      padding: 5px 10px;
    }

    .signature-table tr td {
      width: 0 !important;
      text-align: center;
      border: none !important;
    }

    .signature-table .signature-table-down {
      text-transform: capitalize;
      /*width: 33%;*/
    }

    .signature-table .signature-table-down p {
      border-top: 2px solid #d4d4d4;
      display: inline-block;
      padding: 2px 0px;
      font-size: 12px;
      font-weight: bold;
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
    }
  </style>
@endsection
@section('content')
  <div class="padding">
    <div class="box">
      <div class="box-header">
        <h2>Requistion Entry</h2>
      </div>
      <div class="box-body">
        {!! Form::model($requisition, ['url' => $requisition ? 'requisition/'.$requisition->id : 'requisition', 'method' => $requisition ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-12">
              <div class="table-responsive">
                <h6 style="background-color:#00aeef; color: white">General Information</h6>
                <table class="reportTable">
                  <tbody>
                  <tr>
                    <th style="text-align: left; width: 25%;">TRF no</th>
                    <td style="text-align: left; width: 25%;"> {!! Form::text('receive_no',$requisition ? $requisition->receive_no : $receive_no, ['class' => 'form-control', 'readonly'])
                                !!}</td>
                    <th style="text-align: left; width: 25%;">Color:</th>
                    <td style="text-align: left; width: 25%;">{!! Form::text('color',null, ['class' => 'form-control ','id' => 'color', ])
                                 !!}

                      @if($errors->has('color'))
                        <span class="text-danger">{{ $errors->first('color') }}</span>
                      @endif</td>
                  </tr>
                  <tr>
                    <th style="text-align: left">Buyer Name:</th>
                    <td style="text-align: left">{!! Form::text('buyer_id',null, ['class' => 'form-control select2','id' => 'buyer_id', ])
                                 !!}

                      @if($errors->has('buyer_id'))
                        <span class="text-danger">{{ $errors->first('buyer_id') }}</span>
                      @endif
                    </td>
                    <th style="text-align: left">Size:</th>
                    <td style="text-align: left">{!! Form::text('size',null, ['class' => 'form-control ','id' => 'size', ])
                                 !!}</td>
                  </tr>
                  <tr>
                    <th style="text-align: left"><b>Booking No:</b></th>
                    <td style="text-align: left">{!! Form::text('booking_no',null, ['class' => 'form-control select2','id' => 'booking_no', ])
                                 !!}
                      @if($errors->has('booking_no'))
                        <span class="text-danger">{{ $errors->first('booking_no') }}</span>
                      @endif
                    </td>
                    <th style="text-align: left"><b>GSM:</b></th>
                    <td style="text-align: left">{!! Form::text('gsm',null, ['class' => 'form-control ','id' => 'gsm', ])
                                 !!}</td>
                  </tr>
                  <tr>
                    <th style="text-align: left"><b>Batch No:</b></th>
                    <td style="text-align: left">{!! Form::text('batch_no',null, ['class' => 'form-control select2','id' => 'batch_no', ])
                                 !!}</td>
                    <th style="text-align: left"><b>Fabric Content:</b></th>
                    <td style="text-align: left">{!! Form::text('fabric',null, ['class' => 'form-control ','id' => 'fabric', ])
                                 !!}</td>
                  </tr>
                  <tr>
                    <th style="text-align: left"><b>QTY:</b></th>
                    <td style="text-align: left">{!! Form::text('qty',null, ['class' => 'form-control select2','id' => 'qty', ])
                                 !!}</td>
                    <th style="text-align: left"><b>Previous Report No(if retest):</b></th>
                    <td style="text-align: left"> {!! Form::text('pre_report',null, ['class' => 'form-control ','id' => 'pre_report', ])
                                 !!}</td>
                  </tr>
                  <tr>
                    <th style="text-align: left"><b>Style No:</b></th>
                    <td style="text-align: left">{!! Form::text('style_no',null, ['class' => 'form-control select2','id' => 'style_no', ])
                                 !!}</td>
                    <th style="text-align: left"><b>Any Other Information's:</b></th>
                    <td style="text-align: left">{!! Form::text('other_info',null, ['class' => 'form-control ','id' => 'other_info', ])
                                 !!}</td>
                  </tr>

                  <tr>
                    <th style="text-align: left"><b>PO No:</b></th>
                    <td style="text-align: left">{!! Form::text('po_no',null, ['class' => 'form-control select2','id' => 'po_no', ])
                                 !!}</td>

                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="left-align-table table-responsive">
              <h6 style="background-color:#00aeef; color: white">Invoice To</h6>
              <table class="reportTable">
                <tbody>
                <tr>
                  <th style="text-align: left; width: 25%;">Service Type</th>
                  <td style="text-align: left; width: 25%;"> {!! Form::select('service_type', ['Regular' => 'Regular', 'Express' => 'Express','Emergency' => 'Emergency'], null, ['class' => 'form-control select2','placeholder' => 'Pick a Service...'])
                                 !!}
                    @if($errors->has('service_type'))
                      <span class="text-danger">{{ $errors->first('service_type') }}</span>
                    @endif
                  </td>

                </tr>
                <tr>
                  <th style="text-align: left">Company Name:</th>
                  <td style="text-align: left">{!! Form::select('company_name', $companies,null, ['class' => 'form-control company_name','id' => 'company_name', 'placeholder'=>'Select company'])
                                 !!}
                    @if($errors->has('company_name'))
                      <span class="text-danger">{{ $errors->first('company_name') }}</span>
                    @endif
                  </td>

                </tr>
                <tr>
                  <th style="text-align: left"><b>Address:</b></th>
                  <td style="text-align: left">{!! Form::text('address',null, ['class' => 'form-control ','id' => 'address', ])
                                 !!}</td>
                </tr>
                <tr>
                  <th style="text-align: left"><b>Mobile No:</b></th>
                  <td style="text-align: left">{!! Form::text('mobile_no',null, ['class' => 'form-control ','id' => 'mobile_no', ])
                                 !!}</td>

                </tr>
                <tr>
                  <th style="text-align: left"><b>Email :</b></th>
                  <td style="text-align: left">{!! Form::text('email',null, ['class' => 'form-control ','id' => 'email', ])
                                 !!}</td>
                </tr>
                <tr>
                  <th style="text-align: left; width: 25%;">Contact Person:</th>
                  <td style="text-align: left; width: 25%;"> {!! Form::text('contact_person',null, ['class' => 'form-control ','id' => 'contact_pesn', ])
                                 !!}</td>

                </tr>

                </tbody>
              </table>
            </div>
            <div class="right-align-table table-responsive" style="margin-right: 100px">
              <h6 style="background-color:#00aeef; color: white; width:200px">Test Method</h6>
              <table class="reportTable" style="width:200px">
                <tbody>
                <tr>
                  <td>
                    {{ Form::checkbox('test_method[]', 'ISO') }} <span class="title-checkbox">ISO</span>
                  </td>
                </tr>
                <tr>
                  <td style="text-align: left">
                    {{ Form::checkbox('test_method[]', 'American') }} <span class="title-checkbox">American</span></td>
                  </td>
                </tr>
                <tr>
                  <td style="text-align: left"> {{ Form::checkbox('test_method[]', 'European') }} <span
                        class="title-checkbox">European</span></td>
                </tr>
                <tr>
                  <td style="text-align: left">{{ Form::checkbox('test_method[]', 'Other') }} <span
                        class="title-checkbox">Other</span></td>
                </tr>

                </tbody>
              </table>
            </div>
            <div class="right-align-table table-responsive" style="margin-right: 100px">
              <h6 style="background-color:#00aeef; color: white; width:200px">Care Instruction</h6>
              <table class="reportTable" style="width:200px">
                <tbody>
                <tr>
                  <td>
                    {{ Form::file('care'),[], null, ['class' => 'form-control ','id' => 'images', ] }}
                  </td>
                  <td>
                    <div class="imgPreview"></div>
                  </td>
                </tr>

                </tbody>
              </table>
            </div>
          </div>
          <div class="col-sm-12 table-responsive" style="margin-top: 1rem;">
            <h6 style="background-color:#00aeef; color: white; width:400px">TEST REQUESTED [PLEASE PUT (&#10004;)
                MARK]</h6>
            <table class="reportTable">
              <tbody>
              <tr>
                <th colspan="2" style="text-align: left"><p
                      style="background-color:#00aeef; color: white; width: 200px">Color Fastness Test</p></th>
                <th style="text-align: left; "><p style="background-color:#00aeef; color: white; width: 200px">
                    Dimensional Stability</p></th>
              </tr>
              <tr>
                <td style="text-align: left" colspan="2">
                  {{ Form::checkbox('color_fastness[]', 'Colorfastness to washing') }} <span class="title-checkbox">Colorfastness to washing</span><br>
                  {{ Form::checkbox('color_fastness[]', 'Colorfastness to Water') }} <span class="title-checkbox">Colorfastness to Water</span><br>
                  {{ Form::checkbox('color_fastness[]', 'Colorfastness to Perspiration') }} <span
                      class="title-checkbox">Colorfastness to Perspiration</span><br>
                  {{ Form::checkbox('color_fastness[]', 'Colorfastness to Saliva') }} <span class="title-checkbox">Colorfastness to Saliva</span><br>
                  {{ Form::checkbox('color_fastness[]', 'Colorfastness to Phenolic yellowing') }} <span
                      class="title-checkbox">Colorfastness to Phenolic yellowing</span><br>
                  {{ Form::checkbox('color_fastness[]', 'Colorfastness to Crocking / Rubbing') }} <span
                      class="title-checkbox">Colorfastness to Crocking / Rubbing</span><br>
                  {{ Form::checkbox('color_fastness[]', 'Colorfastness to Light') }} <span class="title-checkbox">Colorfastness to Light</span><br>
                </td>
                <td style="text-align: left">
                  {{ Form::checkbox('dimentional_stability[]', '1 wash') }} <span
                      class="title-checkbox">1 Wash</span><br>
                  {{ Form::checkbox('dimentional_stability[]', '2 wash') }} <span
                      class="title-checkbox">2 Wash</span><br>
                  {{ Form::checkbox('dimentional_stability[]', '3 wash') }} <span
                      class="title-checkbox">3 Wash</span><br>
                  {{ Form::checkbox('dimentional_stability[]', '5 wash') }} <span
                      class="title-checkbox">5 Wash</span><br>
                  {{ Form::checkbox('dimentional_stability[]', 'Dimentional Stability') }} <span class="title-checkbox">Dimensional Stability</span><br>
                  {{ Form::checkbox('dimentional_stability[]', 'Appearance after wash') }} <span class="title-checkbox">Appearance after wash</span><br>
                  {{ Form::checkbox('dimentional_stability[]', 'Twisting /Spirality') }} <span class="title-checkbox">Twisting/ Spirality</span><br>
                  {{ Form::checkbox('dimentional_stability[]', 'Print durability') }} <span class="title-checkbox">Print Durability</span><br>
                  {{ Form::checkbox('dimentional_stability[]', 'Cross Staining') }} <span class="title-checkbox">Cross Staining</span><br>


                </td>
              </tr>
              <tr>
                <th style="text-align: left"><p style="background-color:#00aeef; color: white; width: 200px">Physical
                    Test</p></th>
                <th style="text-align: left"><p style="background-color:#00aeef; color: white; width: 200px">Yarn
                    Test</p></th>
                <th style="text-align: left"><p style="background-color:#00aeef; color: white; width: 200px">Chemical
                    Test</p></th>
              </tr>
              <tr>
                <td style="text-align: left">
                  {{ Form::checkbox('physical_test[]', 'Fabric weight') }} <span
                      class="title-checkbox">Fabric weight</span><br>
                  {{ Form::checkbox('physical_test[]', 'Pilling Resistance') }} <span class="title-checkbox">Pilling Resistance</span><br>
                  {{ Form::checkbox('physical_test[]', 'Bursting strength test') }} <span class="title-checkbox">Bursting Strength Test</span><br>
                  {{ Form::checkbox('physical_test[]', 'Pull Test') }} <span class="title-checkbox">Pull Test</span><br>
                  {{ Form::checkbox('physical_test[]', 'Stitch Recovery') }} <span class="title-checkbox">Stitch Recovery</span><br>

                </td>
                </td>
                <td style="text-align: left">

                  {{ Form::checkbox('yarn[]', 'Yarn CSP') }} <span class="title-checkbox">Yarn CSP</span><br>
                  {{ Form::checkbox('yarn[]', 'Yarn Count') }} <span class="title-checkbox">Yarn Count</span><br>
                  {{ Form::checkbox('yarn[]', 'Yarn TPI') }} <span class="title-checkbox">Yarn TPI</span><br>
                  {{ Form::checkbox('yarn[]', 'Tear Strength') }} <span class="title-checkbox">Tear Strength</span><br>
                  {{ Form::checkbox('yarn[]', 'Tensile Strength') }} <span
                      class="title-checkbox">Tensile Strength</span><br>
                  {{ Form::checkbox('yarn[]', 'Seam Slippage') }} <span class="title-checkbox">Seam Slippage</span><br>
                  {{ Form::checkbox('yarn[]', 'Yarn Strength') }} <span class="title-checkbox">Yarn Strength</span><br>

                </td>
                <td style="text-align: left">
                  {{ Form::checkbox('chemical_test[]', 'FiberComposition Directive 96/73/EC') }} <span
                      class="title-checkbox">FiberComposition Directive 96/73/EC</span><br>
                  {{ Form::checkbox('chemical_test[]', 'Nickel Test(Spot Test)') }} <span class="title-checkbox">Nickel Test (Spot Test)</span><br>
                  {{ Form::checkbox('chemical_test[]', 'pH') }} <span class="title-checkbox">pH</span><br>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group row m-t-md">
            <div class="col-sm-offset-5 col-sm-4">
              <button type="submit" class="btn success">{{ $requisition ? 'Update' : 'Create' }}</button>
              <button type="button" class="btn danger"><a href="{{ url('requisitions') }}">Cancel</a>
              </button>
            </div>
          </div>
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
@endsection