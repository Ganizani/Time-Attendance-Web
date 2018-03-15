@extends('layouts.login')

@section('title', 'Login')
@section('content')
    <div class="row login-container column-seperation">
        <div class="col-md-6" >
            <h2 style="color: #dc9758;"> <b>Sign In</b></h2>
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

                <div class="row" >
                    <div class="form-group col-md-6">
                        <div class="copyright error-number">
                            <a href="/password/forgot" class="" type="submit" style="color: #dc9758;"><b>Forgot Password ?</b></a>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-warning btn-cons pull-right" type="submit">Login</button>
                    </div>
                </div>
            </form>
            <div class="row" >

            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <img src="{{URL::asset("theme/img/")}}" width="450" height="400" alt="Logo 450x450">
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
    $("#login-form").submit(function(event){
        event.preventDefault();
        var_form_data = $(this).serialize();

        $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

        $.ajax({
            type:"POST",
            url:"/api/users/login",
            cache: false,
            data: var_form_data,
            success: function(response){

                var obj = $.parseJSON(response);

                if(obj.status === "success"){
                    window.location.href = '/dashboard';
                }
                else{
                    $('#Results').html(obj.message);
                }
            }
        });
    });
    </script>
@endsection