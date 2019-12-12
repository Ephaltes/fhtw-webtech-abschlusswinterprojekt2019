<!-- Container (About Section) -->

<div class="container">
    <h2>Unsere Vision</h2>
    <hr>
    <div>
        Als Schüler des FH-Technikum Wiens
        streben wir an, dass Studium in Mindestzeit mit den
        best möglichen Erfolg abzuschließen.
        Wir lieben das FH-Technikum
    </div>
</div>

<div class="container mt-2 mt-lg-5">
    <div class="embed-responsive-16by9 embed-responsive">
        <video class="" controls>
            <source src="img/samplevideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

<div class="container mt-5 ">
    <div>
        <h2>Das Team</h2>
        <hr>

        <div>
            Wir sind ein seit Jahren eingespieltes Team und sind auf alles Vorbereitet.
        </div>
    </div>
</div>

<div class="container mt-5 mb-5 ">
    <div id="carouselwithindicator" class="carousel slide bg-dark" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselwithindicator" data-slide-to="0" class="active"></li>
            <li data-target="#carouselwithindicator" data-slide-to="1"></li>
            <li data-target="#carouselwithindicator" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active text-center">
                <img class="carousel-image" src="img/Teammitglied1.jpg" alt="First slide">
                <div class="carousel-caption d-none">
                    Das bin ich, Lukas , mit meiner Bananne
                </div>
            </div>
            <div class="carousel-item text-center">
                <img class="carousel-image img-fluid" src="img/Teammitglied2.jpg" alt="Second slide">
                <div class="carousel-caption d-none text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Augue neque gravida in fermentum et sollicitudin ac orci. Amet risus nullam
                    eget felis eget nunc. Ut tristique et egestas quis ipsum suspendisse ultrices gravida dictum. Varius
                    quam quisque id diam vel quam elementum pulvinar. Volutpat consequat mauris nunc congue nisi vitae
                    suscipit tellus. Amet risus nullam eget felis. Diam ut venenatis tellus in metus vulputate eu. Hac
                    habitasse platea dictumst vestibulum rhoncus est. Nec sagittis aliquam malesuada bibendum arcu vitae
                    elementum curabitur. Tellus pellentesque eu tincidunt tortor. Pellentesque eu tincidunt tortor
                    aliquam. Hendrerit gravida rutrum quisque non tellus orci. Aliquam nulla facilisi cras fermentum
                    odio eu feugiat pretium nibh. Facilisis gravida neque convallis a cras semper. Amet facilisis magna
                    etiam tempor orci eu lobortis elementum nibh. Molestie nunc non blandit massa enim. Amet justo donec
                    enim diam vulputate. Potenti nullam ac tortor vitae purus faucibus.
                </div>
            </div>
            <div class="carousel-item text-center">
                <img class="carousel-image img-fluid" src="img/Teammitglied1.jpg" alt="Third slide">
                <div class="carousel-caption d-none text-white">
                    Me number 2
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselwithindicator" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselwithindicator" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="new-caption-area text-center mt-3 mt-lg-5">

    </div>

</div>

<script>
    $('.carousel').carousel({
        interval: 1000 * 5
    });
    var caption = $('div.carousel-item:nth-child(1) .carousel-caption');
    $('.new-caption-area').html(caption.html());

    $(".carousel").on('slide.bs.carousel', function (e) {
        var caption = $('div.carousel-item:nth-child(' + ($(e.relatedTarget).index() + 1) + ') .carousel-caption');
        $('.new-caption-area').html(caption.html());
    });

</script>