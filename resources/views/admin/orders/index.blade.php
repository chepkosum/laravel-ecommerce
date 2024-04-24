@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>My Orders</h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>Order ID</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $orderItem)
                                    <tr>
                                        <td>{{$orderItem->id}}</td>
                                        <td>{{$orderItem->tracking_no}}</td>
                                        <td>{{$orderItem->fullname}}</td>
                                        <td>{{$orderItem->payment_mode}}</td>
                                        <td>{{$orderItem->created_at->format('d-m-y')}}</td>
                                        <td>{{$orderItem->status_message}}</td>
                                        <td>
                                            <a href="{{url('admin/orders/'.$orderItem->id)}}" class="btn btn-primary btn-sm">View</a>
                                            {{-- <a href="" class="btn btn-primary btn-sm" >Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a> --}}
                                        </td>
                                    </tr>

                                @empty
                                  <tr>
                                    <td colspan="7">No Orders available</td>
                                  </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

