@extends('lab::layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Stock Out</h2>
            </div>
            <div class="box-body table-responsive b-t">
                <div class="box-body">
                    <a class="btn btn-sm btn-info" href="{{ url('stockout/create') }}">
                        <i class="glyphicon glyphicon-plus"></i> New Stockout
                    </a>
                </div>
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</div>
                        @endif
                    @endforeach
                </div>
                <table class="reportTable">
                    <thead>
                    <tr>
                        <th> SL</th>
                        <th> Buyer Name</th>
                        <th>Zalo Po</th>
                        <th> Style Name</th>
                        <th>Rack List</th>
                        <th>Rack Floor</th>
                        <th>Fabric Type</th>
                        <th>System Number</th>
                        <th>Delivery To </th>
                        <th>Req No </th>
                        <th>Date </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$stockout->getCollection()->isEmpty())
                        @foreach($stockout->getCollection() as $stock)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stock->buyer}}</td>
                                <td>{{ $stock->zalopo}}</td>
                                <td>{{ $stock->style}}</td>
                                <td>{{ $stock->racklist}}</td>
                                <td>{{ $stock->rack_floor}}</td>
                                <td>{{ $stock->fabric_type}}</td>
                                <td>{{ $stock->systemout}}</td>
                                <td>{{ $stock->delivery == 1? "Cutting Section" : "Sample Section" }}</td>
                                <td>{{ $stock->req_no}}</td>
                                <td>{{ $stock->date}}</td>
                                <td>
                                    {{--                                    <a href="{{url('stock/'.$stock->id.'/edit')}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit">--}}
                                    {{--                                        <i--}}
                                    {{--                                            class="fa fa-edit"></i></a>--}}
                                    <button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
                                            data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
                                            data-url="{{ url('stockout/'.$stock->id) }}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <a href="{{url('stock-out/'.$stock->id.'/view')}}" class="btn btn-xs btn-info"
                                       data-toggle="tooltip" data-placement="top" title="view">
                                        <i class="fa fa-eye"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12" align="center">No Data</td>
                        </tr>
                    @endif
                    </tbody>
                    <tfoot>
                    @if($stockout->total() > 15)
                        <tr>
                            <td colspan="3" align="center">{{ $stockout->appends(request()->except('page'))->links() }}</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
