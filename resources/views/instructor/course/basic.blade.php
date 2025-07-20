@extends('instructor.course.create-master')
@section('course_content_info')
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
      <div class="add_course_basic_info">
          <form class="basic-info-form course-form">
            <input type="hidden" name="current_step" value="1">
            <input type="hidden" name="next_step" value="2">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Title *</label>
                          <input type="text" placeholder="Title" name="title" required>
                          @error('title')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Seo description</label>
                          <input type="text" placeholder="Seo description" name="seo_description">
                          @error('seo_description')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput">
                          <img id="showImage" src="" class="img-fluid rounded border"
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
                              <option value=""> Please Select </option>
                              <option value="upload"> Upload </option>
                              <option value="youtube"> Youtube </option>
                              <option value="vimeo"> Vimeo </option>
                              <option value="external_link"> External Link </option>
                          </select>
                          @error('demo_video_storage')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-6">
                      <div class="add_course_basic_info_imput upload_source">
                          <label for="#">Path</label>
                         
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder"
                                      class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                  </a>
                              </span>
                              <input id="thumbnail" class="form-control source_input" type="text" name="path">
                          </div>
                       
                          @error('path')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="add_course_basic_info_imput external_source d-none">
                          <label for="#">Path</label>
                          <input type="text" name="url" class="source_input">
                      </div>
                  </div>




                  <div class="col-xl-6">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Price *</label>
                          <input type="text" placeholder="Price" name="price" required>
                          <p>Put 0 for free</p>

                          @error('price')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-6">
                      <div class="add_course_basic_info_imput">
                          <label for="#">Discount Price</label>
                          <input type="text" placeholder="Price" name="discount">
                          @error('discount')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-xl-12">
                      <div class="add_course_basic_info_imput mb-0">
                          <label for="#">Description</label>
                            <textarea name="description" class="form-control summernote" rows="5" required>{{ old('description', @$section->description) }}</textarea>
                      
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