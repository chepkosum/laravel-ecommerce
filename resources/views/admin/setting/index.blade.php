@extends('layouts.admin')

@section('title', 'Admin Setting')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success mb-3 ">{{ session('message')}}</div>
            @endif
            <form action="{{url('/admin/settings')}}" method="POST">
                @csrf

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0 ">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label >Website Name</label>
                                <input type="text" value="{{$setting->website_name}}" name="website_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Website URL</label>
                                <input type="text" value="{{$setting->website_url}}" name="website_url" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label >Page Title</label>
                                <input type="text" value="{{$setting->website_title}}" name="website_title" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Meta Keywords</label>
                                <textarea name="meta_keyword" rows="3" class="form-control">{{$setting->meta_keyword}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control">{{$setting->meta_description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label >Address</label>
                                <textarea name="address" rows="3" class="form-control">{{$setting->address}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Phone 1 *</label>
                                <input type="text" value="{{$setting->phone1}}" name="phone1" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Phone 2 *</label>
                                <input type="text" value="{{$setting->phone2}}" name="phone2" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Email Id 1 *</label>
                                <input type="email" value="{{$setting->email1}}" name="email1" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Email Id 2 *</label>
                                <input type="email" value="{{$setting->email2}}" name="email2" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label >Facebook (Optional)</label>
                                <input type="text" value="{{$setting->facebook}}" name="facebook" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Twitter (Optional)</label>
                                <input type="text" value="{{$setting->twitter}}" name="twitter" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Instagram (Optional)</label>
                                <input type="text" value="{{$setting->instagram}}" name="instagram" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Youtube (Optional)</label>
                                <input type="text" value="{{$setting->youtube}}" name="youtube" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>
        </div>
    </div>

@endsection
