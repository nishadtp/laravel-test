@extends('layouts.app')

@section('page_style', 'sidebar-mini layout-fixed')

@section('sub.style')
    @yield('style')
@endsection

@section('sub.content')
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.user.navbar.main')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.user.sidebar.main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                
                @if (\Session::has('success'))
                    <div class="alert alert-success" role="alert">{!! \Session::get('success') !!}</div>
                @elseif (\Session::has('error'))
                    <div class="alert alert-danger" role="alert">{!! \Session::get('error') !!}</div>
                @endif
                
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@yield('heading')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @isset($breadcrumb)
                            @foreach($breadcrumb as $item)
                                @if($loop->last)
                                    <li class="breadcrumb-item"><a href="{{ url()->current() }}">{{ $item }}</a></li>
                                @else
                                    <li class="breadcrumb-item active">{{ $item }}</li>
                                @endif
                            @endforeach
                        @endisset
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @yield('content')
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
  @include('layouts.user.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
@endsection

@section('sub.script') 
    @yield('script')
@endsection