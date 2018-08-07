@extends('layouts.login')

@section('title', 'Forgot Password')
@section('content')
    <div class="row login-container column-seperation">
        <div class="col-md-6" >
            <h2 class="txt-orange"> Forgot Password</h2>
            <form class="login-form validate" id="forgot-password-form"  name="forgot-password-form">
                <div class="row" >
                    <div class="form-group col-md-12">
                        <div id="Results"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="txt_username">Email</label>
                        <input class="form-control" id="txt_username" name="txt_username" type="email" placeholder="Email: e.g: email@example.com" required>
                    </div>
                </div>

                <div class="row" >
                    <div class="form-group col-md-12">
                        <a href="/login" class="btn btn-info btn-cons btn-medium pull-left" type="submit">Login</a>
                        <button class="btn btn-warning btn-cons btn-medium pull-right" type="submit"><i class="fa fa-check"></i>&nbsp;Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <img src="{{URL::asset("theme/img/ness-logo.jpg")}}" width="100%" height="400" alt="Logo">
        </div>
        <div class="clearfix"></div>
        <br><br><br>
        <div id="footer">
            <div class="error-container">
                <div class="copyright error-number"> <a href="#" class="txt-orange">{{env('COMPANY')}}</a> Copyright &copy; {{date('Y')}} - All Rights Reserved</div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent

    <script>
        $("#forgot-password-form").submit(function(event){
            event.preventDefault();
            var form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/users/password/forgot",
                cache: false,
                data: form_data,
                success: function(response){
                    $('#Results').html(response);
                }
            });
        });
    </script>
@endsection