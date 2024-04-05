@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Slider</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Slider</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.slider.index')}}" class="btn btn-light">Back</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Banner</label>
                      <input name="banner" id="banner" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                      <input name="type" value="{{old('type')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Text</label>
                      <input name="text" value="{{old('text')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Starting Price</label>
                      <input name="starting_price" value="{{old('starting_price')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Button Url</label>
                      <input name="button_url" value="{{old('button_url')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Serial</label>
                      <input name="serial" value="{{old('serial')}}" type="text" class="form-control">
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