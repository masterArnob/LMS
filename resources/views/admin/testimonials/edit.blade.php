@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Testimonials Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Text Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Content</h3>
                        <div class="row">
                            <!-- Image Upload -->
                            <div class="col-md-12 mb-3">
                                   <img id="showImage" src="{{ asset($testimonial->user_image) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image" name="image" class="form-control" id="image">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Rating</label>
                                <select name="rating" id="rating" class="form-select">
                                    <option value="">Select</option>
                                    <option value="1" @selected($testimonial->rating == 1)>1</option>
                                    <option value="2" @selected($testimonial->rating == 1)>2</option>
                                    <option value="3" @selected($testimonial->rating == 3)>3</option>
                                    <option value="4" @selected($testimonial->rating == 4)>4</option>
                                    <option value="5" @selected($testimonial->rating == 5)>5</option>
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                         


                                 <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                             <input type="text" name="name" value="{{ old('user_name', $testimonial->user_name) }}" 
                                       class="form-control" placeholder="e.g. John Doe">
                                @error('user_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                                   <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                             <input type="text" name="title" value="{{ old('title', $testimonial->user_title) }}" 
                                       class="form-control" placeholder="e.g. Software Engineer">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                            

                            <!-- Status Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">Select</option>
                                    <option value="active" @selected($testimonial->status == 'active')>Active</option>
                                    <option value="inactive" @selected($testimonial->status == 'inactive')>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                               <!-- Review Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Review</label>
                                <textarea name="review" class="form-control" rows="5">{{ old('review', $testimonial->review) }}</textarea>
                                @error('review')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">
                          
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection