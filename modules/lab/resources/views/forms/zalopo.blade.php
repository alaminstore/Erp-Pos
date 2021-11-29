@extends('lab::layout')

@section('content')
    <div class="padding">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                    <div class="box-header">
                        <h2>{{ $zalopo ? 'Update Style' : 'New Style' }}</h2>
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
                                {!! Form::model($zalopo, ['url' => $zalopo ? 'zalopo/'.$zalopo->id : 'zalopo', 'method' => $zalopo ? 'PUT' : 'POST']) !!}
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-control-label">Select Buyer</label>

                                    <div class="col-sm-10">
                                        {!! Form::select('name', $buyers ?? [], null, ['class' => 'form-control select2-input', 'id' => 'name', 'placeholder' => 'Select Buyer']) !!}

                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="style" class="col-sm-2 form-control-label">Zalo Po</label>

                                    <div class="col-sm-10">
                                        {!! Form::select('style', $styles ?? [], null, ['class' => 'form-control select2-input', 'id' => 'style', 'placeholder' => 'Select Zalo Po']) !!}

                                        @if($errors->has('style'))
                                            <span class="text-danger">{{ $errors->first('style') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="style" class="col-sm-2 form-control-label">Style Name</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('zalopo', null, ['class' => 'form-control', 'id' => 'zalopo', 'placeholder' => 'Write style\'s name here']) !!}
                                        @if($errors->has('zalopo'))
                                            <span class="text-danger">{{ $errors->first('zalopo') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row m-t-md">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">{{ $zalopo ? 'Update' : 'Create' }}</button>
                                        <a class="btn btn-danger" href="{{ url('zalopo') }}">Cancel</a>
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
