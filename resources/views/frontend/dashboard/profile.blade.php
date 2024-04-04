@extends('frontend.dashboard.layouts.master')

@section('content')

  <section id="wsus__dashboard">
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.sidebar') 
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>
              
                  <div class="row">
                    
                    <div class="col-xl-9">
                    <form enctype="multipart/form-data" action="{{route('user.profile.update')}}" method="POST">
                        @csrf
                        @method('PUT')             
                      <div class="wsus__dash_pro_img">
                        <img width="200" src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="img" class="img-fluid">
                        <input name="image" id="image" type="file">
                      </div>
                  
                      <div class="row mt-5">
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input value="{{Auth::user()->name}}" name="name" id="name" type="text" placeholder="Name">
                          </div>
                        </div>
                        
                  
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fal fa-envelope-open"></i>
                            <input value="{{Auth::user()->email}}" name="email" id="email" type="email" placeholder="Email">
                          </div>
                        </div>
                        
                        <div class="col-xl-12">
                             <button class="common_btn mb-4 mt-2" type="submit">update</button>
                        </div>
                      
                        </form>
                      </div>
                        
                    </div>

                    
                    <div class="wsus__dash_pass_change mt-2">
                      <form action="{{route('user.profile.update.password')}}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-unlock-alt"></i>
                            <input name="current_password" type="password" placeholder="Current Password">
                          </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input name="password" type="password" placeholder="New Password">
                          </div>
                        </div>
                        <div class="col-xl-4">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input name="password_confirmation" type="password" placeholder="Confirm Password">
                          </div>
                        </div>
                        <div class="col-xl-12">
                          <button class="common_btn" type="submit">update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection