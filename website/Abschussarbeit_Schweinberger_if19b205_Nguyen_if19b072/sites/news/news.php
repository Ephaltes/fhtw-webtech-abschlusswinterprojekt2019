<?php
    $xml = simplexml_load_file("data/news/" . base64_decode($_GET["news"]));

    $title = $xml->title;
    $thumbnail = $xml->thumbnail;
    $content = $xml->content;
    $content_raw = $xml->content_raw;

    list($day,$month,$year,$hour,$minute,$second) = explode("_",$xml->date)
    ?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-2">

            <h1 class="mt-2"><?php echo $title; ?></h1>

            <p>
                Erstellt am <?php echo "$day.$month.$year $hour:$minute"; ?>
            </p>

            <img  src="<?php echo $thumbnail; ?>" class="img-fluid rounded mx-auto d-block">
            <hr>
            <?php echo $content ?>
        </div>
    </div>
</div>


