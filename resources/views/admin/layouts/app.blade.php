<!DOCTYPE html>
<html lang="en">

@include('admin.sections.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.sections.nav')
        <div class="d-flex">
            @include('admin.sections.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper w-100">
                <!-- Content Header (Page header) -->
                @yield('content')
                @if (isset($slot))
                    {{ $slot }}
                @endif
                <!-- /.content -->
            </div>
        </div>
        @include('admin.sections.footer')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>
@include('admin.sections.script')

</html>
