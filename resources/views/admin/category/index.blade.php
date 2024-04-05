@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Category</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Category Table</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Create Category</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>ID</th>
                          <th>Icon</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                          <td>{{$category->id}}</td>
                          <td><i style="font-size: 40px" class="{{$category->icon}}"></i></td>
                          <td>{{$category->name}}</td>
                          <td>
                            @if($category->status)
                            <label class="custom-switch mt-2">
                                <input data-id="{{$category->id}}" checked type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status">
                                <span class="custom-switch-indicator"></span>
                            </label>
                            @else 
                            <label class="custom-switch mt-2">
                                <input data-id="{{$category->id}}" type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status">
                                <span class="custom-switch-indicator"></span>
                            </label>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('admin.category.destroy', $category->id)}}" class="btn btn-danger delete-item">Delete</a>
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
                    url: "{{route('admin.change-status')}}",
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