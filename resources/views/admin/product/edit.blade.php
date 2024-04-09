@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Product</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Product</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.product.index')}}" class="btn btn-light">Back</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Preview</label>
                      <br>
                      <img src="{{asset($product->thumb_image)}}" width="300" />
                    </div>
                    <div class="form-group">
                      <label>Thumbnail</label>
                      <input name="image" id="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{$product->name}}" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Category</label>
                            <select name="category" class="form-control form-control-sm main-category">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option {{$product->category_id == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Sub-Category</label>
                            <select name="sub_category" class="form-control form-control-sm sub-category">
                                <option value="">Select</option>
                                @foreach($subCategories as $subCategory)
                                    <option {{$product->sub_category_id == $subCategory->id ? 'selected' : '' }} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Child Category</label>
                            <select name="child_category" class="form-control form-control-sm child-category">
                                <option value="">Select</option>
                                @foreach($childCategories as $childCategory)
                                    <option {{$product->child_category_id == $childCategory->id ? 'selected' : '' }} value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                      <label>Brand</label>
                      <select name="brand" class="form-control form-control-sm">
                        <option value="">Select</option>
                        @foreach($brands as $brand)
                            <option {{$brand->id == $product->brand_id ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sku</label>
                      <input name="sku" value="{{$product->sku}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Stock</label>
                      <input name="qty" value="{{$product->qty}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input name="price" value="{{$product->price}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Offer Price</label>
                      <input name="offer_price" value="{{$product->offer_price}}" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer Start Date</label>
                                <input value="{{$product->offer_start_date}}" name="offer_start_date" value="{{old('offer_start_date')}}" type="text" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer End Date</label>
                                <input value="{{$product->offer_end_date}}" name="offer_end_date" value="{{old('offer_end_date')}}" type="text" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Short Description</label>
                      <textarea name="short_description" class="form-control">{!! $product->short_description !!}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Long Description</label>
                      <textarea name="long_description" class="summernote">{!! $product->long_description !!}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Top</label>
                                <select name="is_top" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option {{$product->is_top == 1 ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{$product->is_top == 0 ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Best</label>
                                <select name="is_best" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option {{$product->is_best == 1 ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{$product->is_best == 0 ? 'selected' : '' }} ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Featured</label>
                                <select name="is_featured" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option {{$product->is_featured == 1 ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{$product->is_featured == 0 ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is New Arrival</label>
                                <select name="is_new_arrival" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option {{$product->is_new_arrival == 1 ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{$product->is_new_arrival == 0 ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Video Link</label>
                      <input name="video_link" value="{{$product->video_link}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Seo Title</label>
                      <input name="seo_title" value="{{$product->seo_title}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Seo Description</label>
                      <textarea name="seo_description" class="form-control">{!! $product->seo_description !!}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control form-control-sm">
                        <option {{$product->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{$product->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection

@push('scripts')
  <script>
        $('document').ready(function() {
            $('body').on('change', '.main-category', function() {
              let id = $(this).val();
              $.ajax({
                    type: 'GET',
                    url: "{{route('admin.product.get-subcategories')}}",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        if(data.status == 'success') {
                          $('.sub-category').html(`<option value="">Select</option>`)
                          $('.child-category').html(`<option value="">Select</option>`)
                          $.each(data.data, function(i,data) {
                            $('.sub-category').append(`<option value="${data.id}">${data.name}</option>`)
                          })  
                        }
                    }
                })
            });

            $('body').on('change', '.sub-category', function() {
              let id = $(this).val();
              $.ajax({
                    type: 'GET',
                    url: "{{route('admin.product.get-childcategories')}}",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        if(data.status == 'success') {
                          $('.child-category').html(`<option value="">Select</option>`)
                          $.each(data.data, function(i,data) {
                            $('.child-category').append(`<option value="${data.id}">${data.name}</option>`)
                          })  
                        }
                    }
                })
            });
        });
  </script>
@endpush
