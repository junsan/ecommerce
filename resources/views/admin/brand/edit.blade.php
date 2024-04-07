@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Brand</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Brand</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.brand.index')}}" class="btn btn-light">Back</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Preview</label>
                      <br>
                      <img src="{{asset($brand->logo)}}" width="300" />
                    </div>
                    <div class="form-group">
                      <label>Logo</label>
                      <input name="logo" id="logo" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{$brand->name}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Is Featured</label>
                      <select name="is_featured" class="form-control form-control-sm">
                        <option value="">Select</option>
                        <option {{$brand->is_featured == 1 ? 'selected': ''}} value="1">Yes</option>
                        <option {{$brand->is_featured == 0 ? 'selected': ''}} value="0">No</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control form-control-sm">
                        <option {{$brand->status == 1 ? 'selected' : ''}} value="1">Active</option>
                        <option {{$brand->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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