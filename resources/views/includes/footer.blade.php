
<script src={{ URL::asset("theme/plugins/pace/pace.min.js")  }} type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src={{ URL::asset("theme/plugins/jquery/jquery-1.11.3.min.js")  }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/bootstrapv3/js/bootstrap.min.js")  }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-block-ui/jqueryblockui.min.js")  }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-unveil/jquery.unveil.min.js")  }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-scrollbar/jquery.scrollbar.min.js")  }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-numberAnimate/jquery.animateNumbers.js")  }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/jquery-validation/js/jquery.validate.min.js")  }} type="text/javascript"></script>
<script src={{ URL::asset("theme/plugins/bootstrap-select2/select2.min.js")  }} type="text/javascript"></script>
<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src={{ URL::asset("theme/js/app.js")}} type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->

<!-- BEGIN DATA-TABLE PLUGINS -->
<script src={{ URL::asset("theme/js/datatables-full.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/filterDropDown/filterDropDown.js")}} type="text/javascript"></script>
<!-- END DATA-TABLE PLUGINS -->

<!-- BEGIN FORM ELEMENTS PLUGINS -->
<script src={{URL::asset("theme/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/jquery-inputmask/jquery.inputmask.min.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/jquery-autonumeric/autoNumeric.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/ios-switch/ios7-switch.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/bootstrap-select2/select2.min.js")  }} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/bootstrap-tag/bootstrap-tagsinput.min.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js")}} type="text/javascript"></script>
<script src={{URL::asset("theme/plugins/dropzone/dropzone.min.js")}} type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- TOASTR-->
<script src={{URL::asset("theme/plugins/toastr/toastr.min.js")}} type="text/javascript"></script>
<!-- JQUERY FORM -->
<script type="text/javascript" src={{URL::asset("theme/js/jquery.form.min.js")}} ></script>
<script>
    $('.select2').select();

    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        startView: 1,
        autoclose: true,
        todayHighlight: true
    });

    $( "#Company" ).change( function  (event) {
        event.preventDefault();
        var company_id    =  $( "#Company").val();

        $.ajax({
            type:"POST",
            url:"/api/companies/select/change",
            cache:false,
            data:{
                company_id : company_id
            },
            success: function(response){
                $( "#Site").html(response);
            }
        });
    });

    $( "#Site" ).change( function(event) {
        event.preventDefault();
        var site_id =  $( "#Site").val();

        $.ajax({
            type:"POST",
            url:"/api/sites/select/change",
            cache:false,
            data:{
                site_id : site_id
            },
            success: function(response){
                $('#Company').select2().select2('val', response);
                $('#Site').val(site_id)
            }
        });

    });
</script>