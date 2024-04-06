@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Child Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Child Category</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Child Category</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.child-category.index')}}" class="btn btn-light">Back</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.child-category.update', $childCategory->id)}}" method="POST">
                    @csrf    
                    @method('PUT')
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category" class="form-control form-control-sm main-category">
                        <option value="">Select</option>
                        @foreach($categories as $category)
                          <option {{$childCategory->category_id == $category->id ? 'selected': '' }} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>  
                    <div class="form-group">
                      <label>Sub-Category</label>
                      <select name="sub_category" class="form-control form-control-sm sub-category">
                        <option value="">Select</option>
                        @foreach($subCategories as $subCategory) 
                          <option {{$childCategory->sub_category_id == $subCategory->id ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                        @endforeach
                      </select>
                    </div>   
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{$childCategory->name}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control form-control-sm">
                        <option {{$childCategory->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{$childCategory->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
                    url: "{{route('admin.child-category.get-subcategories')}}",
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
        });
  </script>
@endpush