@extends('admin.settings.site-settings.layout.master')
@section('settings-content')
        <h4>General Settings</h4>
            <form action="{{ route('admin.general-settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           
                    


                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                               <div class="col-md-6 mb-3">
                                <label class="form-label">Site Name</label>
                                <input type="text" name="site_name" value="{{ config('settings.site_name') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('site_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                                 <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" value="{{ config('settings.phone') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>




                                      <div class="col-md-6 mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" value="{{ config('settings.location') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('location')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>




                          

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Site Default Currency</label>
                                <select name="site_default_currency" class="js-example-basic form-control">
                                    <option value="">Select</option>
                                    @forelse (config('gateway_currencies.all_currencies') as $key => $value)
                                          <option @selected(config('settings.site_default_currency') == $value) value="{{ $value }}">{{ $value }}</option>
                                    @empty
                                        <option value="">No Data Available</option>
                                    @endforelse
                                </select>
                                @error('site_default_currency')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Currency Icon</label>
                                <input type="text" name="currency_icon" value="{{ config('settings.currency_icon') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('currency_icon')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>




                              <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{ config('settings.email') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('email')
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
@endsection