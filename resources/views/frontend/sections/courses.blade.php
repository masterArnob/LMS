@if (!empty($latest))
    @php
        $category_one = App\Models\CourseCategory::where('id', $latest->category_one)->first();
        $category_two = App\Models\CourseCategory::where('id', $latest->category_two)->first();
        $category_three = App\Models\CourseCategory::where('id', $latest->category_three)->first();
        $category_four = App\Models\CourseCategory::where('id', $latest->category_four)->first();
        $category_five = App\Models\CourseCategory::where('id', $latest->category_five)->first();
    @endphp
    <section class="wsus__courses_3 pt_120 xs_pt_100 mt_120 xs_mt_90 pb_120 xs_pb_100">
        <div class="container">

            <div class="row">
                <div class="col-xl-6 m-auto wow fadeInUp">
                    <div class="wsus__section_heading mb_45">
                        <h5>Featured Courses</h5>
                        <h2>Latest Bundle Courses.</h2>
                    </div>
                </div>
            </div>

            <div class="row wow fadeInUp">
                <div class="col-xxl-6 col-xl-8 m-auto">
                    <div class="wsus__filter_area mb_15">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">

                            {{-- 
                               <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">All Courses</button>
                            </li>
                            --}}
                            @if (!empty($category_one))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-{{ $category_one->id }}-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-{{ $category_one->id }}"
                                        type="button" role="tab" aria-controls="pills-{{ $category_one->id }}"
                                        aria-selected="true">{{ $category_one->name }}</button>
                                </li>
                            @endif


                            @if (!empty($category_two))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pills-{{ $category_two->id }}-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-{{ $category_two->id }}"
                                        type="button" role="tab" aria-controls="pills-{{ $category_two->id }}"
                                        aria-selected="true">{{ $category_two->name }}</button>
                                </li>
                            @endif


                            @if (!empty($category_three))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pills-{{ $category_three->id }}-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-{{ $category_three->id }}"
                                        type="button" role="tab" aria-controls="pills-{{ $category_three->id }}"
                                        aria-selected="true">{{ $category_three->name }}</button>
                                </li>
                            @endif



                            @if (!empty($category_four))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pills-{{ $category_four->id }}-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-{{ $category_four->id }}"
                                        type="button" role="tab" aria-controls="pills-{{ $category_four->id }}"
                                        aria-selected="true">{{ $category_four->name }}</button>
                                </li>
                            @endif



                            @if (!empty($category_five))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pills-{{ $category_five->id }}-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-{{ $category_five->id }}"
                                        type="button" role="tab" aria-controls="pills-{{ $category_five->id }}"
                                        aria-selected="true">{{ $category_five->name }}</button>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-{{ $category_one->id }}" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">

                    <div class="row">
                        @forelse ($category_one->courses()->orderBy('created_at', 'DESC')->take(8)->get() as $course)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="wsus__single_courses_3">
                                    <div class="wsus__single_courses_3_img">
                                        <img src="{{ asset($course->thumbnail) }}" alt="Courses" class="img-fluid">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/love_icon_black.png') }}"
                                                        alt="Love" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/compare_icon_black.png') }}"
                                                        alt="Compare" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/cart_icon_black_2.png') }}"
                                                        alt="Cart" class="img-fluid">
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

                                        <a class="title"
                                            href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                        <ul>
                                            <li>{{ $course->lessons->count() }} Lessons</li>
                                            <li>38 Student</li>
                                        </ul>
                                        <a class="author" href="#">
                                            <div class="img">
                                                <img src="{{ asset($course->instructor->image) }}" alt="Author"
                                                    class="img-fluid">
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
                                            <p> ${{ $course->price }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            No Courses Available
                        @endforelse

                    </div>
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="{{ route('course.list') }}">Browse More Courses <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" id="pills-{{ $category_two->id }}" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">

                    <div class="row">
                        @forelse ($category_two->courses()->orderBy('created_at', 'DESC')->take(8)->get() as $course)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="wsus__single_courses_3">
                                    <div class="wsus__single_courses_3_img">
                                        <img src="{{ asset($course->thumbnail) }}" alt="Courses" class="img-fluid">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/love_icon_black.png') }}"
                                                        alt="Love" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/compare_icon_black.png') }}"
                                                        alt="Compare" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/cart_icon_black_2.png') }}"
                                                        alt="Cart" class="img-fluid">
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

                                        <a class="title"
                                            href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                        <ul>
                                            <li>{{ $course->lessons->count() }} Lessons</li>
                                            <li>38 Student</li>
                                        </ul>
                                        <a class="author" href="#">
                                            <div class="img">
                                                <img src="{{ asset($course->instructor->image) }}" alt="Author"
                                                    class="img-fluid">
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
                                            <p> ${{ $course->price }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            No Courses Available
                        @endforelse

                    </div>
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="{{ route('course.list') }}">Browse More Courses <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>




                  <div class="tab-pane fade" id="pills-{{ $category_three->id }}" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">

                    <div class="row">
                        @forelse ($category_three->courses()->orderBy('created_at', 'DESC')->take(8)->get() as $course)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="wsus__single_courses_3">
                                    <div class="wsus__single_courses_3_img">
                                        <img src="{{ asset($course->thumbnail) }}" alt="Courses" class="img-fluid">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/love_icon_black.png') }}"
                                                        alt="Love" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/compare_icon_black.png') }}"
                                                        alt="Compare" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/cart_icon_black_2.png') }}"
                                                        alt="Cart" class="img-fluid">
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

                                        <a class="title"
                                            href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                        <ul>
                                            <li>{{ $course->lessons->count() }} Lessons</li>
                                            <li>38 Student</li>
                                        </ul>
                                        <a class="author" href="#">
                                            <div class="img">
                                                <img src="{{ asset($course->instructor->image) }}" alt="Author"
                                                    class="img-fluid">
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
                                            <p> ${{ $course->price }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            No Courses Available
                        @endforelse

                    </div>
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="{{ route('course.list') }}">Browse More Courses <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>


                  <div class="tab-pane fade" id="pills-{{ $category_four->id }}" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">

                    <div class="row">
                        @forelse ($category_four->courses()->orderBy('created_at', 'DESC')->take(8)->get() as $course)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="wsus__single_courses_3">
                                    <div class="wsus__single_courses_3_img">
                                        <img src="{{ asset($course->thumbnail) }}" alt="Courses" class="img-fluid">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/love_icon_black.png') }}"
                                                        alt="Love" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/compare_icon_black.png') }}"
                                                        alt="Compare" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/cart_icon_black_2.png') }}"
                                                        alt="Cart" class="img-fluid">
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

                                        <a class="title"
                                            href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                        <ul>
                                            <li>{{ $course->lessons->count() }} Lessons</li>
                                            <li>38 Student</li>
                                        </ul>
                                        <a class="author" href="#">
                                            <div class="img">
                                                <img src="{{ asset($course->instructor->image) }}" alt="Author"
                                                    class="img-fluid">
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
                                            <p> ${{ $course->price }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            No Courses Available
                        @endforelse

                    </div>
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="{{ route('course.list') }}">Browse More Courses <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>




                  <div class="tab-pane fade" id="pills-{{ $category_five->id }}" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">

                    <div class="row">
                        @forelse ($category_five->courses()->orderBy('created_at', 'DESC')->take(8)->get() as $course)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="wsus__single_courses_3">
                                    <div class="wsus__single_courses_3_img">
                                        <img src="{{ asset($course->thumbnail) }}" alt="Courses" class="img-fluid">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/love_icon_black.png') }}"
                                                        alt="Love" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/compare_icon_black.png') }}"
                                                        alt="Compare" class="img-fluid">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/default-files/cart_icon_black_2.png') }}"
                                                        alt="Cart" class="img-fluid">
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

                                        <a class="title"
                                            href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                        <ul>
                                            <li>{{ $course->lessons->count() }} Lessons</li>
                                            <li>38 Student</li>
                                        </ul>
                                        <a class="author" href="#">
                                            <div class="img">
                                                <img src="{{ asset($course->instructor->image) }}" alt="Author"
                                                    class="img-fluid">
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
                                            <p> ${{ $course->price }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            No Courses Available
                        @endforelse

                    </div>
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="{{ route('course.list') }}">Browse More Courses <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@else
    please select latest course from admin panel
@endif
