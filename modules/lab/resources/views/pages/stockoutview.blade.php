@extends('lab::layout')

@section('content')
    <style>
        p{
            padding:0;
            margin:0;
        }
        .zalopo_sid_style{
            margin:0 0 30px 0;
        }
        th{
            padding: 0 !important;
        }
        th,tr,td{
            border:1px solid #696969!important;
            text-align: center;
        }
        .table_heading{
            background-color: #D6DCE4;
            font-size: 15px;
            font-weight: 400;
            padding: 5px 0;
        }
        .bg{
            background:#ffffb3;
        }
        .icon_size{
            font-size:15px;
        }

    </style>
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <div class="head_memo text-center">
                    <h2>Zalo Knitting Ltd.</h2>
                    <p>Tea Garden Road, Mouchak, Kaliakoir, Gazipur.</p>
                    <p>Stockin Sheet</p>
                </div> <br>

                <div class="row noprint">
                    <div class="pull-right top-buttons" style="margin-top: -72px;">
                        <button type="button" class="btn btn-primary btn-xs m-r-1" onclick="window.print();">
                            <i class="fa fa-print icon_size"></i>
                        </button>
                    </div>
                </div>
                <div class="zalopo_sid_style text-center">


                    @if($stockout)
                        @foreach($stockout as $stock)
                            <p><b>System Id:</b> {{$stock->systemout}}</p>
                            @break
                        @endforeach
                    @endif
                </div>



                <div class="row">
                    <div class="col-md-4">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><b>Out Date</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->date}}</td>
                                @endforeach

                            </tr>
                            <tr>
                                <td><b>Invoice No</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->invoice_no}}</td>
                                @endforeach

                            </tr>
                            <tr>
                                <td><b>Rack List</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->racklist}}</td>
                                @endforeach

                            </tr>
                            <tr>
                                <td><b>Rack Floor</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->rack_floor}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class=" col-md-offset-4 col-md-4 ">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><b>Buyer Name</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->buyer}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td><b>Zalo Po</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->zalopo}}</td>
                                @endforeach
                            </tr>

                            <tr>
                                <td><b>Fabric Type</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->fabric_type}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td><b>Pattern Name</b></td>
                                @foreach($stockout as $stock)
                                    <td>{{$stock->pattern_name}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h6 class="text-center table_heading">Stock In WITH ZALO PO WISE MULTIPLE STYLE</h6>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Color</th>
                                <th>Fabrication</th>
                                <th>GSM</th>
                                <th>Dia</th>
                                <th>Receiving Quantity</th>
                                <th>Delivery Quantity</th>
                                <th>Unit UOM</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($stockout_details)
                                @foreach($stockout_details as $details)
                                    <tr>
                                        <td>{{$details->color->name}}</td>
                                        <td>{{$details->fabriccomposition->name}}</td>
                                        <td>{{$details->getGsm->gsm}}</td>
                                        <td>{{$details->getDia->dia}}</td>
                                        <td>{{$details->receiving_quantity}}</td>
                                        <td>{{$details->delivery_quantity}}</td>
                                        <td>{{$details->uom}}</td>
                                        <td>{{$details->remarks}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2" class="bg">Total In</td>
                                    <td class="bg">{{$stockout_details->sum('receiving_quantity')}}</td>
                                    <td class="bg">{{$stockout_details->sum('delivery_quantity')}}</td>
                                    <td></td>
                                    <td></td>

                                </tr>
                            @endif
                            </tbody>
                        </table>

                        <div class="signature" style="

                               display: flex;
                               justify-content: flex-end;">

                            <table>
                                <tbody>
                                <tr>
                                    <td style="width:153px;"></td>
                                    <td style="background:#eee;padding:7px;">Signature</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div> <br>

        </div>




    </div>
    </div>
@endsection
