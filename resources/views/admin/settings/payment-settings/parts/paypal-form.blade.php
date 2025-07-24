    <h4>Paypal Config</h4>
            <form action="{{ route('admin.payment-settings.paypal-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           
                    
             










                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Paypal Mode</label>
                                <select name="PAYPAL_MODE" class="form-control">
                                   
                                    <option value="">Select</option>
                                    <option @selected(config('gatewaySettings.PAYPAL_MODE') == 'sandbox') value="sandbox">Sandbox</option>
                                    <option @selected(config('gatewaySettings.PAYPAL_MODE') == 'live') value="live">Live</option>
                                </select>
                                @error('PAYPAL_MODE')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Paypal Currency</label>
                                <select name="PAYPAL_CURRENCY" class="js-example-basic form-control">
                                    <option value="">Select</option>
                                    @forelse (config('gateway_currencies.paypal_currencies') as $key => $value)
                                          <option @selected(config('gatewaySettings.PAYPAL_CURRENCY') == $value['code']) value="{{ $value['code'] }}">{{ $value['code'] }}</option>
                                    @empty
                                        <option value="">No Data Available</option>
                                    @endforelse
                                </select>
                                @error('PAYPAL_CURRENCY')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Paypal Rate</label>
                                <input type="text" name="PAYPAL_RATE" value="{{ config('gatewaySettings.PAYPAL_RATE') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('PAYPAL_RATE')
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
                                <label class="form-label">Paypal Client ID</label>
                                <input type="text" name="PAYPAL_CLIENT_ID" value="{{ config('gatewaySettings.PAYPAL_CLIENT_ID') }}" 
                                       class="form-control" placeholder="e.g. Get Started">
                                @error('PAYPAL_CLIENT_ID')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Paypal Client Secret</label>
                                <input type="text" name="PAYPAL_CLIENT_SECRET" value="{{ config('gatewaySettings.PAYPAL_CLIENT_SECRET') }}" 
                                       class="form-control" placeholder="e.g. https://example.com/register">
                                @error('PAYPAL_CLIENT_SECRET')
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
 