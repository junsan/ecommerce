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
                    <h4>Create Product</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.product.index')}}" class="btn btn-light">Back</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Thumbnail</label>
                      <input name="image" id="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{old('name')}}" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Category</label>
                            <select name="category" class="form-control form-control-sm main-category">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Sub-Category</label>
                            <select name="sub_category" class="form-control form-control-sm sub-category">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Child Category</label>
                            <select name="child_category" class="form-control form-control-sm child-category">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                      <label>Brand</label>
                      <select name="brand" class="form-control form-control-sm">
                        <option value="">Select</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sku</label>
                      <input name="sku" value="{{old('sku')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Stock</label>
                      <input name="qty" value="{{old('qty')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input name="price" value="{{old('price')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Offer Price</label>
                      <input name="offer_price" value="{{old('offer_price')}}" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer Start Date</label>
                                <input name="offer_start_date" value="{{old('offer_start_date')}}" type="text" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer End Date</label>
                                <input name="offer_end_date" value="{{old('offer_end_date')}}" type="text" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Short Description</label>
                      <textarea name="short_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Long Description</label>
                      <textarea name="long_description" class="summernote"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Top</label>
                                <select name="is_top" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Best</label>
                                <select name="is_best" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is Featured</label>
                                <select name="is_featured" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Is New Arrival</label>
                                <select name="is_new_arrival" class="form-control form-control-sm">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Video Link</label>
                      <input name="video_link" value="{{old('video_link')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Seo Title</label>
                      <input name="seo_title" value="{{old('seo_title')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Seo Description</label>
                      <textarea name="seo_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control form-control-sm">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
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
