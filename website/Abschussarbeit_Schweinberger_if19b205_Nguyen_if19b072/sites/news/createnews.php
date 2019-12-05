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

if (!empty($_GET["edit"])) {
    $filename = base64_decode($_GET["edit"]);
    $xml = simplexml_load_file("data/news/" . $filename);
}


?>

<head>
    <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css">
</head>


<form method="POST" id="formid" action="/sites/news/savenewstofile.php" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="row">
                    <h1 class="col">News erstellen</h1>

                </div>

                <div class="form-group row">
                    <div class="col">
                        <label>Überschrift der News: </label>
                        <input class="form-control" type="title"
                               name="title" <?php if (!empty($xml->title)) echo "value='$xml->title'"; ?> >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">

                        <div class="input-group">
                            <div class="custom-file ">
                                <input type="file" name="thumbnail" class="custom-file-input  " accept="image/*"
                                       id="thumbnail">
                                <label id="thumbnail_label" class="custom-file-label form-check-label "
                                       for="thumbnail">  <?php if (!empty($xml->thumbnail)) echo "Derzeitiges TitelBild";
                                    else echo "Bitte Titelbild auswählen"; ?>
                                </label>
                            </div>

                            <div id="btn_remove_image" class="input-group-append cursor-pointer">
                                <span class="input-group-text">Delete</span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <?php if (!empty($xml->thumbnail)) { ?>

                            <img src="<?php echo $xml->thumbnail ?>" id="preview"
                                 class="img-fluid d-block img-thumbnail ">
                        <?php } else { ?>
                            <img src="" id="preview" class="img-fluid d-none img-thumbnail ">
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <textarea id="summernote"
                          name="content"><?php if (!empty($xml->content)) echo $xml->content; ?></textarea>
                <textarea id="content_raw" name="content_raw" class="invisible"></textarea>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-12">
                <input type="button" id="btn_submit" class="btn btn-primary" value=" <?php if (!empty($filename)) echo "Änderungen speichern"; else echo "News erstellen"; ?>">
            </div>
            <input type="hidden" name="edit_filename" class="invisible"
                   value="<?php if (!empty($filename)) echo $filename; ?>">
            <input id="thumbnail_original" type="hidden" name="original_thumbnail" class="invisible"
                   value="<?php if (!empty($xml->thumbnail)) echo $xml->thumbnail; ?>">
        </div>
    </div>
</form>


<script src="vendor/summernote/summernote-bs4.js"></script>

<script src="vendor/jquery_validation/jquery.validate.js"></script>
<script src="vendor/jquery_validation/additional-methods.js"></script>
<script src="vendor/jquery_validation/localization/messages_de.js"></script>

<script>

    $('#formid').validate({
        errorClass: 'alert-danger form-control mt-2 help-block', // You can change the animation class for a different entrance animation - check animations page
        errorElement: 'div',
        errorPlacement: function (error, e) {
            //e.parents('.form-group > div').append(error);
            $(e).parents('.form-group > div').append(error);
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
            'title': {
                required: true,
                pattern: "[A-Za-z0-9+_#-]"
            }
        },
        messages: {
            'title': {
                required: 'Password ist nicht ausgefüllt'
            }
        }
    });




    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


    $('input[type="file"]').change(function (e) {
        var reader = new FileReader();
        console.log(this.files);

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

    $("#btn_remove_image").click(function () {
        $("#thumbnail").val("");
        $("#thumbnail_label").text("Bitte Titelbild auswählen");
        $("#thumbnail_original").val("");
        $("#preview").addClass("d-none");
        $("#preview").removeClass("d-block");
        $("#preview").attr("src","");
    });


    $("#btn_submit").click(function () {

        //xss säuberung
        var input = $("#summernote").summernote("code");
        input = input.replace(/(\b)(on\S+)(\s*)=.*"|javascript|((<\s*)|(&lt;\s*))(\/*)script.*/ig, "");
        $("#summernote").summernote("code", input);

        $("#content_raw").val($($("#summernote").summernote("code")).text());

        if ($('#formid').valid()) {
            setTimeout(function () {
                $("#formid").submit();
            }, 100);
        }



    });

    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200
        });
    });

</script>

