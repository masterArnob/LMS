@extends('instructor.course.create-master')
@section('course_content_info')
    <div class="dashboard_add_course_finish">
        <form class="more_info_form course-form">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input type="hidden" name="current_step" value="4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="add_course_more_info_input">
                        <label for="#">Message for Reviewer</label>
                        <textarea rows="7" name="message_for_reviewer" placeholder="Message for Reviewer">{{ @$course->message_for_reviewer }}</textarea>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="add_course_more_info_input mb-0">
                        <label for="#">Status *</label>
                        <select class="select_2" name="status">
                            <option value=""> Please Select </option>
                            <option @selected(@$course->status == 'active') value="active">Active</option>
                            <option @selected(@$course->status == 'inactive') value="inactive">Inactive</option>
                            <option @selected(@$course->status == 'draft') value="draft">Draft</option>
                        </select>
                        <button type="submit" class="common_btn mt_25">save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
