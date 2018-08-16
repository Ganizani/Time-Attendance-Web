@extends('layouts.login')

@section('title', 'Reset Password')
@section('content')
    <div class="row login-container column-seperation">
        <div class="col-md-6" >
            <h2 class="txt-orange center-text"> <b>MomG<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAVrSURBVGhD7ZhtTFtlFMeJOo1Ts/jFmEXjYowaP0yHvLS8tNBCe29729t2K2SIcyxxZJJoJhJhYdyCL2yCjqgjAdriiDrGS4mLRsMH8Yvxi4nJFqOJi2YOHDDJ5KUO6LjH08tTcnd52G7by8Ck/+QXEtre8//3nOe5z21aSimllLyK+rzbbINuxj7EH+FCfAcXcn3FDbl+lAi5RpBTSA036M4UBOEO8rHNJWu/s8raa1uyfGoDU9ACxg4TGDvNUNzDgm3ACRhGAX8BA726533dvbV7mGGkW+C4reRyGyfuLLcVv+1RuVnmDCeFyWrJgcxjeshrLwDL5zZZGBe4TvO/1Hqti3VeBjDMt5sijC3kKpeblMOccYCh3QS7mjIg491sKOgsAnuIl14r6XSGa0uZf6QwXmaQXG5jZQ+5epUh5NgHeRw7M+xqzID0t7OgMGCR/l/id8xiRyLRMHUlrItcbuMUXfAY5jdlACVsvwN0H+TDzqPpOHq5YOtzQGWd7eJyV6zfkcttrPghfgeG+ZMWQElBlxl2NqRLHbJ3sRAN0rKPX1rwN7wsBn0nxIDQhn/rwC/sF7sFHdzu3c4+4Hkcd6bzNPNKzKes8GzD83D4OAcXT1QDmgcI+qiIQWEcX+8Uu4QnSKn1VZhlMyYKDWMj+0zg7l9e1GtROVgKPwdfpxpfC+xSRAz4TkLHsW2kpPaaY9mK8Tz90pg+E6KMGvTw5SsW2N+zOtDRvhdhLlhPNasG7M45sVN4hJTWTqLHU7bA2SMT+XophJy/crJgrCAHLtgM8KvDCL+XMYCzTzUYD9idS6L/rceIheQlut06ZAE8HhBdLpguMi2bVwSKcjk3GyKt8Y3TzcAx+x43gruIlcSFAR7CblyKhpBznXfCdLEJxnN1NwS5VnOAaigZcCNoInYSF4b4UBniBtxumDTkSiGmWDPVSLLgiM3CZ80PEkvxS+T5RzHIPDUAIeJ0rHRjsbGKakQLsCv1xFb8umU3kOlisxRisjCfakArcK38QWzFJ/B678QgEzTzcmJjNVPuphrQlG5hB7GnXrg7ZdGMK4ntXgv1h+jFtQSPM8SeemE3XqMZlxNbH9EwWtw3bgWOVwuxp14Y5CTNvJx5u00KMmHMoRbWGlzwQWJPvTDIFzTzcq7Z2OWFblrfhR4Djy1niT31wiDDNPNy/mUZKcjfxQXUwlqDQYaJPfXCIF/TzMtZCWIppBbWGhytAWJPvfBo0kszLye2Rq4UGamFtQbv8N3EnnphkHaaeTmLZNda75thDOzIEWJPvTBIFc28HHyPtPVeztNRC2uN6BecxJ56oUkdzbySK8Y8qSu0wlqCY7WEQbYTe+olMsw9uOCv0szLmSFnrest1VQDWoE3wx+ItfiFXfHTzMuJ3d3nq7V/DpGDQQ4TW/ELz1t6mnklk/k5MLuXpxrQAhyrKdF//AFiKzGpucOHWStMWUxUE1qQ1LNITGj0aQwTVpqXE929Jg143mpP/FeTtcCR+gn6hLuJneSERitoAeSEGSvMHyqnmkkUPJLMIc8QG9oIw7TRAqyAXZlxslRDiYDrIiz6GwtJeW2FYZqpIQgLnB0Wfck/t+M4TYvBRispuz4Sd+8+gIFmaUGiLL60l2pOLdiJ86K/6SlSbn2F2/KTGGaEFkSi9Q2qyZuBASK4O7XCx8L9pMztEwbicEc7typIxQtxPfrigv5G80WdiHDcsrFDHyGTK2FqKqmmY+C3Pw8B4RPoFp4jl9k8goMHt0hdcrt7MNxVaF79G7B0lw743sEAD5OPbW5Jh86yUo/Y9uaoFCAgiNgBn9jTch95y/9L0NGxBcfoPU2OGSmllFKCSkv7D7WrHurh3yaZAAAAAElFTkSuQmCC"></b></h2>
            <h3 class="txt-orange center-text"> Reset Password</h3>
            <form class="login-form validate" id="reset-password-form"  name="reset-password-form">
                <input class="form-control" id="txt_token" name="txt_token" type="hidden"  value="{{isset($user['token']) ? $user['token'] : ""}}">
                <input class="form-control" id="txt_email" name="txt_email" type="hidden"  value="{{isset($user['email']) ? $user['email'] : ""}}">
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
                        <a href="/login" class="btn btn-info btn-cons btn-medium pull-left" type="submit">Login</a>
                        <button class="btn btn-warning btn-cons btn-medium pull-right" type="submit"><i class="fa fa-check"></i>&nbsp; Submit</button>
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
        $("#reset-password-form").submit(function(event){
            event.preventDefault();
            var form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/users/password/reset",
                cache: false,
                data: form_data,
                success: function(response){
                    $('#Results').html(response);
                }
            });
        });
    </script>
@endsection