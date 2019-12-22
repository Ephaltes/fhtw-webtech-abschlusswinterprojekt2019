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
        <ul class="d-flex justify-content-center flex-wrap flex-xs-row pt-2">
            <li class="p-3"><a id="random_news_a" class="text-light" href="#">zufällige News</a></li>
           <!-- <li class="p-3"><a class=" text-light" href="">randomNews1</a></li> -->
            <li class="p-3"><a class=" text-light" href="https://cis.technikum-wien.at/cis/index.php">CIS</a></li>
            <li class="p-3"><a class=" text-light" href="https://www.technikum-wien.at/">FHTW</a></li>
            <li class="p-3"><a class=" text-light" href="https://moodle.technikum-wien.at/">Moodle</a></li>
            <li class="p-3"><a class=" text-light" href="">!!!edit</a></li>
            <li class="p-3"><a class=" text-light" href="">!!!edit</a></li>
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
        </ul>
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