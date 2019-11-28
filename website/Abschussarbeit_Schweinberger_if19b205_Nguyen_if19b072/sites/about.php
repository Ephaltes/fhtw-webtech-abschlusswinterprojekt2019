<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/about-stylesheet.css" type="text/css">

        <title>index.php!</title>
    </head>
    <body style="padding-top:60px;">
        <header>

            <nav class="navbar navbar-dark navbar-expand-md bg-dark fixed-top">
                <img src="../img/342_logo_big_FH_only.png" class="img-fluid " style="height:50px;">

                <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav d-flex flex-wrap align-content-end ml-auto">
                        <li class="nav-item active"><span class="nav-link text-success">Username</span></li> <!--shows name of logged in user -->
                        <li class="nav-item active"><a class="nav-link text-success" href="../index.php">News</a></li>
                        <li class="nav-item active"><a class="nav-link text-success" href="shop.php">Shop</a></li>
                        <li class="nav-item active">
                            <div id="shoppingcart" class="nav-collapse cart-collapse">
                                <ul class="nav pull-right">
                                    <li class="dropdown open">
                                        <a href="" data-toggle="dropdown" class="dropdown-toggle nav-link text-success"><img src="../img/shopping-cart-icon.jpg" alt="shopping-cart-icon" style="width:20px;"></a>

                                        <ul class="dropdown-menu p-2" style="right: 0; left: auto;">
                                            <li class="nav-header">reeeeeeeee</li>
                                            <li>
                                                <span class="">1x</span>
                                                <span class="">Test Product </span>
                                                <span class=""><a class="removefromcart" packageid="4" href="#">x</a>
                                                </span></li>

                                            <li><p>Total:</p></li>

                                            <li><a href="">I wanna buy it daddy</a></li>
                                        </ul>
                                    </li>
                                </ul>
                        </li>


                        <li class="nav-item active"><a class="nav-link text-success" href="">Abmelden</a></li>
                    </ul>
                </div>
            </nav>
            <div class="">
                <div id="quicklinks" class="bg-dark pt-1 pb-1 "> <!-- center this !!!edit-->
                    <ul class="d-flex align-content-start flex-wrap flex-xs-row pt-2">
                        <li class="col-1"><a class=" text-success" href="">randomNews1</a></li>
                        <li class="col-1"><a class=" text-success" href="">randomNews1</a></li>
                        <li class="col-1"><a class=" text-success" href="https://cis.technikum-wien.at/cis/index.php">CIS</a></li>
                        <li class="col-1"><a class=" text-success" href="https://www.technikum-wien.at/">FHTW</a></li>
                        <li class="col-1"><a class=" text-success" href="https://moodle.technikum-wien.at/">Moodle</a></li>
                        <li class="col-1"><a class=" text-success" href="">!!!edit</a></li>
                        <li class="col-1"><a class=" text-success" href="">!!!edit</a></li>
                    </ul>
                </div>
            </div>
        </header>


        <main>
            <div class="container">
                <section id="About">
                    <div class="pt-5 bg-success">
                        <div class="text-center pb-4">
                            <h2 class="">This Website is About the FHTW</h2>
                            <span class="">on this website we offer great and awesome merchendise/NEws about the fhtw</span>
                        </div>
                        <div class="bd-example bg-success d-flex justify-content-center  pb-2">
                            <div id="carouselExampleCaptions" class="carousel slide col-lg-5 col-xs-8" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-intervall="8">
                                        <img src="../img/Teammitglied1.jpg" class="d-block w-100 img-fluid" alt="lukas">
                                        <div class="carousel-caption d-xs-block">
                                            <h5>Lukas Schweinberger</h5>
                                            <p>Author :)</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-intervall="8">
                                        <img src="../img/Teammitglied1.jpg" class="d-block w-100 img-fluid" alt="lam">
                                        <div class="carousel-caption  d-xs-block">
                                            <h5>Lam</h5>
                                            <p>Author :)</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item h-100" data-intervall="false" data-pause="hover">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <video class="w-100 embed-responsive-item"  width="1280" height="720" controls><source src="../img/SampleVideo_1280x720_1mb (2).mp4" type="video/mp4"></video>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                    </div>

                </section>
                <section id="websitenbeschreibung">

                    <p class="bg-success p-5 mb-0"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                        Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer </P>

                </section>
            </div>
        </main>








        <footer class="bg-dark pt-3 pb-3 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo1">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">Social Networks</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li class="pl-3 pr-3 "><a class="text-white" href="https://www.facebook.com" target="_blank">Facebook</a></li>
                            <li class="pl-3 pr-3"><a class="text-white" href="https://www.twitter.com" target="_blank">Twitter</a></li>
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo2">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">Kontact</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li class="pl-3 pr-3"><a class="text-white" href="http://www.technikumwien.at" target="_blank">Webpage</a></li>
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo3">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">Terms of Use</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li class="pl-3 pr-3"><a class="text-white" href="">Copyright</a></li> <!-- Placeholder for Future use -->
                            <li class="pl-3 pr-3"><a class="text-white" href="">Privacy Policy</a></li> <!-- Placeholder for Future use-->
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo4">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">About</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li  class="pl-3 pr-3">Technikum Wien</li>
                            <li  class="pl-3 pr-3">Bachelor of Informatics</li>
                            <li  class="pl-3 pr-3">1200 Wien</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>














        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
