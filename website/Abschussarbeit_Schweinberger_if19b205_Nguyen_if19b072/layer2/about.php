<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="nondynamicdata/css/index-stylesheet.css" type="text/css">

        <title>index.php!</title>
    </head>
    <body style="padding-top:76px;">
        <header>

            <nav class="navbar navbar-dark navbar-expand-md bg-dark fixed-top border-bottom">
                <img src="nondynamicdata/img/342_logo_big_FH_only.png" class="img-fluid " style="height:50px;">

                <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav d-flex flex-wrap align-content-end ml-auto">
                        <li class="nav-item active"><span class="nav-link text-success">Username</span></li> <!--shows name of logged in user -->
                        <li class="nav-item active"><a class="nav-link text-success" href="">News</a></li>
                        <li class="nav-item active"><a class="nav-link text-success" href="">About</a></li>
                        <li class="nav-item active"><a class="nav-link text-success" href="">Shop</a></li>

                        <div class="btn-group">
                            <button type="button" class="btn px-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <img src="nondynamicdata/img/shopping-cart-icon.jpg" class="img-fluid" style="width:50px;">
                            </button>
                            <div class="dropdown-menu">
                                <p class="dropdown-item">5xcap</p>
                                <p class="dropdown-item">2xhat</p>
                                <p class="dropdown-item">1xusb</p>
                                <div class="dropdown-divider"></div>
                                <p class="dropdown-item">Price:</p>
                            </div>
                        </div>
                        <li class="nav-item active"><a class="nav-link text-success" href="">Anmelden</a></li> <!-- anmelden or abmelden shown depending on login status -->
                        <li class="nav-item active"><a class="nav-link text-success" href="">Abmelden</a></li>
                    </ul>
                </div>
            </nav>
            <div class="">
                <div id="quicklinks" class="bg-dark pt-1 pb-1 border-bottom "> <!-- center this !!!edit-->
                    <ul class="d-flex align-content-start flex-wrap flex-xs-row ">
                        <li class="col-1"><a class=" text-success" href="">News1</a></li>
                        <li class="col-1"><a class=" text-success" href="">News1</a></li>
                        <li class="col-1"><a class=" text-success" href="">CIS</a></li>
                        <li class="col-1"><a class=" text-success" href="">FHTW</a></li>
                        <li class="col-1"><a class=" text-success" href="">Moodle</a></li>
                        <li class="col-1"><a class=" text-success" href="">!!!edit</a></li>
                        <li class="col-1"><a class=" text-success" href="">!!!edit</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            <section id="About">
                <div class="container">
                    <div class="text-center bg-success pb-2 pt-2">
                        <h2 class="">This Website is About the FHTW</h2>
                        <span class="">on this website we offer great and awesome merchendise/NEws about the fhtw</span>
                    </div>
                    <div class="bd-example bg-success d-flex justify-content-center  pb-2" style="height:500px;">
                        <div id="carouselExampleCaptions" class="carousel slide col-5" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-intervall="8">
                                    <img src="nondynamicdata/img/teammitglied1.jpg" class="d-block w-100" alt="lukas">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Lukas Schweinberger</h5>
                                        <p>Author :)</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-intervall="8">
                                    <img src="nondynamicdata/img/teammitglied1.jpg" class="d-block w-100" alt="lam">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Lam</h5>
                                        <p>Author :)</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-intervall="false">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="w-100 embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
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
                <div class="container">
                    <p class="bg-success p-3 mb-0"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                        Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer </P>
                </div>
            </section>
        </main>








        <footer class="bg-dark pt-3 pb-3 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo1">
                        <h4 class="pl-3 mb-0 pb-2 font-weight-bold">Social Networks</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column">
                            <li class="pl-3 pr-3 "><a class="text-white" href="https://www.facebook.com" target="_blank">Facebook</a></li>
                            <li class="pl-3 pr-3"><a class="text-white" href="https://www.twitter.com" target="_blank">Twitter</a></li>
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo2">
                        <h4 class="pl-3 mb-0 pb-2 font-weight-bold">Kontact</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column">
                            <li><a href="">Austria, 2130 Mistelbach, Holzweg1 </a></li>
                            <li class="pl-3 pr-3"><a class="text-white" href="http://www.technikumwien.at" target="_blank">Webpage</a></li>
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo3">
                        <h4 class="pl-3 mb-0 pb-2 font-weight-bold">Terms of Use</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column ">
                            <li class="pl-3 pr-3"><a class="text-white" href="">Copyright</a></li> <!-- Placeholder for Future use -->
                            <li class="pl-3 pr-3"><a class="text-white" href="">Privacy Policy</a></li> <!-- Placeholder for Future use-->
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo4">
                        <h4 class="pl-3 mb-0 pb-2 font-weight-bold">About</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column">
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
