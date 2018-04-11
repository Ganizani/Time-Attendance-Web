@extends('layouts.login')

@section('title', 'Clock')
@section('content')
    <div class="row login-container column-seperation">
        <div class="col-md-7" >
            <h2 class="txt-orange"> <b>Manual Clock</b></h2>
            <form class="login-form validate" id="login-form"  name="login-form">
                <div class="row" >
                    <div class="form-group col-md-12">
                        <div id="Results"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="txt_username">Username</label>
                        <input class="form-control" id="txt_username" name="txt_username" type="email" placeholder="Email: e.g: email@example.com" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="txt_password">Password</label> <span class="help"></span>
                        <input class="form-control" id="txt_password" name="txt_password" type="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="txt_status">Status</label> <span class="help"></span>
                        <select name="txt_status" id="txt_status" class="select2 form-control" data-init-plugin="select2" required>
                            <option value="" >-- Status --</option>
                            <option value="IN" >IN</option>
                            <option value="OUT">OUT</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4 pull-right">
                        <button class="btn btn-warning btn-cons btn-block " type="submit">Clock</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <div id="footer">
            <div class="error-container">
                <div class="copyright error-number"> <a href="#" style="color: #dc9758;">Ganizani</a> Copyright &copy; {{date('Y')}} - All Rights Reserved</div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent

    <script>
        $(document).ready(function() {
            $('#txt_status').select2({minimumResultsForSearch: -1});
        });

        $("#login-form").submit(function(event){
            event.preventDefault();
            var_form_data = $(this).serialize();
            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');
            $.ajax({
                type:"POST",
                url:"/api/users/clock",
                cache: false,
                data: var_form_data,
                success: function(response){
                    $('#Results').html(response);
                }
            });
        });
    </script>
@endsection