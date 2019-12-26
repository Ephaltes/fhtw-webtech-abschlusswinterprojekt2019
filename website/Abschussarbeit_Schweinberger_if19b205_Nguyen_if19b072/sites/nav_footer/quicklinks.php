<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$helper = "/helpers/directoryhelper.php";
require_once($root . $helper);

use Helpers\DirectoryHelper;

$path = $root . "/data/news/";

$files = DirectoryHelper::scan_dir($path)


?>


<section id="quicklinks" class="mt-2">
    <div id="quicklinksdiv" class="bg-dark pb-1 "> <!-- center this !!!edit-->
        <div class="row py-3 mx-0 justify-content-center">
            <div class="col-8 col-lg-auto"><a id="random_news_a" class="text-light" href="#" tabindex="90">zufällige News</a></div>
           <!-- <li class="p-3"><a class=" text-light" href="">randomNews1</a></li> -->
            <div class="col-8 offset-4 offset-lg-0 col-lg-auto"><a class=" text-light" target="_blank" href="https://cis.technikum-wien.at/cis/index.php" tabindex="91">CIS</a></div>
            <div class="col-8 offset-4 offset-lg-0 col-lg-auto "><a class=" text-light" target="_blank" href="https://www.technikum-wien.at/" tabindex="92">FHTW</a></div>
            <div class="col-8  offset-4 offset-lg-0 col-lg-auto "><a class=" text-light" target="_blank" href="https://moodle.technikum-wien.at/" tabindex="93">Moodle</a></div>
            <div class="col-8 offset-4 offset-lg-0 col-lg-auto "><a class=" text-light" target="_blank" href="" tabindex="94">Bedienungsanleitung</a></div>
            <div class="col-8 offset-4 offset-lg-0 col-lg-auto "><a class=" text-light" target="_blank" href="https://facebook.com" tabindex="95">Facebook</a></div>
            <?php
            if ($files != false)
            {
                foreach ($files as $file)
                {
                    ?>
                    <input type="hidden" class="news_random_link" value="<?php echo $file; ?>">
                <?php }

            }
            ?>
        </div>
    </div>
</section>

<script>
    $("#random_news_a").click(function(e){
        let random = Math.floor(Math.random()*($(".news_random_link").length));
        //console.log(random);
        let val = $(".news_random_link").eq(random).val();
        $("#random_news_a").attr("href","/index.php?news="+val);
        $("#random_news_a").click();

    });

</script>