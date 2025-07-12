@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Course Sub Category Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.sub-category.update', $subCat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Text Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Content</h3>
                        <div class="row">
                            <!-- Image Upload -->
                         
                                 <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select name="course_category_id" class="form-select">
                                  
                                  @forelse ($cats as $cat)
                                      <option @selected($subCat->course_category_id == $cat->id) value="{{$cat->id}}">{{$cat->name}}</option>
                                  @empty
                                  No Data Available                                      
                                  @endforelse
                                 
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name', $subCat->name) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                      

                            <!-- Status Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">Select</option>
                                    <option value="active" @selected($subCat->status == 'active')>Active</option>
                                    <option value="inactive" @selected($subCat->status == 'inactive')>Inactive</option>
                                </select>
                                @error('status')
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