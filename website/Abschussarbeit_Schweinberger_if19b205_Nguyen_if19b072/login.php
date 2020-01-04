
<?php
session_start();
if(!empty($_SESSION["user"])){
    session_destroy();
    session_start();
}  
?>


<!doctype html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login für die Projektwebseite für die FH-Technikum">
    <meta name="keywords" content="FH,Technikum,wien,projekt,abschluss,login">
    <meta name="author" content="Lukas Schweinberger,Lam Nguyen">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <?php
        if (isset($_COOKIE['colormode'])) { //needs to be past bootstrap
            switch ($_COOKIE['colormode']) {
                case"Default":
                    break;
                case"Contrast":
                    echo"<link rel='stylesheet' href='css/lowcontrastlayout.css' type='text/css'>";
                    break;
                case"Kompliment":
                   echo"<link rel='stylesheet' href='css/komplimentfarben.css' type='text/css'>";
                    break;
                default: break;
            }
        }?>
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
                                    <input type="text" role="textbox" class="form-control form-control-lg rounded-0" autofocus name="username" id="username" >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" role="textbox" class="form-control form-control-lg rounded-0" id="password" name="password" >
                                </div>
                                <div>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="rememberme" class="custom-control-input">
                                        <span class="custom-control-indicator custom-control-label"></span>
                                        <span class="custom-control-description small text-dark">Remember me on this computer</span>
                                    </label>
                                </div>
                                <button role="button" class="btn btn-primary btn-lg float-right" name="login" value="true" id="btn_login">Login</button>
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
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/site.js"></script>

<script>

    var rules = {
        'username': {
            required: true
        },
        'password': {
            required: true
        }
    };

    var messages = {
        'username': {
            required: 'Username ist nicht ausgefüllt'
        },
        'password': {
            required: 'Password ist nicht ausgefüllt'
        }
    };

    Validation.InitValidation("#formid",".form-group",rules,messages);

    $("#btn_login").click(function(e){
        e.preventDefault();

        if ($('#formid').valid()) {
            $("#formid").submit();
            //document.getElementById("formid").reset();
        }
    });

</script>

</body>
