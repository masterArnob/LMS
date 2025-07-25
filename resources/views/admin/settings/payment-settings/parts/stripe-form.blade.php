    <h4>Stripe Config</h4>
            <form action="{{ route('admin.payment-settings.stripe-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           

                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                        

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stripe Currency</label>
                                <select name="STRIPE_CURRENCY" class="js-example-basic form-control">
                                    <option value="">Select</option>
                                    @forelse (config('gateway_currencies.stripe_currencies') as $key => $value)
                                          <option @selected(config('gatewaySettings.STRIPE_CURRENCY') == $value) value="{{ $value }}">{{ $value }}</option>
                                    @empty
                                        <option value="">No Data Available</option>
                                    @endforelse
                                </select>
                                @error('STRIPE_CURRENCY')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stripe Rate</label>
                                <input type="text" name="STRIPE_RATE" value="{{ config('gatewaySettings.STRIPE_RATE') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('STRIPE_RATE')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                    
                        </div>
                    </div>

               

                   

                    <!-- Button & Video Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Client ID & Secret</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stripe Publishable key</label>
                                <input type="text" name="STRIPE_PUBLISHABLE_KEY" value="{{ config('gatewaySettings.STRIPE_PUBLISHABLE_KEY') }}" 
                                       class="form-control" placeholder="e.g. Get Started">
                                @error('STRIPE_PUBLISHABLE_KEY')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stripe Secret key</label>
                                <input type="text" name="STRIPE_SECRET_KEY" value="{{ config('gatewaySettings.STRIPE_SECRET_KEY') }}" 
                                       class="form-control" placeholder="e.g. https://example.com/register">
                                @error('STRIPE_SECRET_KEY')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                                 <div class="col-md-6 mb-3">
                                <label class="form-label">Stripe Status</label>
                                   <select name="stripe_status" class="form-control">
                                   
                                    <option value="">Select</option>
                                    <option @selected(config('gatewaySettings.stripe_status') == 'enable') value="enable">Enable</option>
                                    <option @selected(config('gatewaySettings.stripe_status') == 'disable') value="disable">Disable</option>
                                </select>
                                @error('stripe_status')
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