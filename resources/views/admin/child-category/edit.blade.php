@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Sub-Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Sub-Category</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Sub-Category</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.sub-category.index')}}" class="btn btn-light">Back</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.sub-category.update', $subCategory->id)}}" method="POST">
                    @csrf    
                    @method('PUT')
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category" class="form-control form-control-sm">
                        <option value="">Select</option>
                        @foreach($categories as $category)
                          <option {{$category->id == $subCategory->category_id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>   
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{$subCategory->name}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control form-control-sm">
                        <option {{$subCategory->status == 1 ? 'selected': ''}} value="1">Active</option>
                        <option {{$subCategory->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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