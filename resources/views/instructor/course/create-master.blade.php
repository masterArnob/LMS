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
                            <h1>Instructor Dashboard</h1>
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
                    @include('instructor.layout.sidebar')
                </div>
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Add Courses</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                            </div>
                        </div>

                        <div class="dashboard_add_courses">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="" class="nav-link course-tab {{ request('step') == 1 ? 'active' : '' }}">Basic Infos</a>
                                </li>

                                  <li class="nav-item" role="presentation">
                                    <a href="" class="nav-link course-tab {{ request('step') == 2 ? 'active' : '' }}">More Infos</a>
                                </li>


                                  <li class="nav-item" role="presentation">
                                    <a href="" class="nav-link course-tab {{ request('step') == 3 ? 'active' : '' }}">Course Contents</a>
                                </li>


                                  <li class="nav-item" role="presentation">
                                    <a href="" class="nav-link course-tab {{ request('step') == 4 ? 'active' : '' }}">Finish</a>
                                </li>

                          
                            </ul>





                            <div class="tab-content" id="pills-tabContent">
                              
                              
                                @yield('course_content_info')
                        
                            {{-- 
                            
                                  @include('instructor.course.parts.basic-info-section')


                                @include('instructor.course.parts.more-info-section')


                                @include('instructor.course.parts.course-content-section')



                                @include('instructor.course.parts.finish-section')
                            --}}
                    




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                        DASHBOARD PROFILE EDIT END
                    ============================-->
@endsection
