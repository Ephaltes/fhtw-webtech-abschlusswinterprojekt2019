<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$helper = "/helpers/directoryhelper.php";

require_once($root . $helper);

use Helpers\DirectoryHelper;

$newspath = "/data/news/";

$files = DirectoryHelper::scan_dir_for_news($root . $newspath);

?>
<div class="container-fluid">
    <div class="h1 text-center">
        News
    </div>
<div class="row">

<?php
$j = 0;

if($files != false)
{
foreach ($files as $file) {
    $xml = simplexml_load_file("data/news/" . $file);
    $link = $file;
    $format = "d_m_y_G_i_s";
    $dateobject = DateTime::createFromFormat($format,$xml->date);
    $diff = date_diff(new DateTime("now"),$dateobject);
    //echo var_dump($diff);

    $images = DirectoryHelper::scan_dir("img/" . $file);

    ?>

    <div class="col-lg-4 col-md-6 col-12">
    <div class="card p-1 m-1">
        <a tabindex="-1" href="index.php?news=<?php echo $link; ?>" class="stretched-link"></a>
            <?php if($images != false)
            {?>
                <div class="card-img-top">
                <div id="carouselwithindicator_<?php echo $j?>" class="carousel slide bg-dark" data-ride="carousel">
                    <ol class="carousel-indicators">

                        <?php
                        $i=0;
                        foreach($images as $image)
                            { ?>
                                <li data-target="#carouselwithindicator_<?php echo $j?>" data-slide-to="<?php $i ?>" <?php if($i==0) echo "class='active'"; ?> ></li>
                            <?php
                                $i++;
                            }
                        ?>

                    </ol>
                    <div class="carousel-inner">

                        <?php
                        $i=0;
                        foreach($images as $image)
                        { ?>
                            <div class="carousel-item <?php if($i==0) echo "active"; ?> text-center">
                                <img class="carousel-image" src="img/<?php echo $file . "/" . $image; ?>" alt="<?php echo $xml->title . "Bild_" . $i ; ?>">
                            </div>
                            <?php
                            $i++;
                        }
                        ?>

                    </div>
                    <a tabindex="-1" class="carousel-control-prev" href="#carouselwithindicator_<?php echo $j?>" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a tabindex="-1" class="carousel-control-next" href="#carouselwithindicator_<?php echo $j?>" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
                <?php
            }
            else
            {?>
                <img class="card-img-top" src="img/960x720.png" alt="Card image cap">
            <?php }
            ?>
        <div class="card-body">
            <a tabindex="25" class="text-dark" href="index.php?news=<?php echo $link; ?>"><h5 class="card-title"><?php echo $xml->title ?></h5></a>
            <p class="card-text"> <?php echo $xml->content_raw ?></p>
            <p class="card-text"><small class="text-muted"><?php
                    if($diff->y > 0)
                        {
                            if ($diff->m > 0)
                            {
                                echo "Erstellt vor $diff->y Jahren und $diff->m Monaten";
                            }
                            else
                                echo "Erstellt vor $diff->y Jahren";
                        }
                    else if ($diff->m > 0)
                    {
                        if ($diff->d > 0)
                        {
                            echo "Erstellt vor $diff->m Monaten und $diff->d Tagen";
                        }
                        else
                            echo "Erstellt vor $diff->m Monaten";
                    }
                    else if ($diff->d > 0)
                    {
                        if ($diff->h > 0)
                        {
                            echo "Erstellt vor $diff->d Tagen und $diff->h Stunden";
                        }
                        else
                            echo "Erstellt vor $diff->d Tagen";
                    }
                    else if ($diff->h > 0)
                    {
                        if ($diff->i > 0)
                        {
                            echo "Erstellt vor $diff->h Stunden und $diff->i Minuten";
                        }
                        else
                            echo "Erstellt vor $diff->h Stunden";
                    }
                    else if($diff->i >0)
                    {
                            echo "Erstellt vor $diff->i Minuten";
                    }
                    else
                        echo "gerade erstellt";

                    ?></small></p>
        </div>
    </div>
    </div>

<?php
$j++;
} }?>
</div>
</div>

<script>
    $( document ).ready(function() {

        setTimeout(function(){
            $(".carousel").carousel("pause");
            console.log("ready");
        }, 2000);

    });

</script>