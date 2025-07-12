@extends('admin.layout.master')
@section('content')
 
    <!-- Page header -->
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">My Account</h2>
                        <h3 class="card-title">Profile Details</h3>
                       <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                         <input type="hidden" name="update_type" value="profile_update">


                         <div class="row align-items-center">
                            <div class="col-auto">
                                <img id="showImage" src="{{ asset(Auth::user()->image) }}" class="avatar avatar-xl">
                            </div>

                        
                            <div class="col-auto"> <input type="file" name="image" class="form-control" id="image"></div>

                        </div>
                        <h3 class="card-title mt-4"></h3>
                        <div class="row g-3">
                            <div class="col-md">
                                <div class="form-label">Name</div>
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                 <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                            </div>
                            <div class="col-md">
                                <div class="form-label">Email Address</div>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                  <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>

                        </div>



                             <div class="row g-3 mt-1">
                            <div class="col-md">
                                <div class="form-label">Contact</div>
                                <input type="tel" name="contact" class="form-control" value="{{ Auth::user()->contact }}">
                                 <x-input-error :messages="$errors->get('contact')" class="mt-2 text-danger" />
                            </div>
                            <div class="col-md">
                                <div class="form-label">Headline</div>
                                <input type="text" name="headline" class="form-control" value="{{ Auth::user()->headline }}">
                                  <x-input-error :messages="$errors->get('headline')" class="mt-2 text-danger" />
                            </div>

                        </div>




                                 <div class="row g-3 mt-1">
                            <div class="col-md">
                                <div class="form-label">Address</div>
                                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                                 <x-input-error :messages="$errors->get('address')" class="mt-2 text-danger" />
                            </div>
                            <div class="col-md">
                                <div class="form-label">Bio</div>
                                <input type="text" name="bio" class="form-control" value="{{ Auth::user()->bio }}">
                                  <x-input-error :messages="$errors->get('bio')" class="mt-2 text-danger" />
                            </div>

                        </div>





                           <div class="row g-3 mt-1">
                            <div class="col-md">
                                <div class="form-label">Gender</div>
                               <select name="gender" class="form-control">
                                <option value="">Select</option>
                                <option @selected(@Auth::user()->gender == 'male') value="male">Male</option>
                                <option @selected(@Auth::user()->gender == 'female') value="female">Female</option>
                               </select>
                               @error('gender')
                                  <span class="text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                            <div class="col-md">
                                <div class="form-label">Website</div>
                                <input type="url" name="website" class="form-control" value="{{ Auth::user()->website }}">
                                  <x-input-error :messages="$errors->get('website')" class="mt-2 text-danger" />
                            </div>

                        </div>




                           <div class="row g-3 mt-1">
                            <div class="col-md">
                                  <div class="form-label">GitHub</div>
                                <input type="url" name="github" class="form-control" value="{{ Auth::user()->github }}">
                                  <x-input-error :messages="$errors->get('github')" class="mt-2 text-danger" />
                              
                            </div>
                            <div class="col-md">
                                <div class="form-label">Linkdin</div>
                                <input type="url" name="linkedin" class="form-control" value="{{ Auth::user()->linkedin }}">
                                  <x-input-error :messages="$errors->get('linkedin')" class="mt-2 text-danger" />
                            </div>

                        </div>



                             <div class="row g-3 mt-1">
                            <div class="col-md">
                                  <div class="form-label">X</div>
                                <input type="url" name="x" class="form-control" value="{{ Auth::user()->x }}">
                                  <x-input-error :messages="$errors->get('x')" class="mt-2 text-danger" />
                              
                            </div>

                                <div class="col-md">
                                <div class="form-label">Facebook</div>
                                <input type="url" name="facebook" class="form-control" value="{{ Auth::user()->facebook }}">
                                  <x-input-error :messages="$errors->get('facebook')" class="mt-2 text-danger" />
                            </div>
                       

                        </div>




                       

                        <button class="btn btn-primary mt-4">Update Details</button>
                       </form>

                        <h3 class="card-title mt-4">Password</h3>
                        <p class="card-subtitle">You can set a permanent password </p>

                         
                       <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                             <div class="col-10">
                                 <div class="form-label">Current Password</div>
                                  <input class="form-control" name="current_password" type="password">
                                   <x-input-error :messages="$errors->get('current_password')" class="mt-2 text-danger" />

                                   <div class="form-label mt-3">New Password</div>
                                  <input class="form-control" name="password" type="password">
                                  <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />

                                   <div class="form-label mt-3">Confirm Password</div>
                                  <input class="form-control" name="password_confirmation" type="password">
                                   <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                            </div>

                              <input type="hidden" name="update_type" value="password_update">

                             <button class="btn btn-primary mt-4">Update Password</button>
                       </form>
                    

                     
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
@endsection
