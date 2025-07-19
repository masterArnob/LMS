@extends('instructor.course.create-master')
@section('course_content_info')
       <form class="more_info_form course-form">
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <input type="hidden" name="current_step" value="3">
                <input type="hidden" name="next_step" value="4">
            </form>
            
    <div class="add_course_content">
        <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between">
            <a class="common_btn dynamic-modal-btn" data-id="{{ $course->id }}" href="#">Add New Chapter</a>
           {{--  <a class="common_btn" href="#">Short Chapter</a> --}}
        </div>
        <div class="accordion" id="accordionExample">
     

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
                                <li><a data-course-id="{{ $course->id }}" data-chapter-id="{{ $chapter->id }}" class="add-lesson-btn dropdown-item" href="javascript:;">Add Lesson</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Add Document</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Add Quiz</a></li>
                            </ul>
                        </div>
                        <a class="edit edit-chapter-btn" data-course-id="{{ $course->id }}" data-chapter-id="{{ $chapter->id }}" href="javascript:;"><i class="far fa-edit"></i></a>
                        <a class="del delte-chapter-item" data-course-id="{{ $course->id }}" data-chapter-id="{{ $chapter->id }}" href="javascript:;"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </h2>
                <div id="collapse-{{ $chapter->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="item_list">
                   
                       
                            @forelse ($chapter->lessons as $lesson)
                                   <li>
                                <span>{{ $lesson->title }}</span>
                                <div class="add_course_content_action_btn">
                                    <a class="edit edit-lesson-btn" data-lesson-id="{{ $lesson->id }}" data-course-id="{{ $course->id }}" data-chapter-id="{{ $chapter->id }}" href="javascript:;"><i class="far fa-edit"></i></a>
                                    <a class="del delete-item"  data-lesson-id="{{ $lesson->id }}" data-course-id="{{ $course->id }}" data-chapter-id="{{ $chapter->id }}" href="javascript:;"><i class="fas fa-trash-alt"></i></a>
                             
                                </div>
                            </li>
                            @empty
                                No Data Available
                            @endforelse
                    
                         
                          
                        </ul>
                  
                    </div>
                </div>
            </div>
            @empty
            No Data Available                
            @endforelse
           
       
        </div>
    </div>


@endsection
  @push('scripts')
      <script>
           $('#lfm').filemanager('file');
      </script>
  @endpush