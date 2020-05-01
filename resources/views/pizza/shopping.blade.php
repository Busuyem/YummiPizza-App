@extends('layouts.app')
@section('title', 'Your Shopping Details')
@section('content')
<div class="container mt-5">
    <h3 class="">Your Cart Details</h3>
    @if(Session::has("cart"))

        <div class="row">
            <div class="col-md-10">
                <ul class="list-group">
                    @foreach($pizzas as $pizza)
                        <li class="list-group-item">
                        <span class="badge badge-secondary float-right">Qty: {{$pizza['qty']}}</span>
                        <strong>{{$pizza['item']['title']}}:</strong> 
                        <span class="badge badge-info">${{$pizza['price']}}</span> 

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-8 ">
                 <strong>Total Price: ${{$totalPrice}}</strong>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-8 ">
                 <strong>Shipping cost: ${{$shipping}}</strong>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-8 ">
                 <strong>Sum Total: ${{$totalPrice+$shipping}}.00</strong>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-8">
            <a type="button" href="{{route('checkout')}}" class="btn btn-success">Checkout</a>
            </div>
        </div>

        @else

        <div class="row">
            <div class="col-md-8">
                 <button type="button" class="btn btn-success">You haven't ordered for any products yet.</button>
            <a href="{{route("showpizza")}}" class="btn btn-success">Visit Shop</a>
            </div>
        </div>

    @endif

</div>

@endsection