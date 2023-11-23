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
    <h1 class="text-center">Order History</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Order #</th>
                    <th scope="col">Address</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Delivery Charges</th>
                    <th scope="col">Net Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
                <tr>
                    <td> <a href="{{route('orders.details' , $order->id )}}">{{ $order->id}}</a> </td>
                    <td>{{ $order->address}} </td>
                    <td>{{config('app.currency')}} {{ $order->discount ?? '0' }}</td>
                    <td>{{config('app.currency')}} {{ (float)$order->delivery_charges ?? '0'}}</td>
                    <td>{{ config('app.currency') }} {{ (float)$order->delivery_charges + (float)$order->total - (float)$order->discount }}</td>
                    <td>{{$order->order_status}}</td>
                    <td>{{ $order->created_at->format('M d, Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<br>
@endsection