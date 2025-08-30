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
                            <h1>Our Courses</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Our Courses</li>
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
            COURSES PAGE START
        ============================-->
    <section class="wsus__courses mt_120 xs_mt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-8 order-2 order-lg-1 wow fadeInLeft">
                    <div class="wsus__sidebar">
                        <form action="{{ route('course.list') }}">
                            <div class="wsus__sidebar_search">
                                <input type="text" placeholder="Search Course" name="search" value="{{ request('search') ?? '' }}" required> 
                                <button type="submit">
                                    <img src="{{ asset('uploads/default-files/search_icon.png') }}" alt="Search" class="img-fluid">
                                </button>
                            </div>
                        </form>

                           
                        <form action="{{ route('course.list') }}" method="GET">
                               <div class="wsus__sidebar_course_lavel">
                                <h3>Categories</h3>

                                @forelse ($categories as $category)
                                      <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                       @checked(request('category') && in_array($category->id, request('category')))  id="category-id-{{ $category->id }}" name="category[]">
                                    <label class="form-check-label" for="category-id-{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                                @empty
                                    No category available
                                @endforelse
                              
                              
                            </div>



                            <div class="wsus__sidebar_course_lavel">
                                <h3>Difficulty Level</h3>
                              
                            @forelse ($levels as $level)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $level->id }}"
                                     @checked(request('level') && in_array($level->id, request('level'))) id="level-id-{{ $level->id }}" name="level[]">
                                    <label class="form-check-label" for="level-id-{{ $level->id }}">
                                        {{ $level->name }}
                                    </label>
                                </div>  
                            @empty
                                No level is available
                            @endforelse
                            </div>

                         

                            <div class="wsus__sidebar_course_lavel duration">
                                <h3>Language</h3>
                            
                             
                                @forelse ($langs as $lang)
                                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $lang->id }}"
                                      @checked(request('lang') && in_array($lang->id, request('lang')))  id="langs-id-{{ $lang->id }}" name="lang[]">
                                    <label class="form-check-label" for="langs-id-{{ $lang->id }}">
                                        {{ $lang->name }}
                                    </label>
                                </div>
                                @empty
                                    No Data Available
                                @endforelse
                            </div>

                        
                            <br>
                            <button type="submit" class="common_btn">Filter</button>

                        </form>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-lg-1">
                   
                    <div class="row">


                        @forelse ($courses as $course)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="wsus__single_courses_3">
                                    <div class="wsus__single_courses_3_img">
                                        <img src="{{ asset($course->thumbnail) }}" alt="Courses" class="img-fluid">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/love_icon_black.png') }}" alt="Love"
                                                        class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/compare_icon_black.png') }}" alt="Compare"
                                                        class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/cart_icon_black_2.png') }}" alt="Cart"
                                                        class="img-fluid">
                                                </a>
                                            </li>
                                        </ul>
                                        <span class="time"><i class="far fa-clock"></i> 15 Hours</span>
                                    </div>
                                    <div class="wsus__single_courses_text_3">
                                        <div class="rating_area">
                                            <!-- <a href="#" class="category">Design</a> -->
                                            <p class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>(4.8 Rating)</span>
                                            </p>
                                        </div>

                                        <a class="title" href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                        <ul>
                                            <li>{{ $course->lessons->count() }} Lessons</li>
                                            <li>38 Student</li>
                                        </ul>
                                        <a class="author" href="#">
                                            <div class="img">
                                                <img src="{{ asset($course->instructor->image) }}" alt="Author" class="img-fluid">
                                            </div>
                                            <h4>{{ $course->instructor->name }}</h4>
                                        </a>
                                    </div>
                                    <div class="wsus__single_courses_3_footer">
                                        <a class="common_btn" href="#">Enroll <i
                                                class="far fa-arrow-right"></i></a>
                                        @if (!empty($course->discount))
                                           <p><del>${{ $course->discount }}</del> ${{ $course->price }}</p>       
                                        @else
                                            <p> ${{$course->price}}</p>
                                        @endif
                                     
                                    </div>
                                </div>
                            </div>
                        @empty
                            No Courses Available
                        @endforelse

                    </div>
                    <div class="wsus__pagination mt_50 wow fadeInUp">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="far fa-arrow-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="far fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
            COURSES PAGE END
        ============================-->
@endsection
