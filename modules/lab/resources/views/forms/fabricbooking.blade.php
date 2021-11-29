@extends('lab::layout')

@section('content')
    <style>
        .clr {
            clear: both;
        }

        .table-inside {
            border: none;
            width: 100%;
        }
        th,td,label{
            font-size:12px;
        }
        ::placeholder{
            font-size:12px;
        }
        .table-inside th {
            border-top: none;
        }

        .table-inside th:first-child {
            border-left: none;
        }

        .table-inside th:last-child {
            border-right: none;
        }

        .table-inside td {
            border: none;
            border-right: 1px solid #e7e7e7;
        }

        .table-inside td:last-child {
            border-right: none;
        }

        .table-inside tr {
            border-bottom: 1px solid #e7e7e7;
        }

        .table-inside tr:last-child {
            border-bottom: none;
        }

        .reportTable th, .reportTable td {
            min-width: 120px;
        }
    </style>
    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h2>{{ $fabricbooking ? 'Update Fabric Booking' : 'Fabric Booking' }}</h2>
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
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::model($fabricbooking, ['url' => $fabricbooking ? 'fabricbooking/'.$fabricbooking->id : 'fabricbooking', 'method' => $fabricbooking ? 'PUT' : 'POST']) !!}

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-12 form-control-label">Sid</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('sid',time(), ['class' => 'form-control', 'id' => 'sid','readonly'=>true]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" col-md-3">
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-12 form-control-label">Date</label>
                                            <div class="col-sm-12">
                                                {!! Form::date('date', null, ['class' => 'form-control', 'id' => 'date']) !!}

                                                @if($errors->has('date'))
                                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-12 form-control-label">Supplier</label>
                                            <div class="col-sm-12">
                                                {!! Form::select('supplier_id', $supplier ?? [], null, ['class' => 'form-control select2-input', 'id' => 'supplier', 'placeholder' => 'Select Supplier']) !!}

                                                @if($errors->has('supplier_id'))
                                                    <span class="text-danger">{{ $errors->first('supplier_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-12 form-control-label">Select Season</label>

                                            <div class="col-sm-12">
                                                {!! Form::select('season_id', $season ?? [], null, ['class' => 'form-control select2-input', 'id' => 'season', 'placeholder' => 'Select Season']) !!}

                                                @if($errors->has('season_id'))
                                                    <span class="text-danger">{{ $errors->first('season_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fabric">Slect Fabric</label>
                                            <select class="form-control select2-input" name="fabric" id="fabric">
                                                <option class=".bg-warning" disabled="true" selected="true">Select
                                                    Fabric
                                                </option>
                                                <option>Knit</option>
                                                <option>Woven</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="uom" class="col-sm-12 form-control-label">UOM</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('uom', null, ['class' => 'form-control', 'id' => 'uom', 'placeholder' => 'Write UOM ']) !!}

                                                @if($errors->has('uom'))
                                                    <span class="text-danger">{{ $errors->first('uom') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="lc" class="col-sm-12 form-control-label">LC</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('lc', null, ['class' => 'form-control', 'id' => 'lc', 'placeholder' => 'Write LC ']) !!}

                                                @if($errors->has('lc'))
                                                    <span class="text-danger">{{ $errors->first('lc') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--                                Start table--}}

                                <div class="row m-t-2 " id="req_table">
                                    <div class="col-md-12 ">
                                        <div class="table-responsive" style="min-height: 100px" id="tableOrder">
                                            <table class="reportTable reportTableCustom">
                                                <thead>
                                                <tr style="background: ghostwhite;">
                                                    <th>Buyer*</th>
                                                    <th>Zalo Po</th>
                                                    <th>Style</th>
                                                    <th>Color</th>
                                                    <th>Fabrication</th>
                                                    <th>Gsm</th>
                                                    <th>Dia</th>
                                                    <th style="">Booking<br>Quantity</th>
                                                    <th>Value</th>
                                                    <th>Remarks</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="table-body">
                                                <tr class="table-row">
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('buyer_id[]', $buyers ?? [], null, ['class' => 'form-control select2-input buyer', 'id' => 'buyer', 'placeholder' => 'Select Buyer']) !!}
                                                            @if($errors->has('buyer_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('buyer_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('style_id[]', $style ?? [], null, ['class' => 'form-control select2-input style st_value', 'id' => 'style', 'placeholder' => 'Select Zalo Po']) !!}
                                                            @if($errors->has('style_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('style_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('zalopo_id[]', $zalopo ?? [], null, ['class' => 'form-control select2-input zalopo zl_value', 'id' => 'zalopo', 'placeholder' => 'Select Style ']) !!}
                                                            @if($errors->has('zalopo_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('zalopo_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('color_id[]', $color ?? [], null, ['class' => 'form-control select2-input color', 'id' => 'color', 'placeholder' => 'Select Color']) !!}

                                                            @if($errors->has('color_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('color_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('fabriccomposition_id[]', $fabric_comp ?? [], null, ['class' => 'form-control select2-input fabrication', 'id' => 'fabric', 'placeholder' => 'Select Fabrication']) !!}

                                                            @if($errors->has('fabriccomposition_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('fabriccomposition_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            {!! Form::number('gsm[]', null, ['class' => 'form-control', 'id' => 'gsm', 'placeholder' => 'Write GSM']) !!}

                                                            @if($errors->has('gsm'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('gsm') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            {!! Form::text('dia[]', null, ['class' => 'form-control', 'id' => 'dia', 'placeholder' => 'Write Dia ']) !!}

                                                            @if($errors->has('dia'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('dia') }}</span>
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::text('booking_qty[]', null, ['class' => 'form-control', 'id' => 'booking_qty', 'placeholder' => 'Booking Quantity']) !!}

                                                            @if($errors->has('booking_qty'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('booking_qty') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::text('value[]', null, ['class' => 'form-control', 'id' => 'value', 'placeholder' => 'Write Value']) !!}

                                                            @if($errors->has('value'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('value') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::text('remarks[]', null, ['class' => 'form-control', 'id' => 'remarks', 'placeholder' => 'Write Remarks']) !!}

                                                            @if($errors->has('remarks'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('remarks') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-action-column">
                                                            <button type="button"
                                                                    class="btn btn-xs btn-success add-table-row">+
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-xs btn-danger remove-table-row">x
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="clr"></tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                {{--                                End table--}}
                                <div class="form-group row m-t-md">
                                    <div class=" col-sm-12 text-center">
                                        <button type="submit"
                                                class="btn btn-success">{{ $fabricbooking ? 'Update' : 'Create' }}</button>
                                        <a class="btn btn-danger" href="{{ url('fabricbooking') }}">Cancel</a>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            function setSelect2() {
                $('select').select2();
            }

            setSelect2();

            //Add More Row
            $(document).on('click', '.add-table-row', function () {

                // Destroy select2
                $(this).parents('tr').find('select').each(function (index) {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                });

                var clone_row = $(this).parents('tr').clone();

                var selected_val = $(this).parents('tr').find('.buyer').val();
                clone_row.find('select').val(selected_val);

                var selected_val_two = $(this).parents('tr').find('.zl_value').val();
                clone_row.find('.zl_value').val(selected_val_two);

                var selected_val_three = $(this).parents('tr').find('.st_value').val();
                clone_row.find('.st_value').val(selected_val_three);
                clone_row.find('.color').val('');
                clone_row.find('.fabrication').val('');



                $(this).parents('tr').after(clone_row);
                setSelect2();
            });

            // Remove Row
            $(document).on('click', '.remove-table-row', function () {
                var confirmDeleteRow = confirm('Are you sure you want to remove this row?');
                var table_row = $('.table-row');
                var thisHtml = $(this);
                if (confirmDeleteRow) {
                    $('#loader').show();
                    setTimeout(function () {
                        $('#loader').hide();
                        if (table_row.length <= 1) {
                            alert("At least one data is required!!");
                            return false;
                        }
                        thisHtml.parents('.table-row').remove();
                    }, 100);
                }
            });

                 //buyer to zalopo (here .style = zalopo)
            $(document).on('change', '.buyer', function (e) {
                // e.preventDefault();
                let id = $(this).val();
                const $style = $(this).parents('tr').find('.style');
                console.log(id);
                $.ajax({
                    method: 'get',
                    data: {
                        id
                    },
                    url: '{{ url('/get-zalopo') }}/' + id,
                    success: function (result) {
                        console.log(result)
                        $style.empty();
                        $style.append(`<option value="">Search & Select</option>`);
                        $.each(result, function (key, value) {
                            $style.append(`<option value="${value.id}">${value.style}</option>`);
                        })
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })

                $(".buyer").change(function (e) {
                    /* $.ajaxSetup({
                         headers: {
                             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                         }
                     });*/
                    // e.preventDefault();
                    let buyerId = $(this).val();
                    var div = $(this).parent();

                    var op = " ";

                    $.ajax({
                        type: 'GET',
                        url: '/get-zalopo/' + buyerId,
                        data: {'id': buyerId},
                        success: function (data) {
                            op += '<option value="0" selected disabled>chose product</option>';
                            for (var i = 0; i < data.length; i++) {
                                op += '<option value="' + data[i].id + '">' + data[i].style + '</option>';
                            }
                            div.find('.style').html(" ");
                            div.find('.style').append(op);
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });

            });


            //Zalopo to get style

            $(document).on('change', '.style', function (e) {
                // e.preventDefault();
                let id = $(this).val();
                const $zalopo = $(this).parents('tr').find('.zalopo');
                console.log(id);
                $.ajax({
                    method: 'get',
                    data: {
                        id
                    },
                    url: '{{ url('/get-style') }}/' + id,
                    success: function (result) {
                        console.log(result)
                        $zalopo.empty();
                        $zalopo.append(`<option value="">Search & Select</option>`);
                        $.each(result, function (key, value) {
                            $zalopo.append(`<option value="${value.id}">${value.zalopo}</option>`);
                        })
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })

                $(".style").change(function (e) {
                    /* $.ajaxSetup({
                         headers: {
                             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                         }
                     });*/
                    // e.preventDefault();
                    let buyerId = $(this).val();
                    var div = $(this).parent();

                    var op = " ";

                    $.ajax({
                        type: 'GET',
                        url: '/get-zalopo/' + buyerId,
                        data: {'id': buyerId},
                        success: function (data) {
                            op += '<option value="0" selected disabled>chose product</option>';
                            for (var i = 0; i < data.length; i++) {
                                op += '<option value="' + data[i].id + '">' + data[i].zalopo + '</option>';
                            }
                            div.find('.zalopo').html(" ");
                            div.find('.zalopo').append(op);
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });

            });





        });
    </script>
@endsection
