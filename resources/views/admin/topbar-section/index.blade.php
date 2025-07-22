@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Topbar Section</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.topbar-section.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
             

                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Text & Stats</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email', @$section->email) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone', @$section->phone) }}" 
                                       class="form-control" placeholder="e.g. 5000+">
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Offer Name</label>
                                <input type="text" name="offer_name" value="{{ old('offer_name', @$section->offer_name) }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('offer_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                               <div class="col-md-6 mb-3">
                                <label class="form-label">Offer Short Description</label>
                                <input type="text" name="offer_short_description" value="{{ old('offer_short_description', @$section->offer_short_description) }}" 
                                       class="form-control" placeholder="e.g. About Our Platform">
                                @error('offer_short_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

               

                   

                    <!-- Button & Video Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Button</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button Text</label>
                                <input type="text" name="offer_button_text" value="{{ old('offer_button_text', @$section->offer_button_text) }}" 
                                       class="form-control" placeholder="e.g. Get Started">
                                @error('offer_button_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button URL</label>
                                <input type="url" name="offer_button_url" value="{{ old('offer_button_url', @$section->offer_button_url) }}" 
                                       class="form-control" placeholder="e.g. https://example.com/register">
                                @error('offer_button_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                  
                        </div>
                    </div>

           

                    <!-- Form Actions -->
                    <div class="form-footer mt-4">
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
