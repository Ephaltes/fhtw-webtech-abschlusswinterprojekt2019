<?php
//integrate UserEntity Class
$root = $_SERVER['DOCUMENT_ROOT'];
$dep_inj = "/sites/dependency_include/include_user.php";
require_once($root . $dep_inj);
use Model\UserModel;

if (!empty($_SESSION["user"])) {
    if(UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}?>

<div class="container clearfix">
    <form id="formid" role="form">
    <div class="form-group" role="group">
        <label for="subject">Betreff: </label>
        <input name="subject" tabindex="10" role="textbox" id="subject" class="form-control" type="text" placeholder="Betreff"/>
    </div>
    <div class="form-group" role="group">
        <label for="body">Nachricht: </label>
        <textarea id="body" class="form-control" tabindex="11" role="textbox" name="body" rows="10"></textarea>
    </div>
        <div class="form-group">
        <a id="btn_send" role="link" tabindex="13" class="btn btn-primary float-right text-white">Senden</a>
        </div>
    </form>
</div>


<script src="vendor/jquery_validation/jquery.validate.js"></script>
<script src="vendor/jquery_validation/additional-methods.js"></script>
<script src="vendor/jquery_validation/localization/messages_de.js"></script>
<script src="js/site.js"></script>

<script>

    var rules = {
        'subject': {
            required: true,
        },
        'body': {
            required: true
        }
    };

    var messages = {
        'subject': {
            required: 'Betreff fehlt'
        },
        'body': {
            required: 'Nachricht fehlt'
        }
    };

    Validation.InitValidation("#formid",".form-group",rules,messages);

    $("#btn_send").click(function(e){

        if ($('#formid').valid()) {

            let subject = $("#subject").val();
            let body = $("#body").val();
            body= encodeURI(body);
            console.log(body);

            $("#btn_send").attr("href","mailto:if19b072@technikum-wien.at?subject="+subject+"&body="+body);
        }

    });

</script>