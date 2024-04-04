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
                    <h4>Update Slider</h4>
                    <div class="card-header-action">
                        <a href="" class="btn btn-light">Back</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Preview</label>
                      <br>
                      <img src="{{asset($slider->banner)}}" width="300" />
                    </div>
                    <div class="form-group">
                      <label>Banner</label>
                      <input name="banner" id="banner" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                      <input name="type" value="{{$slider->type}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Text</label>
                      <input name="text" value="{{$slider->text}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Starting Price</label>
                      <input name="starting_price" value="{{$slider->starting_price}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Button Url</label>
                      <input name="button_url" value="{{$slider->button_url}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Serial</label>
                      <input name="serial" value="{{$slider->serial}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control form-control-sm">
                        <option {{$slider->status == 1 ? 'selected' : ''; }} value="1">Active</option>
                        <option {{$slider->status == 0 ? 'selected' : ''; }} value="0">Inactive</option>
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