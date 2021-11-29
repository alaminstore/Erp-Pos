@extends('lab::layout')

@section('content')

    <style>
        ::placeholder {
            font-size: 12px;
        }

        .reportTable th, .reportTable td {
            min-width: 120px;
        }

        label {
            font-size: 12px;
        }

        .system_flex {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: baseline;
        }
    </style>

    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header system_flex">
                        <h2>{{ $stock ? 'Update Stock' : 'New Stock' }}</h2>
                        <h2 class="">
                            System In Number: &nbsp;
                            @php
                                $system_number =  'OZKL'.rand();
                                echo $system_number;
                            @endphp
                        </h2>
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

                                {!! Form::model($stock, ['url' => $stock ? 'stockin/'.$stock->id : 'stockin', 'method' => $stock ? 'PUT' : 'POST']) !!}

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-12 form-control-label">Select SID No</label>
                                            <div class="col-sm-12">
                                                {!! Form::select('sid', $sid ?? [], null, ['class' => 'sid form-control select2-input', 'id' => 'sid', 'placeholder' => 'Select SID']) !!}

                                                @if($errors->has('sid'))
                                                    <span class="text-danger">{{ $errors->first('sid') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="roll_no" class="col-sm-12 form-control-label">Buyer</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('buyer', null, ['class' => 'form-control buyer', 'id' => 'buyer_value', 'placeholder' => 'Buyer Name']) !!}

                                                @if($errors->has('buyer'))
                                                    <span class="text-danger">{{ $errors->first('buyer') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="roll_no" class="col-sm-12 form-control-label">Zalo Po</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('zalopo', null, ['class' => 'form-control', 'id' => 'zalopo_value', 'placeholder' => 'Buyer Name']) !!}

                                                @if($errors->has('zalopo'))
                                                    <span class="text-danger">{{ $errors->first('zalopo') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="roll_no" class="col-sm-12 form-control-label">Style</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('style', null, ['class' => 'form-control', 'id' => 'style_value', 'placeholder' => 'Style Name']) !!}

                                                @if($errors->has('style'))
                                                    <span class="text-danger">{{ $errors->first('style') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="roll_no" class="col-sm-12 form-control-label">Fabric
                                                Type</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('fabric_type', null, ['class' => 'form-control fabric', 'id' => 'fabric_type', 'placeholder' => 'Fabric Type']) !!}

                                                @if($errors->has('fabric_type'))
                                                    <span class="text-danger">{{ $errors->first('fabric_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="style" class="col-sm-12 form-control-label">Invoice No</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('invoice_no', null, ['class' => 'form-control', 'id' => 'invoice_no', 'placeholder' => 'Write Invoice No here']) !!}

                                                @if($errors->has('invoice_no'))
                                                    <span class="text-danger">{{ $errors->first('invoice_no') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-12 form-control-label">Rack List</label>
                                            <div class="col-sm-12">
                                                {!! Form::select('racklist_id', $racklist ?? [], null, ['class' => 'form-control select2-input', 'id' => 'racklist', 'placeholder' => 'Select Racklist']) !!}

                                                @if($errors->has('racklist_id'))
                                                    <span class="text-danger">{{ $errors->first('racklist_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="style" class="col-sm-12 form-control-label">In Date</label>
                                            <div class="col-sm-12">
                                                {!! Form::date('date', null, ['class' => 'form-control', 'id' => 'date_tb']) !!}

                                                @if($errors->has('date'))
                                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="rack_floor" class="col-sm-12 form-control-label">Rack Floor</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('rack_floor', null, ['class' => 'form-control rack_floor', 'id' => 'rack_floor', 'placeholder' => 'Rack Floor']) !!}

                                                @if($errors->has('rack_floor'))
                                                    <span class="text-danger">{{ $errors->first('rack_floor') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="pattern_name" class="col-sm-12 form-control-label">Pattern Name</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('pattern_name', null, ['class' => 'form-control pattern_name', 'id' => 'pattern_name', 'placeholder' => 'Pattern Name']) !!}

                                                @if($errors->has('pattern_name'))
                                                    <span class="text-danger">{{ $errors->first('pattern_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        {!! Form::hidden('system', $system_number, ['class' => 'form-control', 'id' => 'system']) !!}

                                                        @if($errors->has('system'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('system') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
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
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Fabrication</th>
                                                    <th>Gsm</th>
                                                    <th>Dia</th>
                                                    <th style="">Booking<br>Quantity</th>
                                                    <th>Roll No</th>
                                                    <th>Receiving <br> Quantity</th>
                                                    <th>Unit UOM</th>
                                                    <th>Remarks</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="table-body">
                                                <tr class="table-row">
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('color_id[]', $color ?? [], null, ['class' => ' color form-control select2-input ', 'id' => 'color', 'placeholder' => 'Select Color']) !!}
                                                            @if($errors->has('color_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('color_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('fabriccomposition_id[]', $fabriccomposition ?? [], null, ['class' => ' fabrication form-control select2-input ', 'id' => 'fabrication', 'placeholder' => 'Select Fabric']) !!}
                                                            @if($errors->has('fabriccomposition_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('fabriccomposition_id') }}</span>
                                                            @endif
                                                        </div>


                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('gsm[]', $gsm ?? [], null, ['class' => 'form-control select2-input gsm', 'id' => 'gsm', 'placeholder' => 'Select GSM']) !!}

                                                            @if($errors->has('gsm'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('gsm') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('dia[]', $dia ?? [], null, ['class' => 'form-control select2-input dia', 'id' => 'dia', 'placeholder' => 'Select Dia']) !!}

                                                            @if($errors->has('dia'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('dia') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('booking_qty[]', $booking_qty ?? [], null, ['class' => 'form-control select2-input ', 'id' => 'booking_qty', 'placeholder' => 'Select Booking Quantity']) !!}

                                                            @if($errors->has('booking_qty'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('booking_qty') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::text('roll_no[]', null, ['class' => 'form-control', 'id' => 'roll_no', 'placeholder' => 'Roll No']) !!}

                                                            @if($errors->has('roll_no'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('roll_no') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::text('receive_qty[]', null, ['class' => 'form-control', 'id' => 'receive_qty', 'placeholder' => 'Receive Quantity']) !!}

                                                            @if($errors->has('receive_qty'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('receive_qty') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::text('uom[]', null, ['class' => 'form-control', 'id' => 'remarks', 'placeholder' => 'Write UOM']) !!}

                                                            @if($errors->has('uom'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('uom') }}</span>
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
                                                class="btn btn-success">{{ $stock ? 'Update' : 'Create' }}</button>
                                        <a class="btn btn-danger" href="{{ url('stockin') }}">Cancel</a>
                                    </div>
                                </div>

                                {!! Form::close() !!}
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


                    //auto complete textbox by dropdown start(Alamin)

                    $(document).on('change', '.sid', function () {
                        var prod_id = $(this).val();
                        console.log(prod_id);

                        var a = $(this).parent();
                        console.log(prod_id);
                        var op = "";
                        $.ajax({
                            type: 'get',
                            url: '{!!URL::to('findValue')!!}',
                            data: {'id': prod_id},
                            dataType: 'json',
                            success: function (data) {
                                console.log(data);
                                console.log('test', data.buyer_id);
                                $('#buyer_value').val(data.buyer.name);
                                $('#zalopo_value').val(data.style.style);
                                $('#style_value').val(data.zalopo.zalopo);
                                $('#fabric_type').val(data.fabric_type);
                            },
                            error: function () {
                                console.log(err)
                            }
                        });


                    });

                    //auto complete textbox by dropdown End


                    //  Conditional dropdown start==========================================================================================

                    //Color to fabrication
                    $(document).on('change', '.color', function (e) {
                        // e.preventDefault();
                        let id = $(this).val();
                        console.log(id);
                        const $fabrication = $(this).parents('tr').find('.fabrication');

                        $.ajax({
                            method: 'get',
                            data: {
                                id
                            },
                            url: '{{ url('/get-fabrication') }}/' + id,
                            success: function (result) {
                                console.log(result)
                                $fabrication.empty();
                                $fabrication.append(`<option value="">Search & Select</option>`);
                                $.each(result, function (key, value) {
                                    $fabrication.append(`<option value="${value.fabriccomposition.id}">${value.fabriccomposition.name}</option>`);
                                })
                            },
                            error: function (err) {
                                console.log(err)
                            }
                        })

                    });


                    //fabrication to gsm
                    $(document).on('change', '.fabrication', function (e) {
                        // e.preventDefault();
                        let id = $(this).val();
                        console.log(id);
                        const $gsm = $(this).parents('tr').find('.gsm');

                        $.ajax({
                            method: 'get',
                            data: {
                                id
                            },
                            url: '{{ url('/get-gsm') }}/' + id,
                            success: function (result) {
                                console.log(result)
                                $gsm.empty();
                                $gsm.append(`<option value="">Search & Select</option>`);
                                $.each(result, function (key, value) {
                                    // $gsm.append(`<option value="${value.gsm.id}">${value.gsm}</option>`);
                                    $gsm.append(`<option value="${value.id}">${value.gsm}</option>`);
                                })
                            },
                            error: function (err) {
                                console.log(err)
                            }
                        })

                    });


                    // gsm to dia
                    $(document).on('change', '.gsm', function (e) {
                        // e.preventDefault();
                        let id = $(this).val();
                        console.log(id);
                        const $dia = $(this).parents('tr').find('.dia');

                        $.ajax({
                            method: 'get',
                            data: {
                                id
                            },
                            url: '{{ url('/get-dia') }}/' + id,
                            success: function (result) {
                                console.log(result)
                                $dia.empty();
                                $dia.append(`<option value="">Search & Select</option>`);
                                $.each(result, function (key, value) {
                                    console.log(value);
                                    $dia.append(`<option value="${value.dia}">${value.dia}</option>`);
                                })
                            },
                            error: function (err) {
                                console.log(err)
                            }
                        })

                    });


                    //  Conditional dropdown end========================================================================================











                    {{--$(document).on('change', '.buyer', function (e) {--}}
                    {{--    // e.preventDefault();--}}
                    {{--    let id = $(this).val();--}}
                    {{--    const $style = $(this).parents('tr').find('.style');--}}
                    {{--    console.log(id);--}}
                    {{--    $.ajax({--}}
                    {{--        method: 'get',--}}
                    {{--        data: {--}}
                    {{--            id--}}
                    {{--        },--}}
                    {{--        url: '{{ url('/get-zalopo') }}/' + id,--}}
                    {{--        success: function (result) {--}}
                    {{--            console.log(result)--}}
                    {{--            $style.empty();--}}
                    {{--            $style.append(`<option value="">Search & Select</option>`);--}}
                    {{--            $.each(result, function (key, value) {--}}
                    {{--                $style.append(`<option value="${value.id}">${value.style}</option>`);--}}
                    {{--            })--}}
                    {{--        },--}}
                    {{--        error: function (err) {--}}
                    {{--            console.log(err)--}}
                    {{--        }--}}
                    {{--    })--}}

                    {{--    $(".buyer").change(function (e) {--}}
                    {{--        /* $.ajaxSetup({--}}
                    {{--             headers: {--}}
                    {{--                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')--}}
                    {{--             }--}}
                    {{--         });*/--}}
                    {{--        // e.preventDefault();--}}
                    {{--        let buyerId = $(this).val();--}}
                    {{--        var div = $(this).parent();--}}

                    {{--        var op = " ";--}}

                    {{--        $.ajax({--}}
                    {{--            type: 'GET',--}}
                    {{--            url: '/get-zalopo/' + buyerId,--}}
                    {{--            data: {'id': buyerId},--}}
                    {{--            success: function (data) {--}}
                    {{--                op += '<option value="0" selected disabled>chose product</option>';--}}
                    {{--                for (var i = 0; i < data.length; i++) {--}}
                    {{--                    op += '<option value="' + data[i].id + '">' + data[i].style + '</option>';--}}
                    {{--                }--}}
                    {{--                div.find('.style').html(" ");--}}
                    {{--                div.find('.style').append(op);--}}
                    {{--            },--}}
                    {{--            error: function (data) {--}}
                    {{--                console.log(data);--}}
                    {{--            }--}}
                    {{--        });--}}
                    {{--    });--}}

                    {{--});--}}


                    //Zalopo to get style

                    {{--$(document).on('change', '.style', function (e) {--}}
                    {{--    // e.preventDefault();--}}
                    {{--    let id = $(this).val();--}}
                    {{--    const $zalopo = $(this).parents('tr').find('.zalopo');--}}
                    {{--    console.log(id);--}}
                    {{--    $.ajax({--}}
                    {{--        method: 'get',--}}
                    {{--        data: {--}}
                    {{--            id--}}
                    {{--        },--}}
                    {{--        url: '{{ url('/get-style') }}/' + id,--}}
                    {{--        success: function (result) {--}}
                    {{--            console.log(result)--}}
                    {{--            $zalopo.empty();--}}
                    {{--            $zalopo.append(`<option value="">Search & Select</option>`);--}}
                    {{--            $.each(result, function (key, value) {--}}
                    {{--                $zalopo.append(`<option value="${value.id}">${value.zalopo}</option>`);--}}
                    {{--            })--}}
                    {{--        },--}}
                    {{--        error: function (err) {--}}
                    {{--            console.log(err)--}}
                    {{--        }--}}
                    {{--    })--}}

                    {{--    $(".style").change(function (e) {--}}
                    {{--        /* $.ajaxSetup({--}}
                    {{--             headers: {--}}
                    {{--                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')--}}
                    {{--             }--}}
                    {{--         });*/--}}
                    {{--        // e.preventDefault();--}}
                    {{--        let buyerId = $(this).val();--}}
                    {{--        var div = $(this).parent();--}}

                    {{--        var op = " ";--}}

                    {{--        $.ajax({--}}
                    {{--            type: 'GET',--}}
                    {{--            url: '/get-zalopo/' + buyerId,--}}
                    {{--            data: {'id': buyerId},--}}
                    {{--            success: function (data) {--}}
                    {{--                op += '<option value="0" selected disabled>chose product</option>';--}}
                    {{--                for (var i = 0; i < data.length; i++) {--}}
                    {{--                    op += '<option value="' + data[i].id + '">' + data[i].zalopo + '</option>';--}}
                    {{--                }--}}
                    {{--                div.find('.zalopo').html(" ");--}}
                    {{--                div.find('.zalopo').append(op);--}}
                    {{--            },--}}
                    {{--            error: function (data) {--}}
                    {{--                console.log(data);--}}
                    {{--            }--}}
                    {{--        });--}}
                    {{--    });--}}

                    {{--});--}}






                });
            </script>
@endsection
