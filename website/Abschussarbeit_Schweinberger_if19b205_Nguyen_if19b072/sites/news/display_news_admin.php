<?php
//integrate UserEntity Class
$root = $_SERVER['DOCUMENT_ROOT'];
$dep_inj = "/sites/dependency_include/include_user.php";
$helper = "/helpers/directoryhelper.php";

require_once($root . $helper);
require_once($root . $dep_inj);

use Model\UserModel;

if (!empty($_SESSION["user"])) {
    if (UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}

if ($user->usertype != 'admin') {
    header('location: /');
}

use Helpers\DirectoryHelper;

$newspath = "/data/news/";

$files = DirectoryHelper::scan_dir_for_news($root . $newspath);
?>


<section class="container">

    <a class="btn btn-primary float-right mb-2" role="button" tabindex="10" href="news_admin.php?menu=create">News erstellen</a>
    <div class="table-responsive">
        <table class="table table-white border" role="table">
            <thead>
                <tr>
                    <th role="columnheader" class="col-lg-auto">
                        Artikel
                    </th>
                    <th role="columnheader" class="col-lg-auto">
                        Datum
                    </th>
                    <th role="columnheader" class="col-lg-auto">
                        Zeit
                    </th>
                    <th role="columnheader" class="col-lg-auto">
                        Aktionen
                    </th>
                </tr>
            </thead>

            <?php
            if ($files == null)
                return;
            $tabindex = 11;
            foreach ($files as $file) {
                $xml = simplexml_load_file("data/news/" . $file);

                $link = ($file);
                $format = "d_m_y_G_i_s";
                $dateobject = DateTime::createFromFormat($format, $xml->date);
                $diff = date_diff(new DateTime("now"), $dateobject);
                //echo var_dump();
                ?>
                <tr>
                    <td class="col-lg-auto">
                        <?php echo "$xml->title"; ?>
                    </td>
                    <td class="col-lg-auto">
                        <?php echo date_format($dateobject, "d.m.y"); ?>
                    </td>
                    <td class="col-lg-auto">
                        <?php echo date_format($dateobject, "G:i:s"); ?>
                    </td>
                    <td class="col-lg-auto text-nowrap">

                        <a  role="link" tabindex="<?php echo $tabindex;
                    $tabindex++;
                        ?>" aria-label="visit the news" class="p-2" href="index.php?news=<?php echo $link ?>">
                            <i  class="fas fa-eye text-dark"  aria-hidden="false" ></i>
                        </a>


                        <a  role="link" tabindex="<?php echo $tabindex;
                        $tabindex++;
                        ?>" aria-label="edit news" href="news_admin.php?edit=<?php echo $link; ?>" class="ml-1 p-2">
                            <i   class="fas fa-edit text-dark"  aria-hidden="false"></i>
                        </a>

                        <form role="form" method="POST" action="sites/news/deletenews.php" name="<?php echo $xml->title ?>" class="d-inline">
                            <a  role="link" tabindex="<?php echo $tabindex;
                            $tabindex++;
                            ?>" aria-label="remove news" class="ml-1 admin_action_delete p-2"  href="#">
                                <i  class="fas fa-trash text-dark" aria-hidden="false" ></i>
                                <input type="hidden" name="file_name" class="invisible" value="<?php echo $file ?>">
                            </a>
                        </form>

                    </td>
                </tr>

<?php }
?>
        </table>
    </div>
</section>

<script>
    $(document).on("click", ".admin_action_delete", function (e) {
        //console.log( $(this).closest("form").attr("name"));
        if (confirm("Wollen Sie wirklich den Artikel \"" + $(this).closest("form").attr("name") + "\" l??schen?"))
        {
            $(this).closest("form").submit();
        }
    });
</script>