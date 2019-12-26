<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$helper = "/helpers/directoryhelper.php";
$userentity = "/Entities/UserEntity.php";

require_once($root . $userentity);
require_once($root . $helper);

use Helpers\DirectoryHelper;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_COOKIE['USERHASH']) && empty($_SESSION["user"])) {
    header('location: sites/logincheck.php');
}

if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

$thumbnails = false;
if (!empty($_GET["edit"])) {
    $filename = ($_GET["edit"]);
    $xml = simplexml_load_file("data/news/" . $filename);

    $thumbnails = DirectoryHelper::scan_dir("img/$filename/");
}
?>

<head>
    <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css">
</head>


<form method="POST" id="formid" role="form" action="/sites/news/savenewstofile.php" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="row">
                    <h1 class="col">News erstellen</h1>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label>Überschrift der News: </label>
                        <input tabindex="10" class="form-control" type="title"
                               name="title" <?php if (!empty($xml->title)) echo "value='$xml->title'"; ?> >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">

                        <div class="input-group">
                            <div class="custom-file ">
                                <input tabindex="12" type="file" class="custom-file-input " accept="image/*"
                                       id="thumbnail" multiple>
                                <label id="thumbnail_label" class="custom-file-label form-check-label overflow-hidden"
                                       for="thumbnail">  <?php if ($thumbnails !=false) echo "Derzeitiges TitelBild";
                                    else echo "Bitte Titelbild auswählen"; ?>
                                </label>
                            </div>
                            <div tabindex="13" id="btn_remove_image" class="input-group-append cursor-pointer">
                                <span class="input-group-text">Delete</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-12">
                        <div id="carouselwithindicator" class="carousel slide bg-dark" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                if($thumbnails != false)
                                {
                                    $i=0;
                                    foreach($thumbnails as $img) {
                                        ?>
                                        <li data-target="#carouselwithindicator" data-slide-to="<?php echo $i; ?>" <?php if($i==0) echo "class='active'"; ?>
                                            id = "carousel-listElement-<?php echo $i; ?>"
                                        ></li>
                                        <?php
                                        $i++;
                                    }
                                }

                                ?>



                            </ol>
                            <div class="carousel-inner">

                                <?php
                                if($thumbnails != false)
                                {
                                    $i=0;
                                    foreach($thumbnails as $img) {
                                        $data = file_get_contents("img/$filename/$img");
                                        $data64 = base64_encode($data);
                                        $mimetype = mime_content_type("img/$filename/$img");
                                        $base64encoded = "data:$mimetype;base64,$data64";
                                        ?>
                                        <div class="carousel-item <?php if($i==0) echo "active"; ?> text-center" id="carousel-divElement-<?php echo $i; ?>">
                                            <img class="carousel-image" src="<?php echo $base64encoded ?>" alt="uploaded image <?php echo $i; ?>">
                                            <div class="carousel-caption d-none">
                                                <?php echo $i; ?>
                                            </div>
                                        </div>

                                        <?php
                                        $i++;
                                    }
                                }

                                ?>


                            </div>
                            <a class="carousel-control-prev" href="#carouselwithindicator" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselwithindicator" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <textarea id="content_raw" name="content_raw" class="invisible"></textarea>
                <textarea tabindex="14" id="summernote"
                          name="content"><?php if (!empty($xml->content)) echo $xml->content; ?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input tabindex="15" type="button" id="btn_submit" class="btn btn-primary"
                       value=" <?php if (!empty($filename)) echo "Änderungen speichern"; else echo "News erstellen"; ?>">
            </div>
            <input type="hidden" name="edit_filename" class="invisible"
                   value="<?php if (!empty($filename)) echo $filename; ?>">
        </div>
    </div>

    <div id="ImageToUpload">
<?php
    if($thumbnails != false)
    {
        $i=0;
        foreach($thumbnails as $img) {
            $data = file_get_contents("img/$filename/$img");
            $data64 = base64_encode($data);
            $mimetype = mime_content_type("img/$filename/$img");
            $base64encoded = "data:$mimetype;base64,$data64";
            ?>
            <input type="hidden" name="thumbnail[<?php echo $i; ?>]"
                   id="thumbnail[<?php echo $i; ?>]"  value="<?php echo $base64encoded ?>">
            <?php
            $i++;
        }
    }

    ?>
    </div>
</form>

<div class="new-caption-area d-none">

</div>

<script src="vendor/summernote/summernote-bs4.js"></script>

<script src="vendor/jquery_validation/jquery.validate.js"></script>
<script src="vendor/jquery_validation/additional-methods.js"></script>
<script src="vendor/jquery_validation/localization/messages_de.js"></script>
<script src="js/site.js"></script>

<script>

    var rules={
        'title': {
            required: true,
                pattern: "((?![<>]).)+"
        },
        'content_raw': {
            required: true
        }
    };

    var messages= {
        'title': {
            required: 'Titel fehlt'
        },
        'content_raw': {
            required: 'Text fehlt'
        }
    };

    Validation.InitValidation("#formid",".form-group > div",rules,messages);

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


    $('input[type="file"]').change(function (e) {

        emptyCarousel();
        imagesPreviewToCarousel(this);

        $('.carousel-item').first().addClass('active');
        $('.carousel-indicators > li').first().addClass('active');

        $('.carousel').carousel("pause");



    });

    var oldid=null;
    $("#btn_remove_image").click(function () {


       let id =  $('.new-caption-area').html().trim();
       if(!id)
            return;

       oldid=id;

        $("#carousel-listElement-" + id).remove();
        $("#carousel-divElement-" + id).remove();
        $("#thumbnail\\["+id+"\\]").remove();
        console.log("removed");

        $('.carousel-item').first().addClass('active');
        $('.carousel-indicators > li').first().addClass('active');

        var caption = $('div.carousel-item:nth-child(1) .carousel-caption');
        $('.new-caption-area').html(caption.html());

        id =  $('.new-caption-area').html().trim();

        if(oldid===id)
        {
            console.log("deleteall");
            $("#thumbnail").val("");
            $("#thumbnail_label").text("");
            $('.new-caption-area').text("");
        }


    });


    $("#btn_submit").click(function () {

        //xss säuberung
        var input = $("#summernote").summernote("code");
        input = input.replace(/(\b)(on\S+)(\s*)=.*"|javascript|((<\s*)|(&lt;\s*))(\/*)script.*/ig, "");
        $("#summernote").summernote("code", input);

        $("#content_raw").val($($("#summernote").summernote("code")).text());

        if ($('#formid').valid()) {
            setTimeout(function () {
                $("#thumbnail").attr("disabled", true);
                $("#formid").submit();
            }, 100);
        }


    });

    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200
        });

        var caption = $('div.carousel-item:nth-child(1) .carousel-caption');
        $('.new-caption-area').html(caption.html());
    });


    var imagesPreviewToCarousel = function (input) {

        if (input.files) {
            var filesAmount = input.files.length;

            let j=$(".carousel-indicators").children().length;
            console.log(j);
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                let k=i+j;

                reader.onload = function (event) {

                    let imageElement = $("<img>", {
                        class: "carousel-image",
                        src: event.target.result,
                        alt: "uploaded image " + j
                    });

                    let captionElement = $("<div>", {
                        class: "carousel-caption d-none",
                        html:  j
                    });

                    let hiddenElement = $("<input>", {
                        type: "hidden",
                        name: "thumbnail[" + j +"]",
                        id:"thumbnail[" + j +"]",
                        value: event.target.result
                    });

                    $("#carousel-divElement-" + j).append(imageElement);
                    $("#carousel-divElement-" + j).append(captionElement);
                    $("#ImageToUpload").append(hiddenElement);
                    console.log("onload inside function");

                    if(j==0)
                    {
                        var caption = $('div.carousel-item:nth-child(1) .carousel-caption');
                        $('.new-caption-area').html(caption.html());
                    }

                    j++;
                    //$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                let listElement = $("<li>", {
                    'data-target': "#carouselwithindicator",
                    'data-slide-to': k,
                    id: "carousel-listElement-" + k
                });

                let divElement = $("<div>", {
                    class: "carousel-item text-center",
                    id: "carousel-divElement-" + k
                });



                $(".carousel-indicators").append(listElement);
                $(".carousel-inner").append(divElement);

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    var emptyCarousel = function(){
        $(".carousel-indicators").empty();
        $(".carousel-inner").empty();
    };

    var caption = $('div.carousel-item:nth-child(1) .carousel-caption');
    $('.new-caption-area').html(caption.html());

    $(".carousel").on('slide.bs.carousel', function (e) {
        var caption = $('div.carousel-item:nth-child(' + ($(e.relatedTarget).index() + 1) + ') .carousel-caption');
        $('.new-caption-area').html(caption.html());
    });
</script>

