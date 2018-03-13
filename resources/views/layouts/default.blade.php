<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">

<!-- BEGIN HEADER -->
@section('sidebar')
    @include('includes.header')
@show
<!-- END HEADER -->

<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    @include('includes.sidebar')
    @yield('content')
</div>
<!-- END CONTAINER -->

<!-- BEGIN JS DEPENDECENCIES-->
@section('footer')
    @include('includes.footer')
@show
<!-- END CORE TEMPLATE JS -->
</body>
</html>