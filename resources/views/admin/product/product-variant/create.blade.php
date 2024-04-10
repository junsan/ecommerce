@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Product Variant</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Product Variant</h4>       
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{old('text')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <input name="product" value="{{$product->id}}" type="hidden" class="form-control">
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