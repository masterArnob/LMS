@extends('instructor.course.create-master')
@section('course_content_info')
    <div class="add_course_more_info">
        <form class="more_info_form">
            <input type="hidden" name="current_step" value="2">
            <input type="hidden" name="next_step" value="3">
            <div class="row">
                <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                        <label for="#">Capacity</label>
                        <input type="number" name="capacity" placeholder="Capacity">
                        <p>leave blank for unlimited</p>
                        @error('capacity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                        <label for="#">Course Duration (Minutes)*</label>
                        <input type="number" name="duration" placeholder="300">
                         @error('duration')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="add_course_more_info_checkbox">
                        <div class="form-check">
                            <input class="form-check-input" name="qna" type="checkbox" value="1" id="qna-check">
                            <label class="form-check-label" for="qna-check">Q&A</label>
                            @error('qna')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="certificate" value="1" id="certificate-check">
                            <label class="form-check-label" for="certificate-check">Completion Certificate</label>
                            @error('certificate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                     
                   
                    </div>
                </div>
                <div class="col-12">
                    <div class="add_course_more_info_input">
                        <label for="#">Category *</label>
                        <select class="form-select" name="category_id">
                            <option value=""> Please Select </option>
                            @forelse ($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @empty
                                <option value="">No Data Available</option>
                            @endforelse
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                          
                        </select>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                        <h3>Level</h3>
                        @forelse ($levels as $level)
                            <div class="form-check">
                            <input class="form-check-input" value="{{ $level->id }}" type="radio" name="level_id" id="level-id-{{ $level->id }}"
                                >

                           
                            <label class="form-check-label" for="level-id-{{ $level->id }}">
                                {{ $level->name }}
                            </label>


                                @error('level_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        @empty
                            No Data Available
                        @endforelse
                      
                
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                        <h3>Language</h3>
                     
                    
                        @forelse ($langs as $lang)
                               <div class="form-check">
                            <input class="form-check-input" type="radio" value="{{ $lang->id }}" name="language_id" id="lang-id-{{ $lang->id }}"
                                >
                            <label class="form-check-label" for="lang-id-{{ $lang->id }}">
                                {{ $lang->name }}
                            </label>


                                  @error('language_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        @empty
                            No Data Available
                        @endforelse

                    </div>
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="common_btn">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
