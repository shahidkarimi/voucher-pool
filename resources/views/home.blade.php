@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b class="left">Create Voucher</b>
                    <a style="float:right" class="right btn btn-primary" href="/voucher/create"> <i class="fa fa-plus"></i> Create Voucher</a>
                    <div style="clear:both"></div>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Recipient</th>
                                <th>Special Offer</th>
                                <th>Redeemed</th>
                                <th>Redemption Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vouchers as $v)
                                <tr>
                                    <td>{{$v->code}}</td>
                                    <td>{{$v->recipient->mail}}</td>
                                    <td>{{$v->offer->name}}</td>
                                    <td>{{$v->date_redeemed=='' ? 'NO' : 'Yes'}}</td>
                                    <td>{{$v->date_redeemed=='' ? ' -- ': $v->date_redeemed}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $vouchers->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
