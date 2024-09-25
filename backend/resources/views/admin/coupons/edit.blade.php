@extends('admin.layouts.app')

@section('title')
Edit New Coupon
@endsection

@section('content')
<div class="row">
  @include('admin.layouts.sidebar')
  <div class="col-md-9">
      <div class="row mt-2">
          <div class="col-md-12">
              <div class="card-header bg-white">
                  <h3 class="mt-2">Edit Coupon</h3>
                  <hr>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-6 mx-auto">
                          <form action="{{route('admin.coupons.update', $coupon->id)}}" method="post">
                              @csrf
                              @method('PUT')
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="floatingInput" 
                                placeholder="Name" name="name"  value="{{ $coupon->name, old('name') }}">
                                <label for="floatingInput">Name*</label>
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-floating mb-3">
                                <input type="number" class="form-control  @error('discount') is-invalid @enderror" id="floatingInput" 
                                placeholder="Discount" name="discount"  value="{{ $coupon->discount, old('discount') }}">
                                <label for="floatingInput">Discount*</label>
                                @error('discount')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control  
                                @error('valid_until') is-invalid @enderror" id="floatingInput" 
                                placeholder="Valid Until"
                                value="{{ $coupon->valid_until }}"
                                name="valid_until">
                                <label for="floatingInput">Validity*</label>
                                @error('valid_until')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="mb-2">
                                <button type="submit" class="btn btn-sm btn-dark">
                                  Submit
                                </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection