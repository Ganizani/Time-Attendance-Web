@extends('layouts.login')

@section('title', 'Reset Password')
@section('content')
    <div class="row login-container column-seperation">
        <div class="col-md-6" >
            <h2 class="txt-orange"> Reset Password</h2>
            <form class="login-form validate" id="reset-password-form"  name="reset-password-form">
                <input class="form-control" id="txt_token" name="txt_token" type="hidden"  value="{{$user['token']}}">
                <input class="form-control" id="txt_email" name="txt_email" type="hidden"  value="{{$user['email']}}">
                <div class="row" >
                    <div class="form-group col-md-12">
                        <div id="Results"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="txt_password">Password</label>
                        <input class="form-control" id="txt_password" name="txt_password" type="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="txt_confirm_password">Confirm Password</label>
                        <input class="form-control" id="txt_confirm_password" name="txt_confirm_password" type="password" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="row" >
                    <div class="form-group col-md-12">
                        <a href="/login" class="btn btn-white btn-cons btn-medium pull-left" type="submit">Login</a>
                        <button class="btn btn-warning btn-cons btn-medium pull-right" type="submit">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <img src="{{URL::asset("theme/img/")}}" width="450" height="400" alt="Logo 450x400">
        </div>
        <div class="clearfix"></div>
        <br><br><br>
        <div id="footer">
            <div class="error-container">
                <div class="copyright error-number"> <a href="#" class="txt-orange">Ganizani</a> Copyright &copy; {{date('Y')}} - All Rights Reserved</div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent

    <script>
        $("#reset-password-form").submit(function(event){
            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/employees/password/reset",
                cache: false,
                data: var_form_data,
                success: function(response){
                    $('#Results').html(response);
                }
            });
        });
    </script>
@endsection