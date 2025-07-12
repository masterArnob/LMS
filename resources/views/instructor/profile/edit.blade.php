@extends('frontend.layout.master')
@section('content')
    <!--===========================
                    BREADCRUMB START
                ============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('uploads/default-files/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Edit Profile</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Edit Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                    BREADCRUMB END
                ============================-->


    <!--===========================
                    DASHBOARD PROFILE EDIT START
                ============================-->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    @include('student.layout.sidebar')
                </div>
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Information</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                            </div>

                        </div>

                        <div class="wsus__dashboard_profile wsus__dashboard_profile_avatar">
                            <div class="img">
                                <img class="wd-100 rounded-circle mb-4" src="{{ asset(Auth::user()->image) }}"
                                    alt="user" id="showImage">

                            </div>
                            <div class="text">
                                <h6>Your avatar</h6>
                                <p>PNG or JPG no bigger than 400px wide and tall.</p>
                            </div>
                        </div>

                        <form action="{{ route('instructor.profile.update', Auth::user()->id) }}" method="POST"
                            class="wsus__dashboard_profile_update" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="update_type" value="profile_update">

                            <input type="file" class="form-control" name="image" id="image">
                            <div class="row mt-3">
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Name</label>
                                        <input name="name" value="{{ Auth::user()->name }}" type="text"
                                            placeholder="Enter your first name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Contact</label>
                                        <input type="tel" name="contact" value="{{ Auth::user()->contact }}"
                                            placeholder="Enter your contact number">
                                        @error('contact')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input type="email" value="{{ Auth::user()->email }}" name="email"
                                            placeholder="Enter your email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 mt-2">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="">Select</option>
                                            <option @selected(Auth::user()->gender == 'male') value="male">Male</option>
                                            <option @selected(Auth::user()->gender == 'female') value="female">Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Headline</label>
                                        <input type="text" value="{{ Auth::user()->headline }}" name="headline"
                                            placeholder="Enter your headline">
                                        @error('headline')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Bio</label>
                                        <input type="text" value="{{ Auth::user()->bio }}" name="bio"
                                            placeholder="Enter your bio">
                                        @error('bio')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Facebook</label>
                                        <input type="url" value="{{ Auth::user()->facebook }}" name="facebook"
                                            placeholder="Enter your facebook">
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>X</label>
                                        <input type="url" value="{{ Auth::user()->x }}" name="x"
                                            placeholder="Enter your x">
                                        @error('x')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Linkedin</label>
                                        <input type="url" value="{{ Auth::user()->linkedin }}" name="linkedin"
                                            placeholder="Enter your linkedin">
                                        @error('linkedin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Website</label>
                                        <input type="url" value="{{ Auth::user()->website }}" name="website"
                                            placeholder="Enter your website">
                                        @error('website')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>GitHub</label>
                                        <input type="url" value="{{ Auth::user()->github }}" name="github"
                                            placeholder="Enter your github">
                                        @error('github')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                            </div>















                            <div class="col-xl-12">
                                <div class="wsus__dashboard_profile_update_info">
                                    <label>Address</label>
                                    <textarea rows="7" name="address" placeholder="Your text here">{{ Auth::user()->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__dashboard_profile_update_btn">
                                    <button type="submit" class="common_btn">Update Profile</button>
                                </div>
                            </div>
                        </form>

                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between mt-5">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Password</h5>
                                <p>Change your account password here.</p>
                            </div>
                        </div>

                        <form action="{{ route('instructor.profile.update', Auth::user()->id) }}" method="POST"
                            class="wsus__dashboard_profile_update">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="update_type" value="password_update">

                            <div class="row mt-3">
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Current Password</label>
                                        <input name="current_password" type="password"
                                            placeholder="Enter current password">
                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>New Password</label>
                                        <input type="password" name="password" placeholder="Enter new password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation"
                                            placeholder="Confirm new password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__dashboard_profile_update_btn">
                                    <button type="submit" class="common_btn">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                    DASHBOARD PROFILE EDIT END
                ============================-->
@endsection

