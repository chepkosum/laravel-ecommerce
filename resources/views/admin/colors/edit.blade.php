@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))

            <div class="alert alert-success">{{session('message')}}</div>

            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Update Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-primary text-white  btn-sm  float-end  ">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/colors/'.$color->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label >Color Name</label>
                            <input type="text" value="{{$color->name}}" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Color Code</label>
                            <input type="text" value="{{$color->code}}" name="code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Status</label> <br>
                            <input type="checkbox" {{$color->status =='1'?'checked':''}} name="status"/> Checked=Hidden, Unchecked=Visible
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
