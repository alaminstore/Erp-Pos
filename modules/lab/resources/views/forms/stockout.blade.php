@extends('lab::layout')

@section('content')

    <style>
        .system_flex {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: baseline;
        }

        .clr {
            clear: both;
        }

        ::placeholder {
            font-size: 12px;
        }

        label {
            font-size: 12px;
        }
    </style>

    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header system_flex">
                        <h2>New Stock Out</h2>
                        <h2 class="">
                            System Out Number: &nbsp;
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
                                {!! Form::model($stockout, ['url' => $stockout ? 'stockout/'.$stockout->id : 'stockout', 'method' => 'POST']) !!}

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-12 form-control-label">Out Date</label>
                                            <div class="col-sm-12">
                                                {!! Form::date('date', null, ['class' => 'form-control', 'id' => 'date_tb']) !!}

                                                @if($errors->has('date'))
                                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group row">
                                            <label for="delivery_to" class="col-sm-12 form-control-label">Delivery
                                                To</label>
                                            <div class="col-sm-12">
                                                {!! Form::select('delivery', $delivery_to ?? [], null, ['class' => 'form-control select2-input', 'id' => 'project_type_id', 'placeholder' => 'Select Delivery To']) !!}

                                                @if($errors->has('delivery'))
                                                    <span class="text-danger">{{ $errors->first('delivery') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group row">
                                            <label for="systemin">&nbsp; &nbsp;System In Number</label>
                                            <div class="col-sm-12">
                                                {!! Form::select('systemin', $systemin ?? [], null, ['class' => 'form-control select2-input systemin', 'id' => 'systemin', 'placeholder' => 'Select System In Number']) !!}

                                                @if($errors->has('systemin'))
                                                    <span class="text-danger">{{ $errors->first('systemin') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="invoice_no" class="col-sm-12 form-control-label">Invoice
                                                No</label>

                                            <div class="col-sm-12">
                                                {!! Form::text('invoice_no', null, ['class' => 'form-control', 'id' => 'invoice_no', 'placeholder' => 'Invoice No']) !!}

                                                @if($errors->has('invoice_no'))
                                                    <span class="text-danger">{{ $errors->first('invoice_no') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clr"></div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="buyer" class="col-sm-12 form-control-label">Buyer</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('buyer', null, ['class' => 'form-control', 'id' => 'buyer', 'placeholder' => 'Buyer Name']) !!}

                                                @if($errors->has('buyer'))
                                                    <span class="text-danger">{{ $errors->first('buyer') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="zalopo" class="col-sm-12 form-control-label">Zalo Po</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('zalopo', null, ['class' => 'form-control', 'id' => 'zalopo', 'placeholder' => 'Zalopo Name']) !!}

                                                @if($errors->has('zalopo'))
                                                    <span class="text-danger">{{ $errors->first('zalopo') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="style" class="col-sm-12 form-control-label">Style</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('style', null, ['class' => 'form-control', 'id' => 'style', 'placeholder' => 'Style Name']) !!}

                                                @if($errors->has('style'))
                                                    <span class="text-danger">{{ $errors->first('style') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="style" class="col-sm-12 form-control-label">Req No</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('req_no', null, ['class' => 'form-control', 'id' => 'req_no', 'placeholder' => 'Req No']) !!}

                                                @if($errors->has('req_no'))
                                                    <span class="text-danger">{{ $errors->first('req_no') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="racklist" class="col-sm-12 form-control-label">Rack List</label>

                                            <div class="col-sm-12">
                                                {!! Form::text('racklist', null, ['class' => 'form-control', 'id' => 'racklist', 'placeholder' => 'Rack List']) !!}

                                                @if($errors->has('racklist'))
                                                    <span class="text-danger">{{ $errors->first('racklist') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="rackfloor" class="col-sm-12 form-control-label">Rack
                                                Floor</label>

                                            <div class="col-sm-12">
                                                {!! Form::text('rack_floor', null, ['class' => 'form-control', 'id' => 'rack_floor', 'placeholder' => 'Rack Floor']) !!}

                                                @if($errors->has('rack_floor'))
                                                    <span class="text-danger">{{ $errors->first('rack_floor') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="fabric_type" class="col-sm-12 form-control-label">Fabric
                                                Type</label>

                                            <div class="col-sm-12">
                                                {!! Form::text('fabric_type', null, ['class' => 'form-control', 'id' => 'fabric_type', 'placeholder' => 'Fabric Type']) !!}

                                                @if($errors->has('fabric_type'))
                                                    <span class="text-danger">{{ $errors->first('fabric_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="pattern_name" class="col-sm-12 form-control-label">Pattern
                                                Name</label>

                                            <div class="col-sm-12">
                                                {!! Form::text('pattern_name', null, ['class' => 'form-control', 'id' => 'pattern_name', 'placeholder' => 'Pattern Name']) !!}

                                                @if($errors->has('pattern_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('pattern_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        {!! Form::hidden('systemout', $system_number, ['class' => 'form-control', 'id' => 'system']) !!}

                                                        @if($errors->has('systemout'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('systemout') }}</span>
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
                                                    <th style="">Receiving<br>Quantity</th>
                                                    <th>Roll No</th>
                                                    <th>Delivery <br> Quantity</th>
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
                                                            {!! Form::select('booking_quantity[]', $booking_qty ?? [], null, ['class' => 'booking_qty form-control select2-input ', 'id' => 'booking_qty', 'placeholder' => 'Select Booking Quantity']) !!}

                                                            @if($errors->has('booking_quantity'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('booking_quantity') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            {!! Form::select('receiving_qty[]', $receiving_qty ?? [], null, ['class' => 'receiving_qty form-control select2-input ', 'id' => 'receiving_qty', 'placeholder' => 'Receive']) !!}

                                                            @if($errors->has('receiving_qty'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('receiving_qty') }}</span>
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
                                                            {!! Form::number('delivery_quantity[]', null, ['class' => 'form-control delivery_qty', 'id' => 'delivery_qty', 'placeholder' => 'Delivery Quantity']) !!}

                                                            @if($errors->has('delivery_quantity'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('delivery_quantity') }}</span>
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

                                {{--=========================================================================================--}}


                                <div class="form-group row m-t-md">
                                    <div class=" col-sm-12 text-center">
                                        <button type="submit" id="sub" class="btn btn-success sub">Create</button>
                                        <a class="btn btn-danger" href="{{ url('stockout') }}">Cancel</a>
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


            //auto complete textbox by dropdown start

            $(document).on('change', '.systemin', function () {
                var prod_id = $(this).val();
                console.log('id', prod_id);

                var a = $(this).parent();
                console.log(prod_id);
                var op = "";
                $.ajax({
                    type: 'get',
                    url: '{!!URL::to('stockoutValue')!!}',
                    data: {'id': prod_id},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        console.log('test', data.buyer);
                        $('#buyer').val(data.buyer);
                        $('#invoice_no').val(data.invoice_no);
                        $('#zalopo').val(data.zalopo);
                        $('#style').val(data.style);
                        $('#racklist').val(data.racklist.name);
                        $('#rack_floor').val(data.rack_floor);
                        $('#fabric_type').val(data.fabric_type);
                        $('#pattern_name').val(data.pattern_name);
                    },
                    error: function () {

                    }
                });


            });

            //auto complete textbox by dropdown End

            //  Conditional dropdown start==========================================================================

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
                    url: '{{ url('/out-fabrication') }}/' + id,
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
                    url: '{{ url('/out-gsm') }}/' + id,
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
                    url: '{{ url('/out-dia') }}/' + id,
                    success: function (result) {
                        console.log(result)
                        $dia.empty();
                        $dia.append(`<option value="">Search & Select</option>`);
                        $.each(result, function (key, value) {
                            console.log(value);
                            // $dia.append(`<option value="${value.dia}">${value.dia}</option>`);
                            $dia.append(`<option value="${value.id}">${value.dia}</option>`);
                        })
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })

            });

            // dia to booking_quantity
            $(document).on('change', '.dia', function (e) {
                // e.preventDefault();
                let id = $(this).val();
                console.log(id);
                const $booking_qty = $(this).parents('tr').find('.booking_qty');

                $.ajax({
                    method: 'get',
                    data: {
                        id
                    },
                    url: '{{ url('/out-booking') }}/' + id,
                    success: function (result) {
                        console.log(result)
                        $booking_qty.empty();
                        $booking_qty.append(`<option value="">Search & Select</option>`);
                        $.each(result, function (key, value) {
                            console.log(value);
                            $booking_qty.append(`<option value="${value.id}">${value.booking_qty}</option>`);
                        })
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })

            });


            //  Conditional dropdown end========================================================================================
            // $('#btnCheck').click(function() {

            // $("form").submit(function() {
            // var booking = $('#booking_qty').val();
            // var delivery = $('#delivery_qty').val();

            // if (delivery > booking)
            // {
            //     alert('Delivery Quantity must not be greater than booking quantity !');
            //     return false;
            // }
            // });

            // $('.delivery_qty').focusout(function (){
            //     let id = $(this).val();
            //     console.log('focus',id);
            //     var booking_qty = $(this).parents('tr').find('.receiving_qty');
            //     console.log('booking_qty',booking_qty);
            //     check_booking();
            // });


            $(document).on('change', '.booking_qty', function (e) {
                let id = $(this).val();
                console.log('book', id);
                const $receive_qty = $(this).parents('tr').find('.receiving_qty');

                $.ajax({
                    method: 'get',
                    data: {
                        id
                    },
                    url: '{{ url('/out-receive') }}/' + id,
                    success: function (result) {
                        console.log(result)
                        $receive_qty.empty();
                        $receive_qty.append(`<option value="">Search & Select</option>`);
                        $.each(result, function (key, value) {
                            console.log(value);
                            $receive_qty.append(`<option value="${value.receiving_qty}">${value.receiving_qty}</option>`);
                        })
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })
            });

            // $('.delivery_qty').focusout(function (){
            //     let id = $(this).val();
            //     console.log('focus',id);
            //     console.log('again book',book_id);
            //
            // });


            // $(document).on('input', '.delivery_qty', function (e) {
            //     let id = $(this).val();
            //     console.log('delivery quantity: ',id);
            //     var booking_qty = $(this).parents('tr').find('.booking_qty');
            //     console.log(booking_qty);
            //     if(id>booking_qty){
            //         alert('errorrrrrrrrrrrrrr');
            //     }
            // });


        });

    </script>
@endsection
