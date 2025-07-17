    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('instructor.course-content-chapter.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="" class="form-label">Chapter Title</label>
                <input type="text" name="title" class="form-control" required>
                <input type="hidden" name="course_id" value="{{ $course->id }}">
            </div>
            <div class="form-group text-end mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>