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
                    <p>Fabric Booking Sheet</p>
                </div> <br>

                <div class="row noprint">
                    <div class="pull-right top-buttons" style="margin-top: -72px;">
                        <button type="button" class="btn btn-primary btn-xs m-r-1" onclick="window.print();">
                            <i class="fa fa-print icon_size"></i>
                        </button>
                    </div>
                </div>
                <div class="zalopo_sid_style text-center">


                    @if($fabricbooking_details)
                        @foreach($fabricbooking_details as $details)
                            <p><b>Zalo Po:</b> {{ $details->style->style}}</p>
                            <p><b>SID:</b> {{$details->sid}}</p>
                            <p><b>Style: </b> {{$details->zalopo->zalopo}}</p>
                            @break
                        @endforeach
                    @endif
                </div>



                    <div class="row">
                        <div class="col-md-4">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td><b>Booking Date</b></td>
                                    @foreach($fabricbooking as $fabric)
                                        <td>{{$fabric->date}}</td>
                                    @endforeach

                                </tr>
                                <tr>
                                    <td><b>Supplier</b></td>
                                    @foreach($fabricbooking as $fabric)
                                        <td>{{$fabric->supplier->name}}</td>
                                    @endforeach

                                </tr>
                                <tr>
                                    <td><b>Season</b></td>
                                    @foreach($fabricbooking as $fabric)
                                        <td>{{$fabric->season->name}}</td>
                                    @endforeach

                                </tr>
                                <tr>
                                    <td><b>LC NO</b></td>
                                    @foreach($fabricbooking as $fabric)
                                        <td>{{$fabric->lc}}</td>
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
                                    @foreach($fabricbooking_details as $details)
                                        <td>{{$details->buyer->name}}</td>
                                        @break;
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Fabric Type</td>
                                    @foreach($fabricbooking as $fb)
                                        <td>{{$fb->fabric}}</td>
                                        @break;
                                    @endforeach
{{--                                    <td>{{$fabricbooking->fabric}}</td>--}}

                                </tr>
                                <tr>
                                    <td>Create Date</td>
                                    @foreach($fabricbooking as $fb)
                                        <td>{{$fb->created_at->toFormattedDateString()}}</td>
                                        @break;
                                    @endforeach


{{--                                    @php--}}
{{--                                        $fabricbooking=$newDateFormat2 = date('d/m/Y', strtotime($fabricbooking->created_at));--}}
{{--                                        dd($newDateFormat2);--}}
{{--                                    @endphp--}}

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h6 class="text-center table_heading">FABRIC BOOKIG WITH ZALO PO WISE MULTIPLE STYLE</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Color</th>
                                    <th>Fabrication</th>
                                    <th>GSM</th>
                                    <th>Dia</th>
                                    <th>Booking Quantity</th>
                                    <th>Unit UOM</th>
                                    <th>Value</th>
                                    <th>Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                               @if($fabricbooking_details)
                                   @foreach($fabricbooking_details as $details)
                                       <tr>
                                           <td>{{$details->color->name}}</td>
                                           <td>{{$details->Fabriccomposition->name}}</td>
                                           <td>{{$details->gsm}}</td>
                                           <td>{{$details->dia}}</td>
                                           <td>{{$details->booking_qty}}</td>
                                           @foreach($fabricbooking as $fb)
                                               <td>{{$fb->uom}}</td>
                                           @endforeach
                                           <td>{{$details->value}}</td>
                                           <td>{{$details->remarks}}</td>
                                       </tr>
                                   @endforeach
                                   <tr>
                                       <td></td>
                                       <td></td>
                                       <td colspan="2" class="bg">Total In</td>
                                       <td class="bg">{{$fabricbooking_details->sum('booking_qty')}}</td>
                                       @foreach($fabricbooking as $fb)
                                       <td class="bg">{{$fb->uom}}</td>
                                       @endforeach
                                       <td></td>
                                       <td></td>
                                   </tr>
                                   @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> <br>

            </div>





        </div>
    </div>
@endsection
