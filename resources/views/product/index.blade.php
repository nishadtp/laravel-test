@extends('layouts.user.app', [ 'breadcrumb' => [ __('label.product'), __('label.all_products') ] ])

@section('heading', __('heading.all_products'))

@section('content')

<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row d-flex align-items-stretch">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th>#</th>
            <th></th>
            <th>@lang('Name')</th>
            <th>@lang('Product code')</th>
            <th>@lang('Price')</th>
            <th>@lang('Gst')</th>
            <th class="text-center">@lang('Action')</th>
          </tr>
        </thead>

        <tbody>
          @php $slno = $products->firstItem(); @endphp
          @forelse ($products as $product)
          <tr>
            <td>
              {{ $slno }}
            </td>
            <td>
                  
                    <img alt="Avatar" class="table-avatar" src="{{$product->getImage()}}">
                  
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ round($product->price, 2) }}</td>
            <td>{{ $product->gst }}</td>
           
            <td class="project-actions text-center">
              <a class="btn btn-info btn-sm" title="@lang('label.edit')" href="{{ route('products.edit', [ 'product' => $product->id ]) }}">
                <i class="fas fa-pencil-alt">
                </i>
              </a>

              <form action="{{ route('products.destroy', [ 'product' => $product->id ]) }}" method="POST" onsubmit="return confirmation();">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" title="@lang('label.delete')">
                        <i class="fas fa-trash">
                        </i>
                    </button>
              </form>

            </td>
          </tr>
          @php $slno++; @endphp
          @empty
          <tr>
            <td class="text-center" colspan="8">@lang('label.no_result_found')</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <nav aria-label="Page Navigation">
      {{ $products->links() }}
    </nav>
  </div>
  <!-- /.card-footer -->
</div>

@endsection

@section('script')
<script>
    function confirmation(){
        return confirm("@lang('message.are_you_sure')");
    }
</script>
@endsection