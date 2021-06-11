@extends('Layout.Layout')

@section('ClientContent')
<div class="container">
    <h2 class="text-center m-4">checkout</h2>
</div>
<div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ $cart->totalQty }}</span>
              </h4>
              <ul class="list-group mb-3">
                @foreach ($cart->items as $item)
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $item['name'] }}</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                  <span class="text-muted">{{ $item['price'] }}</span>
                </li>
                @endforeach  
                
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total (USD)</span>
                  <strong>${{$cart->totalPrice}}</strong>
                </li>
              </ul>
            </div>

            <div class="col-md-8 order-md-1">
              <h4 class="mb-3">Billing address</h4>
              <form action="{{ route('orders.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="firstName">Full Name</label>
                    <input type="text" name="shipping_fullName" class="@error('shipping_fullName') is-invalid @enderror form-control" id="firstName" placeholder="" value="" required>
                    @error('shipping_fullName')
                        <div id="shipping_fullName" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>

                <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="email" name="shipping_email" class="@error('shipping_email') is-invalid @enderror form-control" id="email" placeholder="email@example.com">
                    @error('shipping_email')
                        <div id="shipping_email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                  <label for="address">Address</label>
                  <input type="text" name="shipping_address" class="@error('shipping_address') is-invalid @enderror form-control" id="address" placeholder="1234 Main St" required>
                    @error('shipping_address')
                        <div id="shipping_address" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="country">City</label>
                    <select name="shipping_city" class="@error('shipping_city') is-invalid @enderror custom-select d-block w-100" id="country" required>
                      <option value="">Choose...</option>
                      <option>United States</option>
                      <option>United States</option>
                      <option>United States</option>
                    </select>
                    @error('shipping_city')
                        <div id="shipping_city" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state">State</label>
                    <select name="shipping_state" class="@error('shipping_state') is-invalid @enderror custom-select d-block w-100" id="state" required>
                      <option value="">Choose...</option>
                      <option>California</option>
                    </select>
                    @error('shipping_state')
                        <div id="shipping_state" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" name="shipping_zipcode" class="@error('shipping_zipcode') is-invalid @enderror form-control" id="zip" placeholder="" required>
                    @error('shipping_zip')
                        <div id="shipping_zipcode" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
              </form>
            </div>
          </div>
</div>    
@endsection