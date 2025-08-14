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
                            <h1>Courses</h1>
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
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Courses</h5>
                                <p>Manage my courses.</p>
                              
                            </div>
                        </div>

                      

                        <div class="wsus__dash_course_table">
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
                                                        Instructor
                                                    </th>
                                                
                                                 
                                                    <th class="action">
                                                        ACTION
                                                    </th>
                                                </tr>


                                     
                                                @forelse ($myCourses as $course)
                                                    <tr>
                                                        <td class="image">
                                                            <div class="image_category">
                                                                <img src="{{ asset($course->course->thumbnail) }}" alt="img"
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
                                                            <a class="title" href="#">{{ $course->course->title }}</a>

                                                        </td>
                                                   
                                                        <td class="status">
                                                            {{ $course->instructor->name }}

                                                        </td>
                                                    
                                                        <td class="action">
                                                            <a class="edit"
                                                                href="{{ route('student.course-player.index', $course->course->slug) }}"><i
                                                                    class="far fa-play"></i></a>
                                                          
                                                        </td>
                                                    </tr>
                                                @empty
                                                    No Data Available
                                                @endforelse
                                      
                                            </tbody>
                                        </table>
                                        <div class="col-xl-12">
                                     
                                            @if ($myCourses->hasPages())
                                                {{ $myCourses->withQueryString()->links() }}
                                            @endif
                                     
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
    <!--===========================
                        DASHBOARD PROFILE EDIT END
                    ============================-->
@endsection
