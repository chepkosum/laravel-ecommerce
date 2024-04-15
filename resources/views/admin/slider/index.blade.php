@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Slider List
                        <a href="{{ url('admin/sliders/create') }}"
                            class="btn btn-primary text-white  btn-sm  float-end  ">Add Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table-bordered table-striped table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $item)

                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <img src="{{asset("$item->image")}}"  style="width: 50px; height:50px;" alt="Slider">
                                </td>
                                <td>{{$item->status == '1'?'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/sliders/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm" >Edit</a>
                                    <a href="{{url('admin/sliders/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure you want to DELETE?')" class="btn btn-danger btn-sm" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
