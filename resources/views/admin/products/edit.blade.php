@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Update Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger text-white  btn-sm  float-end  ">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="pill" data-bs-target="#seotag"
                                    type="button" role="tab" aria-controls="seotag" aria-selected="false">
                                    SEO Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="pill" data-bs-target="#details"
                                    type="button" role="tab" aria-controls="details" aria-selected="false">
                                    Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images-tab" data-bs-toggle="pill" data-bs-target="#images"
                                    type="button" role="tab" aria-controls="images" aria-selected="false">
                                    Product Images</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="pill" data-bs-target="#color"
                                    type="button" role="tab" aria-controls="color" aria-selected="false">
                                    Product Colors</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="mytabContent">
                            <div class="tab-pane fade border p-3  show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" value="{{ $product->name }}" name="name"
                                        class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" value="{{ $product->slug }}" name="slug"
                                        class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>{Small Description(500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>{Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>


                            </div>
                            {{-- SEO TAGS --}}
                            <div class="tab-pane fade border p-3 " id="seotag" role="tabpanel"
                                aria-labelledby="seotag-tab" tabindex="0">

                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" value="{{ $product->meta_title }}" name="meta_title"
                                        class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>{Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>{ Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>
                            {{-- DETAILS --}}
                            <div class="tab-pane fade border p-3 " id="details" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original Price</label>
                                            <input type="text" value="{{ $product->original_price }}"
                                                name="original_price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="text" value="{{ $product->selling_price }}"
                                                name="selling_price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" value="{{ $product->quantity }}" name="quantity"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" {{ $product->trending == '1' ? 'checked' : '' }}
                                                name="trending" style="width: 50px; height: 50px" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Featured</label>
                                            <input type="checkbox" {{ $product->featured == '1' ? 'checked' : '' }}
                                                name="featured" style="width: 50px; height: 50px" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" {{ $product->status == '1' ? 'checked' : '' }}
                                                name="status" style="width: 50px; height: 50px" />
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Product Image --}}
                            <div class="tab-pane fade border p-3 " id="images" role="tabpanel"
                                aria-labelledby="details-tab"tabindex="0">
                                <div class="mb-3">
                                    <label>Upload Product Image</label>
                                    <input type="file" multiple name="image[]" class="form-control" />
                                </div>
                                <div>
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($image->image) }}"
                                                        style="width: 50px; heigth:50px;" class="me-4 border"
                                                        alt="Img">
                                                    <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                        class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>
                            </div>

                            {{-- Product Color --}}
                            <div class="tab-pane fade border p-3 " id="color" role="tabpanel"
                                aria-labelledby="details-tab"tabindex="0">
                                <div class="mb-3">
                                    <h4>Add Product Color</h4>
                                    <label>Select Color</label>
                                    <hr />
                                    <div class="row">
                                        @forelse ($colors as $color)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3 ">
                                                    Color: <input type="checkbox" value="{{ $color->id }}"
                                                        name="colors[{{ $color->id }}]" />{{ $color->code }}
                                                    <br />
                                                    Quantity: <input type="number"
                                                        name="colorquantity[{{ $color->id }}]"
                                                        style="width: 70px; border:1px solid;" />
                                                </div>

                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h5>No Colors Available</h5>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($prodColor->color)
                                                            {{ $prodColor->color->name }}
                                                        @else
                                                        <h6>No Color Found</h6>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mv-3" style="width: 150px">
                                                            <input type="text" value="{{ $prodColor->quantity }}"
                                                                class="productColorQuantity form-control form-control-sm">
                                                            <button type="button" value="{{ $prodColor->id }}"
                                                                class="updateProductColorBtn btn btn-primary btn-sm text-white ">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $prodColor->id }}"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm text-white ">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="py-2 float-end ">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.updateProductColorBtn', function(){

            var product_id = "{{ $product->id}}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();


            if(qty <=0){

                alert("Quantity is required");
                return false;
            }

            var data={
                'product_id':product_id,
                // 'product_color_id': prod_color_id,
                'qty':qty
            };

            $.ajax({
                type:"POST",
                url:"/admin/product-color/"+prod_color_id,
                data: data,
                success: function(response){
                    alert(response.message)
                }
            });
        });

        $(document).on('click', '.deleteProductColorBtn', function(){

            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type:"GET",
                url: "/admin/product-color/"+prod_color_id+"/delete",
                success: function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message)
                }
            });
        });

    });
</script>
@endsection
