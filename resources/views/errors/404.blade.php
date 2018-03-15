<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title> Page Not Found | {{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href={{ URL::asset("theme/plugins/pace/pace-theme-flash.css") }} rel="stylesheet" type="text/css" media="screen" />
    <link href={{ URL::asset("theme/plugins/bootstrapv3/css/bootstrap.min.css") }}  rel="stylesheet" type="text/css" />
    <link href={{ URL::asset("theme/plugins/bootstrapv3/css/bootstrap-theme.min.css") }}  rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href={{ URL::asset("theme/plugins/animate.min.css") }} rel="stylesheet" type="text/css" />
    <link href={{ URL::asset("theme/plugins/jquery-scrollbar/jquery.scrollbar.css") }}  rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href={{ URL::asset("theme/css/style.css") }} rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body-2 no-top">
<div class="error-wrapper container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10">
            <div class="error-container">
                <div class="error-main">
                    <div class="error-number" style="color:#dc9758 !important;"> 404 </div>
                    <div class="error-description"> We seem to have lost you in the clouds. </div>
                    <div class="error-description-mini"> The page your looking for is not here </div>
                    <br>
                    <button class="btn btn-orange btn-cons" type="button" onclick="window.history.back();return false;"> <i class="fa fa-backward"></i> &nbsp; BACK</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="error-container">
        <div class="copyright error-number"> <a href="#" style="color: #dc9758;">Ganizani</a> Copyright &copy; {{date('Y')}} - All Rights Reserved</div>
    </div>
</div>
<!-- END CONTAINER -->
<script src={{ URL::asset("theme/plugins/pace/pace.min.js") }}  type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src={{ URL::asset("theme/plugins/jquery/jquery-1.11.3.min.js") }}  type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/bootstrapv3/js/bootstrap.min.js") }}  type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-block-ui/jqueryblockui.min.js") }}  type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-unveil/jquery.unveil.min.js") }}  type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-scrollbar/jquery.scrollbar.min.js") }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-numberAnimate/jquery.animateNumbers.js") }} type="text/javascript"></script>
<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src={{ URL::asset("theme/js/app.js") }} type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
</body>
</html>