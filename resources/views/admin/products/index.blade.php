@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{session('message')}} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary text-white  btn-sm  float-end  ">Add Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Category</td>
                                <td>Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                              <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if ($product->category)
                                       {{$product->category->name}}
                                       @else
                                           No Category
                                       @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status == 1? 'Hidden': 'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>

                               </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No products available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
