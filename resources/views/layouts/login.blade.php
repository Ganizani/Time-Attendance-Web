<!DOCTYPE html>
<html>
<!-- START HEAD -->
<head>
    @include('includes.head')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body-2 no-top">

<!-- BEGIN CONTAINER -->
<div class="container">
    @yield('content')
</div>
<!-- END CONTAINER -->

<!-- BEGIN JS DEPENDECENCIES-->
@section('footer')
    @include('includes.footer')
@show
<!-- END CORE TEMPLATE JS -->
</body>
<!-- END BODY -->
</html>