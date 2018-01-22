<?php
// Start the session


?>


<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.5/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Apr 2016 17:32:25 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyLDRP | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LD+</h1>

            </div>
            <h3>Welcome to MyLDRP</h3>
            <p>This is Faculty  Web Portal.<br/> Students, Please Login From Studnet Portal.

            </p>
            <p>Login in. To see it in action.</p>
<!--            <form class="m-t" role="form">-->
                <div class="form-group">
                    <input id='username' type="text" name="username"  class="form-control" placeholder="Username"   required="" maxlength="50">
                </div>
                <div class="form-group">
                    <input id='password' type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button id="login_btn" type="submit" class="btn btn-primary block full-width m-b" >Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a id="create_account" class="btn btn-sm btn-white btn-block" href="#">Create an account</a>
<!--            </form>-->
            <p class="m-t"> <small>This web app framework base on Bootstrap 3 &copy; 2016</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.redirect.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script>

        $('#create_account').click(function (){
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000,
//                            "positionClass": "toast-top-center",
                };
                toastr.info('User registration function is not available here please contact Admin!', 'Please Contact Department!');

            }, 500);

        });

        $('#login_btn').click(function () {
            var username = $('#username').val();
            var password = $('#password').val();
            var myKeyVals = {username: username,pswd: password}
            $.ajax({
                type: "post",
                url: "Validation_Scripts/login.php",
                data: myKeyVals,
//             contentType: "application/json; charset=utf-8",
                dataType: "json",
                async: true,
                cache: false,
                success: function (response) {
                if(response.success==true){
                    console.log(response);
//
                    $.redirect('ajax_snippates/login_info_worker', {'username': username, 'flag': response.success}, 'POST');
                }
                    else {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000,
//                            "positionClass": "toast-top-center",
                        };
                        toastr.error('For more details Contact Admin Department', 'Please Check Username & Password');

                    }, 500);
                }



                },
                error: function (x, e) {
                    alert("error occur");
                }

            });




        });

    </script>




</body>



</html>
