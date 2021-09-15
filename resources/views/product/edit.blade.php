@extends('layouts.user.app', [ 'breadcrumb' => [ __('label.product'), __('label.edit_product') ] ])

@section('heading', __('Edit Product'))

@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="card card-default">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form action="{{ route('products.update', [ 'product' => $product->id ]) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="title">@lang('Name')</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $product->name }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label>@lang('Code')</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" value="{{ $product->code}}">
                @error('code')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="price">@lang('Price')</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $product->price }}">
                @error('price')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="row">
               <div class="form-group col-sm-6">
                <label for="price">@lang('Gst')</label>
                <input type="text" class="form-control @error('gst') is-invalid @enderror" name="gst" id="gst" value="{{ $product->gst }}">
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

             
              <button type="type" class="btn btn-primary">@lang('Submit')</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection



@section('sub.script')


<script src="{{ asset('js/components/product.js')}}"></script>



@endsection