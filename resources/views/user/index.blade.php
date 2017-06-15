@extends('admin.core')

@section('content')


    <div class="container">

        <!-- Content Header (Page header) -->
        <section style="padding-bottom: 35px;" class="content-header">
            <h1>
                {{auth()->user()->full_name}}
                <small>orders</small>
            </h1>

        </section>

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Cancel</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order['id']}}</td>
                        <td>{{$order['status']}}</td>
                        <td><a href="{{route('user.orders.show', $order['id'])}}">View</a></td>

                        @if($order['status'] == 'reserved')
                            <td><a href="{{route('user.orders.update', $order['id'])}}">Cancel</a></td>
                        @endif


                    </tr>

                @endforeach
            </table>
        </div>


    </div>

@endsection