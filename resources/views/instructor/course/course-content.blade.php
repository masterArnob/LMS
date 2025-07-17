@extends('instructor.course.create-master')
@section('course_content_info')
    <div class="add_course_content">
        <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between">
            <a class="common_btn dynamic-modal-btn" data-id="{{ $course->id }}" href="#">Add New Chapter</a>
            <a class="common_btn" href="#">Short Chapter</a>
        </div>
        <div class="accordion" id="accordionExample">
            <form class="more_info_form course-form">
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <input type="hidden" name="current_step" value="3">
                <input type="hidden" name="next_step" value="4">
            </form>

            @forelse ($chapters as $chapter)
                 <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $chapter->id }}"
                        aria-expanded="true" aria-controls="collapse-{{ $chapter->id }}">
                        <span>{{ $chapter->title }}</span>
                    </button>
                    <div class="add_course_content_action_btn">
                        <div class="dropdown">
                            <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="far fa-plus"></i>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Add Lesson</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Add Document</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Add Quiz</a></li>
                            </ul>
                        </div>
                        <a class="edit" href="#"><i class="far fa-edit"></i></a>
                        <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </h2>
                <div id="collapse-{{ $chapter->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="item_list">
                            <li>
                                <span>Aut autem dolorem debitis mollitia.</span>
                                <div class="add_course_content_action_btn">
                                    <a class="edit" href="#"><i class="far fa-edit"></i></a>
                                    <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                    <a class="arrow" href="#"><i class="fas fa-arrows-alt"></i></a>
                                </div>
                            </li>
                            <li>
                                <span>Aut autem dolorem debitis mollitia.</span>
                                <div class="add_course_content_action_btn">
                                    <a class="edit" href="#"><i class="far fa-edit"></i></a>
                                    <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                    <a class="arrow" href="#"><i class="fas fa-arrows-alt"></i></a>
                                </div>
                            </li>
                            <li>
                                <span>Aut autem dolorem debitis mollitia.</span>
                                <div class="add_course_content_action_btn">
                                    <a class="edit" href="#"><i class="far fa-edit"></i></a>
                                    <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                    <a class="arrow" href="#"><i class="fas fa-arrows-alt"></i></a>
                                </div>
                            </li>
                            <li>
                                <span>Aut autem dolorem debitis mollitia.</span>
                                <div class="add_course_content_action_btn">
                                    <a class="edit" href="#"><i class="far fa-edit"></i></a>
                                    <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                    <a class="arrow" href="#"><i class="fas fa-arrows-alt"></i></a>
                                </div>
                            </li>
                            <li>
                                <span>Aut autem dolorem debitis mollitia.</span>
                                <div class="add_course_content_action_btn">
                                    <a class="edit" href="#"><i class="far fa-edit"></i></a>
                                    <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                    <a class="arrow" href="#"><i class="fas fa-arrows-alt"></i></a>
                                </div>
                            </li>
                        </ul>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <span>Accordion Item #1</span>
                                    </button>
                                    <div class="add_course_content_action_btn">
                                        <div class="dropdown">
                                            <div class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="far fa-plus"></i>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Add Lesson</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Add Document</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Add Quiz</a></li>
                                            </ul>
                                        </div>
                                        <a class="edit" href="#"><i class="far fa-edit"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for
                                        this accordion, which is intended to demonstrate
                                        the <code>.accordion-flush</code> class. This is
                                        the first item's accordion body.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            No Data Available                
            @endforelse
           
       
        </div>
    </div>


@endsection
