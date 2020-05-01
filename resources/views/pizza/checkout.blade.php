@extends('layouts.app')

@section('title', 'Payment for Your Shopping')


@section('content')

<div class="card-body">

 <div class="row">
        <div class="col-md-10">
            <h4>Payment Page</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <p>Total Price: <strong>${{$total}}.00</strong></p>
                    <p>Shipping cost: <strong>${{$shipping}}.00</strong></p>
                    <p>Amount To Pay:<strong> ${{$total + $shipping}}.00</strong></p>
                    <p>Shipping Address:<strong> {{auth()->user()->address}}</strong></p>
                    <p>Contact Details:<strong> {{auth()->user()->phone}}</strong></p>
                
                </li>
                <div class="mt-2">

                <a href="{{route("payment")}}" class="btn btn-success">Make Payment</a>

                </div>
            </ul>
        </div>
    </div>

</div>

@endsection