@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Vendor Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Vendor Profile</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Vendor Profile</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.vendor-profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Preview</label>
                      <br>
                      <img src="{{asset($profile->banner)}}" height="200" />
                    </div>
                    <div class="form-group">
                      <label>Banner</label>
                      <input name="banner" id="banner" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input name="phone" value="{{$profile->phone}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" value="{{$profile->email}}" type="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input name="address" value="{{$profile->address}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="summernote" name="description">{{$profile->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Facebook</label>
                      <input name="facebook" value="{{$profile->facebook}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Twitter</label>
                      <input name="twitter" value="{{$profile->twitter}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Instagram</label>
                      <input name="instagram" value="{{$profile->instagram}}" type="text" class="form-control">
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