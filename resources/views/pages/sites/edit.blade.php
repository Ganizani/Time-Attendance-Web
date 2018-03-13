@extends('layouts.default')

@section('title', 'Sites')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Sites</li>
                <li><a href="#" class="active">Edit</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">location_city</i><h3>Sites</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Site Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form" >
                                <input name="SiteId" id="SiteId" type="hidden" class="form-control" value="{{$site['id']}}">
                                <div class="row column-seperation">
                                    <div class="col-md-6">

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="SiteName">Site Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SiteName" id="SiteName" type="text" class="form-control" placeholder=" Name" value="{{$site['name']}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="SiteCompany">Company <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="SiteCompany" id="SiteCompany" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Company --</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{$company['id']}}">{{$company['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="SiteEmail">Email <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SiteEmail" id="SiteEmail" type="email" class="form-control" placeholder="Email, e.g: email@example.com" value="{{$site['email']}}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="SitePhoneNumber">Phone Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SitePhoneNumber" id="SitePhoneNumber" type="number" class="form-control" placeholder="Phone Number" value="{{$site['phone_number']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="SiteContactPerson">Contact Person <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SiteContactPerson" id="SiteContactPerson" type="text" class="form-control" placeholder="Contact Person" value="{{$site['contact_person']}}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="SiteWebsite">Website <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SiteWebsite" id="SiteWebsite" type="number" class="form-control" placeholder="Website" value="{{$site['website']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SiteAddress" id="SiteAddress" type="text" class="form-control" placeholder="Address" value="{{$site['address']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="SiteLatitude">Latitude <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SiteLatitude" id="SiteLatitude" type="text" class="form-control" placeholder="Latitude" value="{{$site['latitude']}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="SiteLongitude">Longitude <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="SiteLongitude" id="SiteLongitude" type="text" class="form-control" placeholder="Longitude" value="{{$site['longitude']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="txt-red">* Required Fields</span>
                                </div>
                                <div class="form-actions">
                                    <div class="pull-left">
                                        <div id="Results"></div>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-primary btn-cons" type="submit"><i class="fa fa-check"></i> &nbsp;UPDATE</button>
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
            $('#SiteCompany').select2().select2('val', '{{$site['company']['id']}}');
        });

        $("#edit_form").submit(function(event){
            var id = $('#SiteId').val();
            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"PUT",
                url:"/api/sites/update/" + id,
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
                SiteName:           { required: true },
                SiteCompany:        { required: true },
                SiteContactPerson:  { required: true },
                SitePhoneNumber:    { required: true },
                SiteEmail:          {
                    required: true,
                    email: true
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