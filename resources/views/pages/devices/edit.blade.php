@extends('layouts.default')

@section('title', 'Devices')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOU ARE HERE:</p></li>
                <li>Devices</li>
                <li><a href="#" class="active">Add</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">dock</i><h3>Devices</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Device Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form">
                                <input name="DeviceId" id="DeviceId" type="hidden" class="form-control" value="{{$device['id']}}" >
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="Name">Device Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="DeviceName" id="DeviceName" type="text" class="form-control" placeholder="Device Name" value="{{$device['device_name']}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="DeviceImeiNumber">IMEI Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="DeviceImeiNumber" id="DeviceImeiNumber" type="number" class="form-control" placeholder="IMEI Number" value="{{$device['imei_number']}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="DeviceSerialNumber">Serial Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="DeviceSerialNumber" id="DeviceSerialNumber" type="text" class="form-control" placeholder="Device Serial Number" >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="DeviceAllocationDate">Allocation Date <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <div class="input-append info col-lg-10 no-padding">
                                                        <input name="DeviceAllocationDate" id="DeviceAllocationDate" type="text" class="form-control datepicker" placeholder="Device Allocation Date">
                                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="DevicePhoneNumber">Phone Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="DevicePhoneNumber" id="DevicePhoneNumber" type="text" class="form-control" placeholder="Device Phone Number"  value="{{$device['phone_number']}}" >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="DeviceSupervisor">Supervisor Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="DeviceSupervisor" id="DeviceSupervisor" type="text" class="form-control" placeholder="Supervisor Name"  value="{{$device['supervisor']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="DeviceStatus">Status <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="DeviceStatus" id="DeviceStatus" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Status --</option>
                                                        <option value="ACTIVE">ACTIVE</option>
                                                        <option value="DEACTIVATED">DEACTIVATED</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="DeviceSite">Site <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="DeviceSite" id="DeviceSite" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Site --</option>
                                                        @foreach ($sites as $site)
                                                            <option value="{{$site['id']}}">{{$site['name']}}</option>
                                                        @endforeach
                                                    </select>
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
                                        <div id="Results"></div>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-primary btn-cons" type="submit"><i class="fa fa-check"></i> &nbsp;CREATE</button>
                                        <button class="btn btn-white btn-cons" onclick="window.history.back();return false;">BACK</button>
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
        $(document).ready(function() {
            $('#DeviceSite').select2({minimumResultsForSearch: -1}).select2('val', '{{$device['site']['id']}}');
            $('#DeviceStatus').select2({minimumResultsForSearch: -1}).select2('val', '{{$device['status']}}');
        });

        $("#edit_form").submit(function(event){
            var id = $('#DeviceId').val();

            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"PUT",
                url:"/api/devices/update/" + id,
                cache: false,
                data: var_form_data,
                success: function(response){
                    $("#Results").html(response);
                }
            });

        });

        //Iconic form validation sample
        $('.select2', "#edit_form").change(function () {
            $('#edit_form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        $('#edit_form').validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                DeviceId:               { required: true },
                DeviceSite:             { required: true },
                DeviceStatus:           { required: true },
                DeviceImeiNumber:       { required: true },
                DeviceSerialNumber:     { required: true },
                DevicePhoneNumber:      { required: true },
                DeviceAllocationDate:   { required: true },
                DeviceSupervisor:       { required: true },
                DeviceName:             { required: true }
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