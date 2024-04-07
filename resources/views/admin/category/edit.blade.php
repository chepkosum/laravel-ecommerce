@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary text-white  btn-sm  float-end  ">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" value="{{$category->name}}" name="name" class="form-control" />
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" value="{{$category->slug}}" name="slug" class="form-control" />
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control"  rows="3">{{$category->description}}</textarea>
                                @error('description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                <img src="{{asset('/uploads/category/'.$category->image)}}" width="50px" height="50px" alt="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label> <br>
                                <input type="checkbox" {{$category->status ==true?'checked':''}} name="status" />
                            </div>

                            <div class="col-md-12">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Title</label>
                                <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control" />
                                @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword"  rows="3" class="form-control">{{$category->description}}</textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description"  rows="3" class="form-control">{{$category->meta_description}}</textarea>
                                @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end  ">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
