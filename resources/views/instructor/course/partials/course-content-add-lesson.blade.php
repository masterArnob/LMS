    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
                {{ @$editMode === true ? 'Edit Lesson' : 'Create Lesson' }}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ 
                @$editMode === true ? route('instructor.course-content-chapter-lesson.update') : route('instructor.course-content-chapter-lesson.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Left Side -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" value="{{ @$lesson->title }}" name="title" class="form-control" required>
                            <input type="hidden" name="course_id" value="{{ $course_id }}">
                            <input type="hidden" name="chapter_id" value="{{ $chapter_id }}">
                            <input type="hidden" name="lesson_id" value="{{ @$lesson->id }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" required class="form-control" rows="3">{!! @$lesson->description !!}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <div class="add_course_basic_info_imput">
                                <label for="#">Demo Video Storage <b>(optional)</b></label>
                                <select class="storage form-control" name="demo_video_storage" required>
                                    <option value=""> Please Select </option>
                                    @foreach (config('course.video_sources') as $key => $name)
                                    <option @selected(@$lesson->storage === $key) value="{{ $key }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('demo_video_storage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <div class="add_course_basic_info_imput upload_source {{ @$lesson->storage === 'upload' ? '' : 'd-none' }}">
                                <label for="#">Path</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control source_input" value="{{ @$lesson->file_path }}" type="text"
                                        name="path">
                                </div>

                                @error('path')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="add_course_basic_info_imput external_source {{ @$lesson->storage !== 'upload' ? '' : 'd-none' }}">
                                <label for="#">Path</label>
                                <input type="text" name="url" class="source_input" value="{{ @$lesson->file_path }}">
                            </div>
                        </div>


                    </div>

                    <!-- Right Side -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="volume" class="form-label">Volume</label>
                            <input type="text" name="volume" class="form-control" value="{{ @$lesson->volume }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="number" name="duration" class="form-control" value="{{ @$lesson->duration }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="file_type" class="form-label">File Type</label>
                            <select name="file_type" class="form-select" required>
                                <option value="">Please Select</option>
                                @foreach (config('course.file_types') as $key => $name)
                                    <option @selected(@$lesson->file_type === $key) value="{{ $key }}">{{ $name }}</option>
                                @endforeach
                            </select>
                    
                        </div>

                        <div class="form-group mb-3">
                            <label for="downloadable" class="form-label">Downloadable</label>
                            <select name="downloadable" class="form-control" required>
                                <option @selected(@$lesson->downloadable === 'yes') value="yes">Yes</option>
                                <option @selected(@$lesson->downloadable === 'no') value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="is_preview" class="form-label">Is Preview</label>
                            <select name="is_preview" class="form-control" required>
                                <option @selected(@$lesson->is_preview === 'yes') value="yes">Yes</option>
                                <option @selected(@$lesson->is_preview === 'no') value="no">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Full width submit button -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group text-end mt-3">
                            <button type="submit" class="btn btn-primary">{{ @$editMode ? 'Update' : 'Create' }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
      <script>
           $('#lfm').filemanager('file');
      </script>