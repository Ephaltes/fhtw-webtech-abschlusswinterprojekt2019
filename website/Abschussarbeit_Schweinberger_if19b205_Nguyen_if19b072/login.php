
<?php
session_start();
if(!empty($_SESSION["user"])){
    session_destroy();
}  
?>


<!doctype html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <!-- <link rel="stylesheet" href="css/MARKEDforDELETIONindex-stylesheet.css" type="text/css"> -->
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>FHTW Shop&News</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <!-- form card login -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="sites/logincheck.php" id="formid" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" autofocus name="username" id="username" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password" >
                                </div>
                                <div>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="rememberme" class="custom-control-input">
                                        <span class="custom-control-indicator custom-control-label"></span>
                                        <span class="custom-control-description small text-dark">Remember me on this computer</span>
                                    </label>
                                </div>
                                <button class="btn btn-primary btn-lg float-right" name="login" value="true" id="btn_login">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/popper-utils.js"></script>
<script src="vendor/jquery_validation/jquery.validate.js"></script>
<script src="vendor/jquery_validation/additional-methods.js"></script>
<script src="vendor/jquery_validation/localization/messages_de.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"> </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"> </script>

<script>

    $("#btn_login").click(function(e){
        e.preventDefault();

        if ($('#formid').valid()) {
            $("#formid").submit();
            //document.getElementById("formid").reset();
        }
    });

    $('#formid').validate({
        errorClass: 'alert-danger form-control mt-2 help-block', // You can change the animation class for a different entrance animation - check animations page
        errorElement: 'div',
        errorPlacement: function (error, e) {
            //e.parents('.form-group > div').append(error);
            $(e).parents('.form-group').append(error);
        },
        highlight: function (e) {
            //console.log("highlight");
            $(e).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
            //$(e).closest('.help-block').remove();
        },
        unhighlight: function (e) {
            //console.log("unhighlight");
            $(e).closest('.form-control').removeClass('is-invalid'); //.addClass('is-valid');
            //$(e).closest('.help-block').remove();
        },
        success: function (e) {
            //console.log("success;");
            //console.log($(e).closest('.form-control').removeClass('is-valid is-invalid'));
            $(e).closest('.help-block').remove();
        },
        rules: {
            'username': {
                required: true
            },
            'password': {
                required: true
            }
        },
        messages: {
            'username': {
                required: 'Username ist nicht ausgefüllt'
            },
            'password': {
                required: 'Password ist nicht ausgefüllt'
            }
        }
    });

</script>

</body>
