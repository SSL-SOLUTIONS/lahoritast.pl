@extends('admin')
@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h2>Orders List</h2>

    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Order Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{ $order->user->name}}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address}}</td>
                    <td>
                        @if ($order->order_status == 'pending' || $order->order_status == 'processing' || $order->order_status == 'canceled')
                        <a href="{{ url('delivered', $order->id) }}" onclick="return confirm('Are you sure this product is delivered !!!')" class="btn btn-primary">Delivered</a>
                        @else
                        <p style="font-size: 30px; color: green"><b>&#10003;</b></p>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{ route('orderdetails', ['id' => $order->id]) }}">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection