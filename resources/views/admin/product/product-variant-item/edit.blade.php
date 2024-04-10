@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant Item</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Product Variant Item</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Product Variant</h4>  
                    <div class="card-header-action">
                        <a href="{{route('admin.product-variant-item.index', ['variant' => $variantItem->product_variant_id])}}" class="btn btn-light">Back</a>
                    </div>     
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant-item.update', $variantItem->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Variant</label>
                      <input name="variant" value="{{$variantItem->variant->name}}" type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{$variantItem->name}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input name="price" value="{{$variantItem->price}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Is Default</label>
                      <select name="is_default" class="form-control form-control-sm">
                        <option value="">Select</option>
                        <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">Yes</option>
                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">No</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control form-control-sm">
                        <option {{$variantItem->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{$variantItem->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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