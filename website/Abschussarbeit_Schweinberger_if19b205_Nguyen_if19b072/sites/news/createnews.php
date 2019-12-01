<?php

require_once("Entities/UserEntity.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_COOKIE['USERHASH']) && empty($_SESSION["user"])) {
    header('location: sites/logincheck.php');
}

if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

?>

<head>
    <link rel="stylesheet" href="summernote/summernote-bs4.css">
</head>


<form method="POST" id="form" action="/sites/news/savenewstofile.php" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-12">
            <div class="row">
                <h1 class="col">News erstellen</h1>

            </div>

            <div class="form-group row">
                <div class="col">
                    <label>Überschrift der News: </label>
                    <input class="form-control" type="title" name="title">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">

                    <div class="custom-file ">
                        <input type="file" name="thumbnail" class="custom-file-input  " accept="image/*" id="thumbnail">
                        <label class="custom-file-label form-check-label " for="thumbnail">Titelbild</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <img src="" id="preview" class="hide img-fluid d-none img-thumbnail ">
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <textarea id="summernote" name="content"></textarea>
            <textarea id="content_raw" name="content_raw" class="invisible"></textarea>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <input type="button" id="btn_submit" class="btn btn-primary" value="News erstellen">
        </div>
    </div>
</div>
</form>


<script src="summernote/summernote-bs4.js"></script>


<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


    $('input[type="file"]').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
            $("#preview").addClass("d-block");
            $("#preview").removeClass("d-none");

        };


        // read the image file as a data URL.
        if (this.files.length > 0)
            reader.readAsDataURL(this.files[0]);
        else {
            $("#preview").addClass("d-none");
            $("#preview").removeClass("d-block");
        }
    });

    $("#btn_submit").click(function(){

        $("#content_raw").val($($("#summernote").summernote("code")).text());
        $("#form").submit();

    });

    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200
        });
    });

</script>

