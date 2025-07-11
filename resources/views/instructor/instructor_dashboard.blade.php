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
                            <h1>Overview</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Overview</li>
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
        DASHBOARD OVERVIEW START
    ============================-->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    <div class="wsus__dashboard_sidebar">
                        <div class="wsus__dashboard_sidebar_top">
                            <div class="dashboard_banner">
                                <img src="{{ asset('uploads/default-files/single_topic_sidebar_banner.jpg') }}" alt="img" class="img-fluid">
                            </div>
                            <div class="img">
                                <img src="{{ asset(Auth::user()->image) }}" alt="profile" class="img-fluid w-100">
                            </div>
                            <h4>{{ Auth::user()->name }}</h4>
                            <p>Instructor</p>
                        </div>
                        @include('instructor.layout.sidebar')
                    
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 wow fadeInUp">
                            <div class="wsus__dash_earning">
                                <h6>REVENUE</h6>
                                <h3>$2456.34</h3>
                                <p>Earning this month</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 wow fadeInUp">
                            <div class="wsus__dash_earning">
                                <h6>STUDENTS ENROLLMENTS</h6>
                                <h3>16,450</h3>
                                <p>Progress this month</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 wow fadeInUp">
                            <div class="wsus__dash_earning">
                                <h6>COURSES RATING</h6>
                                <h3>4.70</h3>
                                <p>Rating this month</p>
                            </div>
                        </div>
                    </div>

                    <div class="wsus__dashboard_chat_graps">
                        <div class="row">
                            <div class="col-xl-8 wow fadeInRight">
                                <div class="wsus__dashboard_graph">
                                    <h5>Earnings</h5>
                                    <div class="example-two"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 wow fadeInRight">
                                <div class="wsus__dashboard_barfiller">
                                    <h5>Complated Course</h5>
                                    <div class="single_bar">
                                        <p>Java Code</p>
                                        <div id="bar1" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill orrange" data-percentage="75"></span>
                                        </div>
                                    </div>
                                    <div class="single_bar">
                                        <p>Design Basic</p>
                                        <div id="bar2" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill" data-percentage="65"></span>
                                        </div>
                                    </div>
                                    <div class="single_bar">
                                        <p>Team Building</p>
                                        <div id="bar3" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill megenda" data-percentage="55"></span>
                                        </div>
                                    </div>
                                    <div class="single_bar">
                                        <p>Business Marketing</p>
                                        <div id="bar4" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill merun" data-percentage="45"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading wow fadeInUp">
                                <h5>Best Selling Courses</h5>
                            </div>
                        </div>

                        <div class="wsus__dash_course_table wow fadeInUp">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="image">
                                                        COURSES
                                                    </th>
                                                    <th class="details">

                                                    </th>
                                                    <th class="sale">
                                                        SALES
                                                    </th>
                                                    <th class="amount">
                                                        AMOUNT
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="image">
                                                        <div class="image_category">
                                                            <img src="images/courses_3_img_1.jpg" alt="img"
                                                                class="img-fluid w-100">
                                                        </div>
                                                    </td>
                                                    <td class="details">
                                                        <p class="rating">
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                            <span>(5.0)</span>
                                                        </p>
                                                        <a class="title" href="#">Complete Blender Creator Learn
                                                            3D Modelling.</a>

                                                    </td>
                                                    <td class="sale">
                                                        <p>34</p>
                                                    </td>
                                                    <td class="amount">
                                                        <p>$3,145.23</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="image">
                                                        <div class="image_category">
                                                            <img src="images/courses_3_img_2.jpg" alt="img"
                                                                class="img-fluid w-100">
                                                        </div>
                                                    </td>
                                                    <td class="details">
                                                        <p class="rating">
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                            <span>(5.0)</span>
                                                        </p>
                                                        <a class="title" href="#">Complete Blender Creator Learn
                                                            3D Modelling.</a>

                                                    </td>
                                                    <td class="sale">
                                                        <p>34</p>
                                                    </td>
                                                    <td class="amount">
                                                        <p>$3,145.23</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="image">
                                                        <div class="image_category">
                                                            <img src="images/courses_3_img_3.jpg" alt="img"
                                                                class="img-fluid w-100">
                                                        </div>
                                                    </td>
                                                    <td class="details">
                                                        <p class="rating">
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                            <span>(5.0)</span>
                                                        </p>
                                                        <a class="title" href="#">Complete Blender Creator Learn
                                                            3D Modelling.</a>

                                                    </td>
                                                    <td class="sale">
                                                        <p>34</p>
                                                    </td>
                                                    <td class="amount">
                                                        <p>$3,145.23</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
        DASHBOARD OVERVIEW END
    ============================-->


@endsection