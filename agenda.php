<!DOCTYPE html>
<html lang="en">

<?php
include('head.php');
?>

<body>

    <!-- Spinner Start -->
    <?php
    include('spinner.php');
    ?>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <?php
    include('topbar.php');
    ?>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <?php
        include('navbar.php');
        ?>

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Agenda</h4>
                <!-- <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Blog</li>
                </ol> -->
            </div>
        </div>
        <!-- Header End -->
    </div>
    <!-- Navbar & Hero End -->


    <!-- Blog Start -->
    <div class="container-fluid blog pb-5" style="margin-top: 45px;">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Agenda</h4>
                <h1 class="display-5 mb-4">Événements à Venir</h1>
                <p class="mb-0">Découvrez les événements à venir pour renforcer nos liens et célébrer nos cultures.</p>
            </div>




            <div >



                <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                    <!-- Événement 1 -->
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="img/476589909_122216537072196747_1503253726995860021_n.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">Fête de la Culture Camerounaise</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Retour sur la Fête de la Culture Camerounaise</a>
                        <p class="mb-4">L'événement annuel de l'AECGS a célébré la richesse culturelle camerounaise avec des danses, de la musique et des spécialités culinaires. Un grand moment de partage et de convivialité pour tous les membres de la communauté.</p>
                        <div class="d-flex align-items-center">
                            <!-- <img src="img/472622654_122204637824206950_8946875114983751356_n.jpg" class="img-fluid rounded-circle" style="width: 60px; height: 60px;" alt=""> -->
                            <div class="ms-3">
                                <!-- <h5>Admin</h5> -->
                                <p class="mb-0">Juin 25, 2025</p>
                            </div>
                        </div>
                    </div>
                    <!-- Événement 2 -->
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="img/476238040_122216537714196747_3229593490487825661_n.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">Conférence sur l'Intégration des Nouveaux Arrivants</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Séminaire sur l'Intégration au Canada</a>
                        <p class="mb-4">Lors de cet événement, l'AECGS a accueilli de nouveaux arrivants pour une séance d'information et de soutien sur les démarches administratives, l'intégration culturelle et les ressources disponibles à Sudbury.</p>
                        <div class="d-flex align-items-center">
                            <!-- <img src="img/472622654_122204637824206950_8946875114983751356_n.jpg" class="img-fluid rounded-circle" style="width: 60px; height: 60px;" alt=""> -->
                            <div class="ms-3">
                                <!-- <h5>Admin</h5> -->
                                <p class="mb-0">Aout 04, 2025</p>
                            </div>
                        </div>
                    </div>
                    <!-- Événement 3 -->
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="img/476796242_122216537678196747_3619470869414038664_n.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">Atelier de Leadership Féminin</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Empowerment et Leadership des Femmes</a>
                        <p class="mb-4">Un événement marquant dédié à l'autonomisation des femmes de la communauté, avec des intervenantes expertes qui ont partagé leur parcours et donné des outils pour le leadership et l'engagement communautaire.</p>
                        <div class="d-flex align-items-center">
                            <!-- <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle" style="width: 60px; height: 60px;" alt=""> -->
                            <div class="ms-3">
                                <!-- <h5>Admin</h5> -->
                                <p class="mb-0">Decembre 28, 2025</p>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
    <!-- Blog End -->

    <?php
    include('footer.php');
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <?php
    include('script.php');
    ?>
</body>

</html>