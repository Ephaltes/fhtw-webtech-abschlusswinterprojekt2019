<?php

function scan_dir($dir)
{
    $ignored = array('.', '..', '.svn', '.htaccess','ids');

    $files = array();
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored)) continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }

    arsort($files);
    $files = array_keys($files);

    return ($files) ? $files : false;
}

$files = scan_dir("data/news/");

?>
<div class="container-fluid">
<div class="row">

<?php
foreach ($files as $file) {
    $xml = simplexml_load_file("data/news/" . $file);

    $link = base64_encode($file);
    $format = "d_m_y_G_i_s";
    $dateobject = DateTime::createFromFormat($format,$xml->date);
    $diff = date_diff(new DateTime("now"),$dateobject);
    //echo var_dump($diff);

    ?>

    <div class="col-lg-4 col-md-6 col-12">
    <div class="card p-1 m-1">
        <a href="index.php?news=<?php echo $link; ?>" class="text-dark text-decoration-none">
            <?php if(!empty($xml->thumbnail))
            {?>
                <img class="card-img-top" src="<?php echo $xml->thumbnail ?>" alt="Card image cap">
                <?php
            }
            ?>
        <div class="card-body">
            <h5 class="card-title"><?php echo $xml->title ?></h5>
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
        </a>
    </div>
    </div>

<?php } ?>
</div>
</div>