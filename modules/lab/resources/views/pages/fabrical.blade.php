@extends('lab::layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Fabric Composition</h2>
            </div>
            <div class="box-body table-responsive b-t">
                <div class="box-body">
                    <a class="btn btn-sm btn-info" href="{{ url('fabric/create') }}">
                        <i class="glyphicon glyphicon-plus"></i> New Fabric Composition
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
                        <th> Fabric Composition </th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$fabrics->getCollection()->isEmpty())
                        @foreach($fabrics->getCollection() as $fabric)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fabric->name }}</td>
                                <td>
                                    <a href="{{url('fabric/'.$fabric->id.'/edit')}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-xs btn-danger show-modal" data-toggle="modal"
                                            data-target="#confirmationModal" ui-toggle-class="flip-x" ui-target="#animate"
                                            data-url="{{ url('fabric/'.$fabric->id) }}">
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
                    @if($fabrics->total() > 15)
                        <tr>
                            <td colspan="3" align="center">{{ $fabrics->appends(request()->except('page'))->links() }}</td>
                        </tr>
                    @endif
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
