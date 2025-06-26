<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>

    <!-- Spinner -->
    <?php include('spinner.php'); ?>

    <!-- Topbar -->
    <?php include('topbar.php'); ?>

    <!-- Navbar & Hero -->
    <div class="container-fluid position-relative p-0">
        <?php include('navbar.php'); ?>

        <!-- Header -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Événements</h4>
            </div>
        </div>
    </div>

    <!-- Galerie des Élections en Carousel -->
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h2><a href="list_detail.php">Galerie des Élections 2025</a></h2>
        </div>

        <div id="carouselGalerie" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="img/1.jpg" class="d-block w-100 carousel-image" alt="Image 1">
                </div>

                <!-- Slide 2 à 12 -->
                <?php
                for ($i = 2; $i <= 12; $i++) {
                    echo '
                <div class="carousel-item">
                    <img src="img/' . $i . '.jpg" class="d-block w-100 carousel-image" alt="Image ' . $i . '">
                </div>';
                }
                ?>
            </div>

            <!-- Contrôles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselGalerie" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselGalerie" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>

            <!-- Indicateurs -->
            <div class="carousel-indicators">
                <?php
                for ($i = 0; $i < 12; $i++) {
                    echo '<button type="button" data-bs-target="#carouselGalerie" data-bs-slide-to="' . $i . '" ' . ($i === 0 ? 'class="active" aria-current="true"' : '') . ' aria-label="Image ' . ($i + 1) . '"></button>';
                }
                ?>
            </div>
        </div>
    </div>


    <!-- Événements Passés -->
    <div class="container-fluid blog pb-5" style="margin-top: 45px;">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Événements</h4>
                <h1 class="display-5 mb-4">Événements Passés</h1>
                <p class="mb-0">Découvrez les événements passés qui ont marqué notre communauté.</p>
            </div>

            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">

                <!-- Événement 1 -->
                <div class="blog-item p-4">
                    <div class="blog-img mb-4">
                        <img src="img/476589909_122216537072196747_1503253726995860021_n.jpg" class="img-fluid w-100 rounded" alt="">
                        <div class="blog-title"><a href="#" class="btn">Fête de la Culture Camerounaise</a></div>
                    </div>
                    <a href="#" class="h4 d-inline-block mb-3">Retour sur la Fête de la Culture Camerounaise</a>
                    <p class="mb-4">L'événement annuel de l'AECGS a célébré la richesse culturelle camerounaise avec des danses, de la musique et des spécialités culinaires.</p>
                    <p class="mb-0"><strong>Février 25, 2025</strong></p>
                </div>

                <!-- Événement 2 -->
                <div class="blog-item p-4">
                    <div class="blog-img mb-4">
                        <img src="img/476238040_122216537714196747_3229593490487825661_n.jpg" class="img-fluid w-100 rounded" alt="">
                        <div class="blog-title"><a href="#" class="btn">Conférence Nouveaux Arrivants</a></div>
                    </div>
                    <a href="#" class="h4 d-inline-block mb-3">Séminaire sur l'Intégration au Canada</a>
                    <p class="mb-4">L'AECGS a accueilli de nouveaux arrivants pour une séance d'information sur les démarches, la culture et les ressources locales.</p>
                    <p class="mb-0"><strong>Mars 02, 2024</strong></p>
                </div>

                <!-- Événement 3 -->
                <div class="blog-item p-4">
                    <div class="blog-img mb-4">
                        <img src="img/476796242_122216537678196747_3619470869414038664_n.jpg" class="img-fluid w-100 rounded" alt="">
                        <div class="blog-title"><a href="#" class="btn">Leadership Féminin</a></div>
                    </div>
                    <a href="#" class="h4 d-inline-block mb-3">Empowerment et Leadership des Femmes</a>
                    <p class="mb-4">Un événement marquant dédié à l'autonomisation des femmes avec des intervenantes inspirantes et engagées.</p>
                    <p class="mb-0"><strong>Décembre 20, 2024</strong></p>
                </div>

                <!-- Événement 4 -->
                <div class="blog-item p-4">
                    <div class="blog-img mb-4">
                        <img src="img/425786765_122111963090196747_8439411231553292887_n.png" class="img-fluid w-100 rounded" alt="">
                        <div class="blog-title"><a href="#" class="btn">Élections AECGS</a></div>
                    </div>
                    <a href="#" class="h4 d-inline-block mb-3">Élections de la Nouvelle Direction</a>
                    <p class="mb-4">Les élections de la nouvelle direction de l'AECGS sont ouvertes. Impliquez-vous dans la vie associative de notre communauté.</p>
                    <p class="mb-0"><strong>Janvier 23, 2025</strong></p>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- Scripts -->
    <?php include('script.php'); ?>

</body>

</html>