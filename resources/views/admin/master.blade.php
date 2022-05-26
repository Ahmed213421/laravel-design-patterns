@include('admin.layouts.head')
<div class="wrapper">

  @include('admin.layouts.navbar')
  <!-- /.navbar -->

  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer-scripts')