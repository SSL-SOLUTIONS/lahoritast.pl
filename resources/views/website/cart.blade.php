@extends('layouts.website')
@section('content')
<br><br>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-md-sm-3">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ session()->get('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger col-6">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container mt-4">
    <h1 class="text-center">Your Cart</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $productId => $cartItem)
                <tr>
                    <td>{{ $cartItem['name'] }}</td>
                    <td>
                        <img src="{{ asset('img/products/' . $cartItem['image']) }}" class="img-thumbnail" style="max-width: 50px;">
                    </td>
                    <td>
                        <!-- Decrement Quantity Button -->
                        <a class="btn btn-sm btn-info" href="{{route('cart_update_qty' , [  $productId , 'minus'] )}}">-</a>
                        <span id="quantity_{{ $cartItem['id'] }}">{{ $cartItem['quantity'] }}</span>
                        <!-- Increment Quantity Button -->
                        <a class="btn btn-sm btn-info" href="{{route('cart_update_qty' , [  $productId , 'plus'])}}">+</a>
                    </td>
                    <td>Rs:{{ $cartItem['price'] }}</td>
                    <td class="align-middle">
                        <a href="{{ route('remove_cart', $productId) }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @php
    $totalPrice = 0;
    foreach($cart as $cartItem) {
    $totalPrice += $cartItem['price'];
    }
    @endphp
    <div class="text-left">
        <p><strong>Total Price:{{config('app.currency')}}{{ number_format($totalPrice, 2) }}</strong></p>
    </div>
    @if ($totalPrice > 0)
    <div class="text-center">
        <a class="btn btn-danger" href="{{ route('processToCheckout') }}">Process to Checkout</a>
    </div>
    <br>
    @endif
</div>
@endsection