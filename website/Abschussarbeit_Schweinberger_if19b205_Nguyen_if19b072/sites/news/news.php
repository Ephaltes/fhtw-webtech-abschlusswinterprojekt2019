<?php
//integrate UserEntity Class
$root = $_SERVER['DOCUMENT_ROOT'];
$dep_inj = "/sites/dependency_include/include_user.php";
$helper = "/helpers/directoryhelper.php";
$validnews = "false";

require_once($root . $dep_inj);
require_once($root . $helper);

use Model\UserModel;
use Helpers\DirectoryHelper;

if (!empty($_SESSION["user"])) {
    if (UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}

libxml_use_internal_errors(TRUE); // no errors on screen
if ($xml = simplexml_load_file("data/news/" . $_GET["news"])) {
    $title = $xml->title;
    $content = $xml->content;
    $content_raw = $xml->content_raw;

    list($day, $month, $year, $hour, $minute, $second) = explode("_", $xml->date);
    $validnews = "true";
}

$images = DirectoryHelper::scan_dir("img/" . $_GET["news"]);
?>

<?php if ($validnews == "true") { ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2">

                <h1 class="mt-2"><?php echo $title; ?></h1>

                <p>
                    Erstellt am <?php echo "$day.$month.$year $hour:$minute"; ?>
                </p>

                <?php
                $j=0;
                if($images != false)
                {?>
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
                                        <img role="img" class="carousel-image" src="img/<?php echo $_GET["news"] . "/" . $image; ?>" alt="<?php echo $xml->title . "Bild_" . $i ; ?>">
                                    </div>
                                    <?php
                                    $i++;
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselwithindicator_<?php echo $j?>" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselwithindicator_<?php echo $j?>" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    <?php
                }
                else
                {?>
                    <img role="img" class="img-fluid" src="img/960x720.png" alt="Card image cap">
                <?php }
                ?>




                <hr>
                <section role="main">
                    <?php echo $content ?>
                </section>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container text-center">
        <h1 class="mb-4"> Sadly we couldnt match any News to the Link you entered</h1>
        <a class ="btn-primary btn-lg" href="index.php">Zurück zur Startseite<a>
                </div>
            <?php } ?>



