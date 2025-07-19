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
                    @include('instructor.layout.sidebar')
                </div>
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Courses</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                                <a class="common_btn" href="{{ route('instructor.course.create') }}">+ add course</a>
                            </div>
                        </div>

                        <form action="#" class="wsus__dash_course_searchbox">
                            <div class="input">
                                <input type="text" placeholder="Search our Courses">
                                <button><i class="far fa-search"></i></button>
                            </div>
                            <div class="selector">
                                <select class="select_js">
                                    <option value="">Choose</option>
                                    <option value="">Choose 1</option>
                                    <option value="">Choose 2</option>
                                </select>
                            </div>
                        </form>

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
                                                        STUDENT
                                                    </th>
                                                    <th class="status">
                                                        STATUS
                                                    </th>
                                                    <th class="status">
                                                        APPROVE STATUS
                                                    </th>
                                                    <th class="action">
                                                        ACTION
                                                    </th>
                                                </tr>


                                                @forelse ($courses as $course)
                                                    <tr>
                                                        <td class="image">
                                                            <div class="image_category">
                                                                <img src="{{ asset($course->thumbnail) }}" alt="img"
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
                                                            <a class="title" href="#">{{ $course->title }}</a>

                                                        </td>
                                                        <td class="sale">
                                                            <p>0(not dynamic yet)</p>
                                                        </td>
                                                        <td class="status">
                                                            @if (!empty($course->status))
                                                                @if ($course->status == 'active')
                                                                    <p class=""><span
                                                                            class="badge bg-success text-white">Active</span>
                                                                    </p>
                                                                @elseif ($course->status == 'inactive')
                                                                    <p class=""><span
                                                                            class="badge bg-warning text-white">Inactive</span>
                                                                    </p>
                                                                @elseif ($course->status == 'draft')
                                                                    <p class=""><span
                                                                            class="badge bg-warning text-white">Draft</span>
                                                                    </p>
                                                                @endif
                                                            @else
                                                                No Data Available
                                                            @endif

                                                        </td>
                                                        <td class="status">
                                                            @if ($course->is_approved == 'approved')
                                                                <p class=""><span
                                                                        class="badge bg-success text-white">Approved</span>
                                                                </p>
                                                            @elseif ($course->is_approved == 'pending')
                                                                <p class=""><span
                                                                        class="badge bg-warning text-white">Pending</span>
                                                                </p>
                                                            @elseif ($course->is_approved == 'rejected')
                                                                <p class=""><span
                                                                        class="badge bg-danger text-white">Rejected</span>
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td class="action">
                                                            <a class="edit"
                                                                href="{{ route('instructor.course.edit', ['course_id' => $course->id, 'step' => 1]) }}"><i
                                                                    class="far fa-edit"></i></a>
                                                            <a class="del delete-course"
                                                                data-course-id="{{ $course->id }}" href="javascript:;"><i
                                                                    class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    No Data Available
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="col-xl-12">
                                            @if ($courses->hasPages())
                                                {{ $courses->withQueryString()->links() }}
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
