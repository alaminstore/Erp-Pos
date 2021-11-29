@extends('lab::layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>UOM</h2>
            </div>
            <div class="box-body table-responsive b-t">
                <div class="box-body">
                    <a class="btn btn-sm btn-info" href="{{ url('uom/create') }}">
                        <i class="glyphicon glyphicon-plus"></i> New UOM
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
                        <th> UOM</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$uoms->getCollection()->isEmpty())
                        @foreach($uoms->getCollection() as $uom)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $uom->name }}</td>
                                <td>
                                    <a href="{{url('uom/'.$uom->id.'/edit')}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
                                            data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
                                            data-url="{{ url('uom/'.$uom->id) }}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" align="center">No Data</td>
                        </tr>
                    @endif
                    </tbody>
                    <tfoot>
                    @if($uoms->total() > 15)
                        <tr>
                            <td colspan="3" align="center">{{ $uoms->appends(request()->except('page'))->links() }}</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
