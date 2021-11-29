@extends('lab::layout')

@section('content')
<div class="padding">
<div class="box">
    <div class="box-header">
        <h2>Fabric Booking</h2>
    </div>
    <div class="box-body table-responsive b-t">
        <div class="box-body">
            <a class="btn btn-sm btn-info" href="{{ url('fabricbooking/create') }}">
                <i class="glyphicon glyphicon-plus"></i> New Fabric Booking
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
                <th>SL</th>
                <th>Supplier</th>
                <th>Season</th>
                <th>Fabric</th>
                <th>Uom</th>
                <th>Lc</th>
                <th>Date</th>
                <th>Total Booking Qty</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(!$fabricbookings->getCollection()->isEmpty())
                @foreach($fabricbookings->getCollection() as $fabricbooking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fabricbooking->supplier->name }}</td>
                        <td>{{ $fabricbooking->season->name }}</td>
                        <td>{{ $fabricbooking->fabric }}</td>
                        <td>{{ $fabricbooking->uom }}</td>
                        <td>{{ $fabricbooking->lc }}</td>
                        <td>{{ $fabricbooking->date }}</td>
                        <td>{{ $fabricbooking->fabricbooking_details->sum('booking_qty') }}</td>

                        <td>
                            <a href="{{url('fabricbooking/'.$fabricbooking->id.'/edit')}}"
                                class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top"
                                title="Edit"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
                                    data-target="#confirmationModal" ui-toggle-class="flip-x"
                                    ui-target="#animate"
                                    data-url="{{ url('fabricbooking/'.$fabricbooking->id) }}">
                                <i class="fa fa-times"></i>
                            </button>
                            <a href="{{url('fabricbooking/'.$fabricbooking->id.'/view')}}"
                                class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top"
                                title="View"><i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="11" align="center">No Data</td>
                </tr>
            @endif
            </tbody>
            <tfoot>
            @if($fabricbookings->total() > 15)
                <tr>
                    <td colspan="3"
                        align="center">{{ $fabricbookings->appends(request()->except('page'))->links() }}</td>
                </tr>
            @endif
            </tfoot>
        </table>
    </div>
</div>
</div>
@endsection
