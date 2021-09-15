@extends('layouts.user.app', [ 'breadcrumb' => [ __('label.product'), __('label.new_product') ] ])

@section('heading', __('New product'))

@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="card card-default">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" id="form_new_product">
              @csrf
              <div class="form-group">
                <label for="title">@lang('Name')</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label>@lang('Code')</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" value="{{ old('name') }}">
                @error('code')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="price">@lang('Price')</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price') }}">
                @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
               <div class="row">
              <div class="form-group col-sm-6">
                <label>GST(%)</label>
                <input name="gst" id="gst" class="form-control @error('gst') is-invalid @enderror" multiple="multiple" style="width: 100%;">
                @error('gst')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group col-sm-6">
                <label>@lang('GST Amount')</label>
                <input type="text" name="gst_calc" id="gst_calc" class="form-control" readonly="true" value="">
              </div>
            </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>@lang('Image')</label>
                      <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                      @error('image')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                 
                </div>
              </div>



              <button type="type" class="btn btn-primary">@lang('label.submit')</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection

@section('style')

<!-- Select2 -->


<style>

.error {
    color: #ff0000;
    font-size: 12px;
}

</style>

@endsection

@section('sub.script')


<script src="{{ asset('js/components/product.js')}}"></script>


@endsection