@extends('layouts.website')
@section('content')
<br>

@if(session()->has('success'))
<div class="alert alert-success">

    {{ session()->get('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container mt-4">
    <h1 class="text-center">Order Detail</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Item Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $key => $orderdetail)
                <tr>
                    <td>{{ $orderdetail->product?->name }} </td>
                    <td class="text-center">
                        <img src="{{ asset('/img/products/' . $orderdetail->product?->image) }}" height="50" />
                    </td>

                    <td>{{config('app.currency')}} {{ $orderdetail->price ?? '0' }}</td>
                    <td>{{ $orderdetail->qty ?? '0'}}</td>
                    <td>{{config('app.currency')}} {{ $orderdetail->qty * $orderdetail->price  }}</td>
                </tr>
                @endforeach
                <tr>
                    <td class="text-right pr-5 font-weight-bold" colspan="4"> Gross Total</td>
                    <td class="font-weight-bold"> {{config('app.currency')}} {{ $order->total ?? '0' }} </td>
                </tr>
                <tr>
                    <td class="text-right pr-5 font-weight-bold" colspan="4"> Discount</td>
                    <td class="font-weight-bold"> {{config('app.currency')}} {{ $order->discount ?? '0' }} </td>
                </tr>
                <tr>
                    <td class="text-right pr-5 font-weight-bold" colspan="4"> Deliver Charges</td>
                    <td class="font-weight-bold"> {{config('app.currency')}} {{ (float)$order->delivery_charges ?? '0'}} </td>
                </tr>
                <tr>
                    <td class="text-right pr-5 font-weight-bold" colspan="4"> Net Total</td>
                    <td class="font-weight-bold"> {{config('app.currency')}} {{(float) $order->delivery_charges + (float) $order->total - (float)$order->discount }} </td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
<br>
@endsection