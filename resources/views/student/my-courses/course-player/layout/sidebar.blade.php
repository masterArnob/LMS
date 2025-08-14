 <div class="wsus__course_sidebar d-none d-lg-block">
     <h2 class="video_heading">Course Content</h2>


     <div class="accordion" id="accordionExample">
         @forelse ($course->chapters as $chapter)
             <div class="accordion-item">
                 <h2 class="accordion-header">
                     <button class="accordion-button" type="button" data-bs-toggle="collapse"
                         data-bs-target="#collapse-{{ $chapter->id }}" aria-expanded="true"
                         aria-controls="collapse-{{ $chapter->id }}">
                         <b>{{ $chapter->title }}</b>
                         <span>5/5</span>
                     </button>
                 </h2>
                 <div id="collapse-{{ $chapter->id }}" class="accordion-collapse collapse"
                     data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        @forelse ($chapter->lessons as $lesson)
                             <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="">
                             <label class="form-check-label">
                                 {{ $lesson->title }}
                                 <span>
                                     <img src="{{ asset('uploads/default-files/video_icon_black_2.png') }}" alt="video" class="img-fluid">
                                   {{ convertMinutesToHours($lesson->duration) }}
                                 </span>
                             </label>
                         </div>
                        @empty
                            No Data Available
                        @endforelse
                        
                      
                       {{-- 

                          <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="">
                             <label class="form-check-label">
                                 2_Environment Setup for Project (Part - 1)
                                 <span>
                                     <img src="images/video_icon_black_2.png" alt="video" class="img-fluid">
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
                       --}}
                     </div>
                 </div>
             </div>
         @empty
             No Data Available
         @endforelse
     </div>


 </div>
