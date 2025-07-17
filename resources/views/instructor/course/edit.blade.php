@extends('instructor.course.create-master')
@section('course_content_info')
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
      <div class="add_course_basic_info">
          <form class="basic-info-update-form course-form">
            <input type="hidden" name="current_step" value="1">
            <input type="hidden" name="next_step" value="2">
            <input type="hidden" name="course_id" value="{{ $course->id }}">

              <div class="row">
                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Title *</label>
                          <input type="text" placeholder="Title" value="{{ $course->title }}" name="title" required>
                          @error('title')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Seo description</label>
                          <input type="text" placeholder="Seo description" value="{{ $course->seo_description }}" name="seo_description">
                          @error('seo_description')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput">
                          <img id="showImage" src="{{ asset($course->thumbnail) }}" class="img-fluid rounded border"
                              style="max-height: 200px; width: auto;">


                          <label for="#">Thumbnail *</label>
                          <input id="image" type="file" name="thumbnail">
                          @error('thumbnail')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-6">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Demo Video Storage <b>(optional)</b></label>
                          <select class="storage form-control" name="demo_video_storage">
                             
                              <option @selected($course->demo_video_storage == 'upload') value="upload"> Upload </option>
                              <option @selected($course->demo_video_storage == 'youtube') value="youtube"> Youtube </option>
                              <option @selected($course->demo_video_storage == 'vimeo') value="vimeo"> Vimeo </option>
                              <option @selected($course->demo_video_storage == 'external_link') value="external_link"> External Link </option>
                          </select>
                          @error('demo_video_storage')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-6">
                      <div class="add_course_basic_info_imput upload_source {{ $course->demo_video_storage == 'upload' ? '' : 'd-none' }}">
                          <label for="#">Path</label>
                         
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder"
                                      class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                  </a>
                              </span>
                              <input id="thumbnail" value="{{ $course->demo_video_source }}" class="form-control source_input" type="text" name="path">
                          </div>
                       
                          @error('path')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="add_course_basic_info_imput external_source {{ $course->demo_video_storage !== 'upload' ? '' : 'd-none'}}">
                          <label for="#">Path</label>
                          <input type="text" name="url" value="{{ $course->demo_video_source }}" class="source_input">
                      </div>
                  </div>




                  <div class="col-xl-6">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Price *</label>
                          <input type="text" placeholder="Price" value="{{ $course->price }}" name="price" required>
                          <p>Put 0 for free</p>

                          @error('price')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-6">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Discount Price</label>
                          <input type="text" placeholder="Price" value="{{ $course->discount }}" name="discount">
                          @error('discount')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput mb-0">
                          <label for="#">Description</label>
                          <textarea rows="8" placeholder="Description" name="description" required>{!! $course->description !!}</textarea>
                          @error('description')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                          <button type="submit" class="common_btn mt_20">Save</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
@endsection
  @push('scripts')
      <script>
           $('#lfm').filemanager('file');
      </script>
  @endpush