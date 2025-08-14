@extends('student.my-courses.course-player.layout.master')
@section('course-content')
        <section class="wsus__course_video">
        <div class="col-12">
            <div class="wsus__course_header">
                <a href="{{ route('student.my-courses.index') }}"><i class="fas fa-angle-left"></i> {{ $course->title }}</a>
                <p>Your Progress: 20 of 15 (75%)</p>
            </div>
        </div>

        <div class="wsus__course_video_player">

            <!-- <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
                poster="images/video_thumb.jpg" data-setup="{}">
                <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" />
                <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/webm" />
            </video> -->

            <video id="vid1" class="video-js vjs-default-skin" controls autoplay width="640" height="264"
                data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://youtu.be/fsSN6jDtJdY?si=E5_FJf6kT2d679GO"}] }'>
            </video>

            <div class="video_tabs_area">
                <ul class="nav nav-pills" id="pills-tab2" role="tablist">
                    <li class="nav-item d-lg-none" role="presentation">
                        <button class="nav-link" id="pills-home-tab2" data-bs-toggle="pill"
                            data-bs-target="#pills-home2" type="button" role="tab" aria-controls="pills-home2"
                            aria-selected="true">Course Content</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Q&A</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Announcements</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
                            aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade d-lg-none" id="pills-home2" role="tabpanel"
                        aria-labelledby="pills-home-tab2" tabindex="0">
                        <div class="video_course_content">
                            <div class="wsus__course_sidebar">
                                <h2 class="video_heading">Course Content</h2>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne4409" aria-expanded="true"
                                                aria-controls="collapseOne4409">
                                                <b>Introduction</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseOne4409" class="accordion-collapse collapse show"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo2209"
                                                aria-expanded="false" aria-controls="collapseTwo2209">
                                                <b>Project Setup and Multi Auth Setup</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo2209" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree1109"
                                                aria-expanded="false" aria-controls="collapseThree1109">
                                                <b>Admin Panel Setup and Mastering</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree1109" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree109"
                                                aria-expanded="false" aria-controls="collapseThree109">
                                                <b>Frontend Template Setup and Mastering</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree109" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree209"
                                                aria-expanded="false" aria-controls="collapseThree209">
                                                <b>Project Road Map Planning</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree209" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree309"
                                                aria-expanded="false" aria-controls="collapseThree309">
                                                <b>Company Profile Setup</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree309" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree409"
                                                aria-expanded="false" aria-controls="collapseThree409">
                                                <b>Source and Database</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree409" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree509"
                                                aria-expanded="false" aria-controls="collapseThree509">
                                                <b>Congratulations! You did it!</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree509" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo609"
                                                aria-expanded="false" aria-controls="collapseTwo609">
                                                <b>Project Setup and Multi Auth Setup</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo609" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree709"
                                                aria-expanded="false" aria-controls="collapseThree709">
                                                <b>Admin Panel Setup and Mastering</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree709" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree809"
                                                aria-expanded="false" aria-controls="collapseThree809">
                                                <b>Frontend Template Setup and Mastering</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree809" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree909"
                                                aria-expanded="false" aria-controls="collapseThree909">
                                                <b>Project Road Map Planning</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree909" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree1009"
                                                aria-expanded="false" aria-controls="collapseThree1009">
                                                <b>Company Profile Setup</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree1009" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree1109"
                                                aria-expanded="false" aria-controls="collapseThree1109">
                                                <b>Source and Database</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree1109" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree1209"
                                                aria-expanded="false" aria-controls="collapseThree1209">
                                                <b>Congratulations! You did it!</b>
                                                <span>5/5</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree1209" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        1_Setting up Environment (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        2_Environment Setup for Project (Part - 1)
                                                        <span>
                                                            <img src="images/video_icon_black_2.png" alt="video"
                                                                class="img-fluid">
                                                            06.03
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fas fa-folder-open"></i> Resources
                                                    </button>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Resources File 01</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 02</a></li>
                                                        <li><a class="dropdown-item" href="#">Resources 03</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="video_about">
                            <h1>About this course</h1>
                            <p class="short_description">In this course, you will learn the complete Laravel 9 from
                                scratch - This course is for
                                beginner to advanced</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p>By the numbers</p>
                                            </td>
                                            <td>
                                                <p>Skill level: All Levels </p>
                                                <p>Students: 53</p>
                                                <p>Languages: English</p>
                                                <p>Captions: Yes</p>
                                            </td>
                                            <td>
                                                <p>Lectures: 44</p>
                                                <p>Video: 6.5 total hours</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Certificates</p>
                                            </td>
                                            <td>
                                                <p>Get Udemy certificate by completing entire course </p>
                                                <a class="table_btn" href="#">SkillGro certificate</a>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Features</p>
                                            </td>
                                            <td>
                                                <p> Available on
                                                    <a href="#">iOS</a>
                                                    and
                                                    <a href="#">Android</a>
                                                </p>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Description</p>
                                            </td>
                                            <td>
                                                <p>You know the latest laravel version is now Laravel 9. So we have
                                                    created a very complete course on Laravel 9.</p>
                                                <p>If you are new to Laravel or beginner to Laravel, you will be able to
                                                    learn it in advanced level from this course.</p>
                                                <p><b>Here we have taught the students:</b></p>
                                                <ul>
                                                    <li>Composer - Installing composer in local machine.</li>
                                                    <li>MVC (Model, View, Controller) - How it works and details. </li>
                                                    <li>Laravel 9 Installation - Installation process,</li>
                                                    <li>Route - Basic route, route parameter, route group</li>
                                                    <li>Middleware - How it works, types of middleware</li>
                                                    <li>Controller - Basic controller, partial and resource</li>
                                                    <li>View - view features (extends, include, yield, section)</li>
                                                </ul>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="video_qna">

                            <div class="qna_list_area">
                                <div class="video_qna_top d-flex flex-wrap">
                                    <form action="#">
                                        <input type="text" placeholder="Search...">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <p>Filters:</p>
                                            <div class="select_box">
                                                <select>
                                                    <option selected>All lectures</option>
                                                    <option value="1">Current lecture</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Sort by:</p>
                                            <div class="select_box">
                                                <select>
                                                    <option selected>Dhort by recommanded</option>
                                                    <option value="1">Sort by most recent</option>
                                                    <option value="2">Sort by most upvoted</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="video_qna_list">
                                    <h3>All questions in this course (14)</h3>
                                    <div class="video_qna_list_item">
                                        <div class="img">
                                            <img src="images/testimonial_user_1.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <a class="qna_title" href="#">mailtrap.io doe not send email verifications
                                                directly to the user's
                                                email?</a>
                                            <p>Hi, how do I make mailtrap.io send the email verification directly to the
                                                user's email?</p>
                                            <ul>
                                                <li><a href="#">Landry</a></li>
                                                <li><a href="#">Lecture 40</a></li>
                                                <li>1 year ago</li>
                                            </ul>
                                            <span>07 <i class="fas fa-comment"></i></span>
                                        </div>
                                    </div>
                                    <div class="video_qna_list_item">
                                        <div class="img">
                                            <img src="images/testimonial_user_2.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <a class="qna_title" href="#">mailtrap.io doe not send email verifications
                                                directly to the user's
                                                email?</a>
                                            <p>Hi, how do I make mailtrap.io send the email verification directly to the
                                                user's email?</p>
                                            <ul>
                                                <li><a href="#">Landry</a></li>
                                                <li><a href="#">Lecture 40</a></li>
                                                <li>1 year ago</li>
                                            </ul>
                                            <span>07 <i class="fas fa-comment"></i></span>
                                        </div>
                                    </div>
                                    <div class="video_qna_list_item">
                                        <div class="img">
                                            <img src="images/testimonial_user_3.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <a class="qna_title" href="#">mailtrap.io doe not send email verifications
                                                directly to the user's
                                                email?</a>
                                            <p>Hi, how do I make mailtrap.io send the email verification directly to the
                                                user's email?</p>
                                            <ul>
                                                <li><a href="#">Landry</a></li>
                                                <li><a href="#">Lecture 40</a></li>
                                                <li>1 year ago</li>
                                            </ul>
                                            <span>07 <i class="fas fa-comment"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="qna_details_area">

                                <a href="#" class="btn arrow-btn back_qna_list">Back to All Questions</a>

                                <div class="video_qna_list_item">
                                    <div class="img">
                                        <img src="images/review-author.png" alt="img">
                                    </div>
                                    <div class="text">
                                        <a class="qna_title" href="#">mailtrap.io doe not send email verifications
                                            directly to the user's
                                            email?</a>
                                        <p>Hi, how do I make mailtrap.io send the email verification directly to the
                                            user's email?</p>
                                        <ul>
                                            <li><a href="#">Landry</a></li>
                                            <li><a href="#">Lecture 40</a></li>
                                            <li>1 year ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <h4>5 replies</h4>
                                    <a class="flow" href="#">Follow replies</a>
                                </div>

                                <div class="qns_details_list_item video_qna_list_item">
                                    <div class="img">
                                        <img src="images/review-author.png" alt="img">
                                    </div>
                                    <div class="text">
                                        <a class="qna_title" href="#">Smith jhon</a>
                                        <span>6 month ago</span>
                                        <p>Thank you for the insight. Please tell me how to implement direct-to-user
                                            mail verification.</p>
                                        <div class="dot">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <ul>
                                                <li><a href="#">link 1</a></li>
                                                <li><a href="#">link 2</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="qns_details_list_item video_qna_list_item">
                                    <div class="img">
                                        <img src="images/review-author.png" alt="img">
                                    </div>
                                    <div class="text">
                                        <a class="qna_title" href="#">Smith jhon</a>
                                        <span>6 month ago</span>
                                        <p>Thank you for the insight. Please tell me how to implement direct-to-user
                                            mail verification.</p>
                                        <div class="dot">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <ul>
                                                <li><a href="#">link 1</a></li>
                                                <li><a href="#">link 2</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="qns_details_list_item video_qna_list_item">
                                    <div class="img">
                                        <img src="images/review-author.png" alt="img">
                                    </div>
                                    <div class="text">
                                        <a class="qna_title" href="#">Smith jhon</a>
                                        <span>6 month ago</span>
                                        <p>Thank you for the insight. Please tell me how to implement direct-to-user
                                            mail verification.</p>
                                        <div class="dot">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <ul>
                                                <li><a href="#">link 1</a></li>
                                                <li><a href="#">link 2</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="qna_details_reply">
                                    <form action="#">
                                        <textarea rows="5" placeholder="Add reply"></textarea>
                                    </form>
                                    <button type="submit" class="btn arrow-btn">submit</button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="video_announcement">
                            <h1>No announcements posted yet</h1>
                            <p>The instructor hasn’t added any announcements to this course yet. Announcements are used
                                to inform you of updates or additions to the course.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                        tabindex="0">
                        <div class="video_review">
                            <h2>Reviews (09)</h2>
                            <div class="course-review-head">
                                <div class="review-author-thumb">
                                    <img src="images/review-author.png" alt="img">
                                </div>
                                <div class="review-author-content">
                                    <div class="author-name">
                                        <h5 class="name">Jura Hujaor <span>2 Days ago</span></h5>
                                        <div class="author-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <h4 class="title">The best LMS Design System</h4>
                                    <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis
                                        semper bibendum nisi porta, malesuada risus nonerviverra dolor. Vestibulum ante
                                        ipsum primis in faucibus.</p>
                                </div>
                            </div>
                            <div class="course-review-head">
                                <div class="review-author-thumb">
                                    <img src="images/review-author.png" alt="img">
                                </div>
                                <div class="review-author-content">
                                    <div class="author-name">
                                        <h5 class="name">Jura Hujaor <span>2 Days ago</span></h5>
                                        <div class="author-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <h4 class="title">The best LMS Design System</h4>
                                    <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis
                                        semper bibendum nisi porta, malesuada risus nonerviverra dolor. Vestibulum ante
                                        ipsum primis in faucibus.</p>
                                </div>
                            </div>
                            <div class="course-review-head">
                                <div class="review-author-thumb">
                                    <img src="images/review-author.png" alt="img">
                                </div>
                                <div class="review-author-content">
                                    <div class="author-name">
                                        <h5 class="name">Jura Hujaor <span>2 Days ago</span></h5>
                                        <div class="author-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <h4 class="title">The best LMS Design System</h4>
                                    <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis
                                        semper bibendum nisi porta, malesuada risus nonerviverra dolor. Vestibulum ante
                                        ipsum primis in faucibus.</p>
                                </div>
                            </div>


                            <div class="video_review_imput">
                                <h2>Write a reviews</h2>
                                <p>
                                    <span>select rating:</span>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </p>
                                <form action="#">
                                    <textarea name="" id="" cols="30" rows="5" placeholder="Youe coment..."></textarea>
                                    <button type="submit" class="btn arrow-btn back_qna_list">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        @include('student.my-courses.course-player.layout.sidebar')
       
    </section>
@endsection