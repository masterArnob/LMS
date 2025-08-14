@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">About Page Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.about-page.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Text Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Content</h3>
                        <div class="row">
                            <!-- Image Upload -->
                     

                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Counter One</label>
                                <input type="text" name="counter_one" value="{{ old('counter_one', @$about->counter_one) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('counter_one')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                               <div class="col-md-6 mb-3">
                                <label class="form-label">Title One</label>
                                <input type="text" name="title_one" value="{{ old('title_one', @$about->title_one) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title_one')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                         

                      
                              <div class="col-md-6 mb-3">
                                <label class="form-label">Counter Two</label>
                                <input type="text" name="counter_two" value="{{ old('counter_two', @$about->counter_two) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('counter_two')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                               <div class="col-md-6 mb-3">
                                <label class="form-label">Title Two</label>
                                <input type="text" name="title_two" value="{{ old('title_two', @$about->title_two) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title_two')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>




                              <div class="col-md-6 mb-3">
                                <label class="form-label">Counter Three</label>
                                <input type="text" name="counter_three" value="{{ old('counter_three', @$about->counter_three) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('counter_three')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                               <div class="col-md-6 mb-3">
                                <label class="form-label">Title Three</label>
                                <input type="text" name="title_three" value="{{ old('title_three', @$about->title_three) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title_three')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                              <div class="col-md-6 mb-3">
                                <label class="form-label">Counter Four</label>
                                <input type="text" name="counter_four" value="{{ old('counter_four', @$about->counter_four) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('counter_four')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                               <div class="col-md-6 mb-3">
                                <label class="form-label">Title Four</label>
                                <input type="text" name="title_four" value="{{ old('title_four', @$about->title_four) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title_four')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">
                          
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection