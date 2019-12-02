<?php
if ($xml = simplexml_load_file("data/news/" . base64_decode($_GET["news"]))){
    $title = $xml->title;
    $thumbnail = $xml->thumbnail;
    $content = $xml->content;
    $content_raw = $xml->content_raw;

    list($day, $month, $year, $hour, $minute, $second) = explode("_", $xml->date);
    $validnews="true";
} else {
    $validnews="false";
}
?>

<?php if($validnews=="true"){?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-2">

            <h1 class="mt-2"><?php echo $title; ?></h1>

            <p>
                Erstellt am <?php echo "$day.$month.$year $hour:$minute"; ?>
            </p>

            <?php if (!empty($thumbnail)) {
                ?>
                <img  src="<?php echo $thumbnail; ?>" class="img-fluid rounded mx-auto d-block">
                <?php
            }
            ?>
            <hr>
            <?php echo $content ?>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="container">
    <p> Sadly we couldnt match any news to the Link you entered</p>
        <a href="index.php">go back!<a>
</div>
<?php } ?>



