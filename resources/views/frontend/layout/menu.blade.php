    <nav class="navbar navbar-expand-lg main_menu main_menu_3">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset(config('settings.site_logo')) }}" alt="" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="menu_category">
                <div class="icon">
                    <img src="{{ asset('uploads/default-files/grid_icon.png') }}" alt="Category" class="img-fluid">
                </div>
                Category
                <ul>
                    @php
                         $cats = App\Models\CourseCategory::where('status', 'active')->orderBy('id', 'DESC')->get();
                    @endphp
                    @forelse ($cats as $cat)
                             <li>
                        <a href="#">
                            <span>
                                <img src="{{ $cat->image }}" alt="Category" class="img-fluid">
                            </span>
                            {{ $cat->name }}
                        </a>
               
                    </li>
                    @empty
                        No Data Available
                    @endforelse
               
                 
                  
                </ul>
            </div>
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course.list') }}">Courses</a>
               
                </li>
                {{-- 
                <li class="nav-item">
                    <a class="nav-link" href="#">pages <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a href="category.html">Categories</a></li>
                        <li><a href="cart_view.html">cart view</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="payment.html">payment</a></li>
                        <li><a href="pricing.html">pricing</a></li>
                        <li><a href="student_reviews.html">student review</a></li>
                        <li><a href="instructor.html">Instructor</a></li>
                        <li><a href="instructor_details.html">Instructor details</a></li>
                        <li><a href="instructor_finder.html">Instructor finder</a></li>
                        <li><a href="error.html">error</a></li>
                        <li><a href="faq.html">faq</a></li>
                        <li><a href="sign_in.html">sign in</a></li>
                        <li><a href="sign_up.html">sign up</a></li>
                        <li><a href="forum.html">forum</a></li>
                        <li><a href="forum_categories.html">forum Categories</a></li>
                        <li><a href="forum_create_topic.html">forum create topic</a></li>
                        <li><a href="forum_single_topic.html">forum single topic</a></li>
                        <li><a href="dashboard.html">Dashboard</a></li>
                    </ul>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">blog <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a href="blogs.html">blog grid view</a></li>
                        <li><a href="blog_list.html">blog list view</a></li>
                        <li><a href="blog_details.html">blog details</a></li>
                    </ul>
                </li>
                --}}
              
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact-page') }}">contact us</a>
                </li>


                @php
                    $pages = App\Models\CustomPageBuilder::where('status', 'active')
                        ->where('show_at_nav', 'yes')
                        ->orderBy('id', 'DESC')
                        ->get();
                @endphp

                @forelse ($pages as $page)
                       <li class="nav-item">
                    <a class="nav-link" href="{{ route('page', $page->slug) }}">{{ $page->title }}</a>
                </li>
                @empty
                    
                @endforelse
            </ul>

            <div class="right_menu">
                <div class="menu_search_btn">
                    <img src="{{ asset('frontend/images/search_icon.png') }}" alt="Search" class="img-fluid">
                </div>
                <ul>
                    <li>
                        <a class="menu_signin" href="{{ route('cart.index') }}">
                            <span>
                                <img src="{{ asset('frontend/images/cart_icon_black.png') }}" alt="user" class="img-fluid">
                            </span>
                            <b class="cartCount">{{ cartCount() }}</b>
                        </a>
                    </li>
                    <li>
                        <a class="admin" href="{{ route('login') }}">
                            <span>
                                <img src="{{ asset('frontend/images/user_icon_black.png') }}" alt="user" class="img-fluid">
                            </span>
                            Sign In
                        </a>
                    </li>
                    <li>
                        <a class="common_btn" href="{{ route('register') }}">Sign Up</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="wsus__menu_3_search_area">
        <form action="#">
            <input type="text" placeholder="Search School, Online.....">
            <button class="common_btn" type="submit">Search</button>
            <span class="close_search"><i class="far fa-times"></i></span>
        </form>
    </div>



        <!--============================
        STICKY MENU START
    ==============================-->
    <div class="mobile_menu_area">
        <div class="mobile_menu_area_top">
            <a class="mobile_menu_logo" href="index.html">
                <img src="images/logo.png" alt="EduCore">
            </a>
            <div class="mobile_menu_icon d-block d-lg-none" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <span class="mobile_menu_icon"><i class="far fa-stream menu_icon_bar"></i></span>
            </div>
        </div>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="fal fa-times"></i></button>
            <div class="offcanvas-body">

                <ul class="mobile_menu_header d-flex flex-wrap">
                    <li><a href="{{ route('cart.index') }}"><i class="far fa-shopping-basket"></i> <span>{{ cartCount() }}</span></a>
                    </li>
                    <li><a href="{{ route('login') }}"><i class="far fa-user"></i></a></li>
                </ul>

                <form class="mobile_menu_search">
                    <input type="text" placeholder="Search">
                    <button type="submit"><i class="far fa-search"></i></button>
                </form>

                <div class="mobile_menu_item_area">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">menu</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Categories</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            <ul class="main_mobile_menu">
                                <li class="mobile_dropdown">
                                    <a href="#">home</a>
                                    <ul class="inner_menu">
                                        <li><a class="active" href="index.html">Home style 01</a></li>
                                        <li><a href="index_2.html">Home style 02</a></li>
                                        <li><a href="index_3.html">Home style 03</a></li>
                                        <li><a href="index_4.html">Home style 04</a></li>
                                        <li><a href="index_5_dark.html">Home Dark</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="{{ route('course.list') }}">courses</a>
                                 
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">shop</a>
                                    <ul class="inner_menu">
                                        <li><a href="products.html">product</a></li>
                                        <li><a href="products_2.html">product 2</a></li>
                                        <li><a href="product_details.html">product details</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">pages</a>
                                    <ul class="inner_menu">
                                        <li><a href="">about us</a></li>
                                        <li><a href="category.html">Categories</a></li>
                                        <li><a href="cart_view.html">cart view</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="payment.html">payment</a></li>
                                        <li><a href="pricing.html">pricing</a></li>
                                        <li><a href="student_reviews.html">student review</a></li>
                                        <li><a href="instructor.html">Instructor</a></li>
                                        <li><a href="instructor_details.html">Instructor details</a></li>
                                        <li><a href="instructor_finder.html">Instructor finder</a></li>
                                        <li><a href="error.html">error</a></li>
                                        <li><a href="faq.html">faq</a></li>
                                        <li><a href="{{ route('login') }}">sign in</a></li>
                                        <li><a href="{{ route('register') }}">sign up</a></li>
                                        <li><a href="forum.html">forum</a></li>
                                        <li><a href="forum_categories.html">forum Categories</a></li>
                                        <li><a href="forum_create_topic.html">forum create topic</a></li>
                                        <li><a href="forum_single_topic.html">forum single topic</a></li>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">blog</a>
                                    <ul class="inner_menu">
                                        <li><a href="blogs.html">blog grid view</a></li>
                                        <li><a href="blog_list.html">blog list view</a></li>
                                        <li><a href="blog_details.html">blog details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                            tabindex="0">
                            <ul class="main_mobile_menu">
                                <li class="mobile_dropdown">
                                    <a href="#">
                                        <span>
                                            <img src="images/menu_category_icon_1.png" alt="Category" class="img-fluid">
                                        </span>
                                        Development
                                    </a>
                                    <ul class="inner_menu">
                                        <li><a href="courses_details.html">Web Design</a></li>
                                        <li><a href="courses_details.html">Web Development</a></li>
                                        <li><a href="courses_details.html">UI/UX Design</a></li>
                                        <li><a href="courses_details.html">Graphic Design</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">
                                        <span>
                                            <img src="images/menu_category_icon_2.png" alt="Category" class="img-fluid">
                                        </span>
                                        Business
                                    </a>
                                    <ul class="inner_menu">
                                        <li><a href="courses_details.html">Web Design</a></li>
                                        <li><a href="courses_details.html">Web Development</a></li>
                                        <li><a href="courses_details.html">UI/UX Design</a></li>
                                        <li><a href="courses_details.html">Graphic Design</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">
                                        <span>
                                            <img src="images/menu_category_icon_3.png" alt="Category" class="img-fluid">
                                        </span>
                                        Marketing
                                    </a>
                                    <ul class="inner_menu">
                                        <li><a href="courses_details.html">Web Design</a></li>
                                        <li><a href="courses_details.html">Web Development</a></li>
                                        <li><a href="courses_details.html">UI/UX Design</a></li>
                                        <li><a href="courses_details.html">Graphic Design</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">
                                        <span>
                                            <img src="images/menu_category_icon_4.png" alt="Category" class="img-fluid">
                                        </span>
                                        Lifestyle
                                    </a>
                                    <ul class="inner_menu">
                                        <li><a href="courses_details.html">Web Design</a></li>
                                        <li><a href="courses_details.html">Web Development</a></li>
                                        <li><a href="courses_details.html">UI/UX Design</a></li>
                                        <li><a href="courses_details.html">Graphic Design</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">
                                        <span>
                                            <img src="images/menu_category_icon_5.png" alt="Category" class="img-fluid">
                                        </span>
                                        Health & Fitness
                                    </a>
                                    <ul class="inner_menu">
                                        <li><a href="courses_details.html">Web Design</a></li>
                                        <li><a href="courses_details.html">Web Development</a></li>
                                        <li><a href="courses_details.html">UI/UX Design</a></li>
                                        <li><a href="courses_details.html">Graphic Design</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">
                                        <span>
                                            <img src="images/menu_category_icon_6.png" alt="Category" class="img-fluid">
                                        </span>
                                        Design
                                    </a>
                                    <ul class="inner_menu">
                                        <li><a href="courses_details.html">Web Design</a></li>
                                        <li><a href="courses_details.html">Web Development</a></li>
                                        <li><a href="courses_details.html">UI/UX Design</a></li>
                                        <li><a href="courses_details.html">Graphic Design</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">
                                        <span>
                                            <img src="images/menu_category_icon_7.png" alt="Category" class="img-fluid">
                                        </span>
                                        Academics
                                    </a>
                                    <ul class="inner_menu">
                                        <li><a href="courses_details.html">Web Design</a></li>
                                        <li><a href="courses_details.html">Web Development</a></li>
                                        <li><a href="courses_details.html">UI/UX Design</a></li>
                                        <li><a href="courses_details.html">Graphic Design</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
        STICKY MENU END
    ==============================-->