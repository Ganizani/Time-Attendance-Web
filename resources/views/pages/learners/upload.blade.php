@extends('layouts.default')

@section('title', 'Learners')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Learners</li>
                <li><a href="#" class="active">Upload</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">supervisor_account</i><h3>Learners</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <label><b>* Excel Spreadsheet Only</b> </label>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="upload_form" action="/api/uploads/learners"  method="post" enctype="multipart/form-data">
                                <div class="row column-seperation">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerFile">Learner File <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerFile" id="LearnerFile" type="file" class="form-control"  accept=".xls, .xlsx">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="txt-red">* Required Fields</span>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="pull-left">
                                        <div class="col-md-12">
                                            <div id="Results"></div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-primary btn-cons" type="submit"><i class="fa fa-upload"></i> &nbsp;Upload</button>
                                        <button class="btn btn-white btn-cons" onclick="window.history.back();return false;">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER-->
@endsection
@section('footer')
    @parent
    <script>
        var options = {
            target:   '#Results'     // target element(s) to be updated with server response
        };

        $("#upload_form").submit(function() {
            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $(this).ajaxSubmit(options);
            // always return false to prevent standard browser submit and page navigation
            return false;
        });

        $('#upload_form').validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                LearnerFile: {
                    required: true ,
                    extension: "xls|xlsx"
                }
            },

            invalidHandler: function (event, validator) {
                //display error alert on form submit
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-with-icon').children('i');
                var parent = $(element).parent('.input-with-icon');
                icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
                parent.removeClass('success-control').addClass('error-control');
            },

            highlight: function (element) { // hightlight error inputs
                var parent = $(element).parent();
                parent.removeClass('success-control').addClass('error-control');
            },

            unhighlight: function (element) { // revert the change done by hightlight

            },

            success: function (label, element) {
                var icon = $(element).parent('.input-with-icon').children('i');
                var parent = $(element).parent('.input-with-icon');
                icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                parent.removeClass('error-control').addClass('success-control');
            },

            submitHandler: function (form, event) {

            }

        });


    </script>
@endsection