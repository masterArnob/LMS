@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Course Language Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.course-lang.update', $lang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    

                 

                    <!-- Text Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Content</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name', $lang->name) }}" 
                                       class="form-control" placeholder="e.g. Welcome">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                              <select name="status" class="form-select">
                              
                                <option @selected($lang->status == 'active') value="active">Active</option>
                                <option @selected($lang->status == 'inactive') value="inactive">Inactive</option>
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