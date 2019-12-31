<?php

//Get the rootpath so that require once can use an absolute path instead of relative one
$root = $_SERVER['DOCUMENT_ROOT'];
$helper = "/helpers/directoryhelper.php";
require_once($root . $helper);

use Helpers\DirectoryHelper;

$path = $root . "/data/news/";

$files = DirectoryHelper::scan_dir($path)
?>


<section id="quicklinks" class="mt-2">
    <div id="quicklinksdiv" class="bg-dark pb-1 " role="group"> <!-- center this !!!edit-->
        <div class="row py-3 mx-0 justify-content-center">
            <div class="col-12 text-center col-lg-auto"><a id="random_news_a" class="text-light" href="#" role="link" tabindex="90">zufällige News</a></div>
            <!-- <li class="p-3"><a class=" text-light" href="">randomNews1</a></li> -->
            <div class="col-12 text-center col-lg-auto "><a class=" text-light" target="_self" role="link" href="index.php?viewme=Anleitung" tabindex="91">Bedienungsanleitung</a></div>
            <div class="col-12 text-center col-lg-auto"><a class=" text-light" target="_blank" role="link" href="https://cis.technikum-wien.at/cis/index.php" tabindex="92">CIS</a></div>
            <div class="col-12 text-center col-lg-auto "><a class=" text-light" target="_blank" role="link" href="https://www.technikum-wien.at/" tabindex="93">FHTW</a></div>
            <div class="col-12 text-center col-lg-auto "><a class=" text-light" target="_blank" role="link" href="https://moodle.technikum-wien.at/" tabindex="94">Moodle</a></div>

            <div class="col-12  text-center col-lg-auto "><a class=" text-light" target="_blank" role="link" href="https://facebook.com" tabindex="95">Facebook</a></div>
<?php
if ($files != false) {
    foreach ($files as $file) {
        ?>
                    <input type="hidden" class="news_random_link" value="<?php echo $file; ?>">
                <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<script>
    <?php //Randomly use one of the hidden input to get to an random article ?>
    $("#random_news_a").click(function (e) {
        let random = Math.floor(Math.random() * ($(".news_random_link").length));
        //console.log(random);
        let val = $(".news_random_link").eq(random).val();
        $("#random_news_a").attr("href", "/index.php?news=" + val);
        $("#random_news_a").click();

    });

</script>