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
                    <h4>Brand Table</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.child-category.create')}}" class="btn btn-primary">Create Child Category</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Sub-Category</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        @foreach($brands as $brand)
                        <tr>
                          <td>{{$brand->id}}</td>
                          <td>{{$brand->name}}</td>
                          <td>
                            @if($brand->status)
                            <label class="custom-switch mt-2">
                                <input data-id="{{$brand->id}}" checked type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status">
                                <span class="custom-switch-indicator"></span>
                            </label>
                            @else 
                            <label class="custom-switch mt-2">
                                <input data-id="{{$brand->id}}" type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status">
                                <span class="custom-switch-indicator"></span>
                            </label>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('admin.child-category.edit', $brand->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('admin.child-category.destroy', $brand->id)}}" class="btn btn-danger delete-item">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
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
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                
                $.ajax({
                    type: 'PUT',
                    url: "{{route('admin.child-category.change-status')}}",
                    data: {
                        id: id,
                        status: isChecked
                    },
                    success: function (data) {
                        if(data.status == 'success') {
                         
                        }
                    }
                })

            });
        })    
    </script>
@endpush