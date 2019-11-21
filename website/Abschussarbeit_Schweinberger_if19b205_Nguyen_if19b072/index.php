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
    <body style="padding-top:100px;">
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

                        <div> <!-- misserable attempts on making a shopping cart-->
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Warenkorb" aria-expanded="false" aria-controls="Warenkorb" style="">
                                <img src="nondynamicdata/img/shopping-cart-icon.jpg" clas="img-fluid" style="height:50px; width:50px;">
                            </button>
                            </p>
                            <div class="collapse" id="Warenkorb" >
                                <div class="card card-body">
                                    Shoopingkart?
                                </div>
                            </div>
                        </div>
                        <li class="nav-item active"><a class="nav-link text-success" href="">Anmelden</a></li> <!-- anmelden or abmelden shown depending on login status -->
                        <li class="nav-item active"><a class="nav-link text-success" href="">Abmelden</a></li>
                    </ul>
                </div>
            </nav>
            <div id="quicklinks" class="bg-dark pt-1 pb-1 row border-bottom"> <!-- center this !!!edit--><
                <a class="nav-link text-success" href="">News1</a>
                <a class="nav-link text-success" href="">News1</a>
                <a class="nav-link text-success" href="">CIS</a>
                <a class="nav-link text-success" href="">FHTW</a> 
                <a class="nav-link text-success" href="">Moodle</a>
                <a class="nav-link text-success" href="">!!!edit</a>
                <a class="nav-link text-success" href="">!!!edit</a>
            </div>
        </header>
        <main>
            <section id="About">
                <div>

                    <div class="text-center bg-success pb-2 pt-2">
                        <h2 class="">This Website is About the FHTW</h2>
                        <span class="">on this website we offer great and awesome merchendise/NEws about the fhtw</span>
                    </div>
                    <div class="bd-example bg-success d-flex justify-content-center  pb-2">
                        <div id="carouselExampleCaptions" class="carousel slide col-5" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-intervall="8">
                                    <img src="nondynamicdata/img/teammitglied1.jpg" class="d-block w-100 img-fluid" alt="lukas">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Lukas Schweinberger</h5>
                                        <p>Author :)</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-intervall="8">
                                    <img src="nondynamicdata/img/teammitglied1.jpg" class="d-block w-100 img-fluid" alt="lam">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Lam</h5>
                                        <p>Author :)</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-intervall="false">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
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
        </main>























        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
