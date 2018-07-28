@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Create Voucher</div>

                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success"><h4>{{session('message')}}</h4></div>
                    @endif
                    <form class="form-horizontal" method="POST" action="/voucher/create">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Special Offer Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Discount (%)</label>

                            <div class="col-md-6">
                                <input id="discount" type="number" class="form-control" name="discount" value="{{ old('discount') }}" required>

                                @if ($errors->has('discount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Expiry date</label>

                            <div class="col-md-6">
                                <input id="expiry_date" type="date" class="form-control" name="expiry_date" value="{{ old('expiry_date') }}" required>

                                @if ($errors->has('expiry_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expiry_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Generate
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
