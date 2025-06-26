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



    <?php if (isset($_GET['status']) && $_GET['status'] === 'success') : ?>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var notyf = new Notyf();
                notyf.success('Connexion reussie.');
            });
        </script>

    <?php endif; ?>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'created') : ?>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var notyf = new Notyf();
                notyf.success('Compte Utilisateur créé avec succès.');
            });
        </script>

    <?php endif; ?>








    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <?php
        include('navbar.php');
        ?>



        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <img src="img/425786765_122111963090196747_8439411231553292887_n.png" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row gy-0 gx-5" style="margin-top: -85px;">
                            <div class="col-lg-0 col-xl-5"></div>
                            <div class="col-xl-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-end">
                                    <h1 class="text-primary text-uppercase fw-bold mb-4">Bienvenue à l'Association Ethnoculturelle des Camerounais du
                                        Grand-Sudbury (AECGS).</h1>
                                    <!-- <h1 class="display-4 text-uppercase text-white mb-4">Unis pour une communauté forte et solidaire</h1> -->
                                    <p class="mb-5 fs-5">
                                        Ensemble, nous bâtissons un espace d'entraide, de partage et de promotion culturelle pour les Camerounais du Grand Sudbury.
                                        Rejoignez-nous dans cette belle aventure !
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                        <!-- <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Découvrir en vidéo</a> -->
                                        <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">En savoir plus</a>
                                    </div>
                                    <!-- <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                <h2 class="text-white me-2">Suivez-nous :</h2>
                                <div class="d-flex justify-content-end ms-2">
                                    <a class="btn btn-md-square btn-light rounded-circle me-2" href="https://www.facebook.com/share/1CuTThBNf5/?mibextid=wwXIfr"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle ms-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <img src="img/476796242_122216537678196747_3619470869414038664_n.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-5" style="margin-top: -85px;">
                            <div class="col-12 animated fadeInUp">
                                <div class="text-center">
                                    <h4 class="text-primary text-uppercase fw-bold mb-4">Rejoignez la famille AECGS</h4>
                                    <h1 class="display-4 text-uppercase text-white mb-4">Une communauté engagée et solidaire</h1>
                                    <p class="mb-5 fs-5">
                                        Notre mission est de rassembler, soutenir et promouvoir les valeurs culturelles camerounaises et canadiennes au sein du Grand Sudbury.
                                        Soyez acteur du changement avec nous !
                                    </p>
                                    <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                        <!-- <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Voir la vidéo</a> -->
                                        <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Découvrir nos actions</a>
                                    </div>
                                    <!-- <div class="d-flex align-items-center justify-content-center">
                                <h2 class="text-white me-2">Suivez-nous :</h2>
                                <div class="d-flex justify-content-end ms-2">
                                    <a class="btn btn-md-square btn-light rounded-circle me-2" href="https://www.facebook.com/share/1CuTThBNf5/?mibextid=wwXIfr"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle ms-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

    </div>
    <!-- Navbar & Hero End -->


    <!-- À Propos Début -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">À Propos de Nous</h4>
                        <h1 class="display-5 mb-4">L'AECGS, un espace de partage, d'entraide et de culture</h1>
                        <p class="mb-4">
                            L’Association Ethnoculturelle des Camerounais du Grand-Sudbury (AECGS) est une organisation à but non lucratif
                            qui vise à promouvoir la solidarité, l'intégration et la richesse culturelle des Camerounais vivant à Sudbury.
                        </p>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-users fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Communauté Unie</h4>
                                        <p>Nous rassemblons les Camerounais de Sudbury pour créer des liens forts et solidaires.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="bi bi-people-fill fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Années d'Engagement</h4>
                                        <p>Depuis plusieurs années, nous soutenons l’intégration et la réussite de nos membres.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">En savoir plus</a>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="d-flex">
                                    <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Contactez-nous</h4>
                                        <p class="mb-0 fs-5" style="letter-spacing: 1px;">+1 705 123 4567</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        <img src="img/472622654_122204637824206950_8946875114983751356_n.jpg" class="img-fluid rounded w-100" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- À Propos Fin -->


    <!-- Services Start -->
    <!-- <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Nos Services</h4>
                <h1 class="display-5 mb-4">Nous offrons des services qui font grandir notre communauté</h1>
                <p class="mb-0">L’AECGS se consacre à la promotion des valeurs camerounaises à travers des services adaptés aux besoins de ses membres. Découvrez nos diverses offres pour soutenir et renforcer notre belle communauté du Grand-Sudbury.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Consultation Stratégique</a>
                            <p class="mb-4">Notre service de consultation stratégique vous aide à définir des actions claires pour le développement de la communauté et l'intégration des nouveaux arrivants. Ensemble, construisons l'avenir!</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-2.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Conseils Financiers</a>
                            <p class="mb-4">Nous proposons des conseils financiers adaptés à la réalité des membres de la communauté, afin de vous aider à mieux gérer vos ressources et à atteindre vos objectifs financiers à long terme.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-3.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Gestion Associative</a>
                            <p class="mb-4">Avec notre expertise en gestion associative, nous vous offrons un accompagnement pour assurer une gestion efficace et pérenne des projets communautaires, contribuant ainsi à la réussite de notre mission collective.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-4.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Optimisation des Approvisionnements</a>
                            <p class="mb-4">Nous aidons à optimiser les approvisionnements pour mieux gérer les ressources locales, en assurant une distribution juste et équitable à tous les membres de la communauté.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-5.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Consultation en Ressources Humaines</a>
                            <p class="mb-4">Nos services de ressources humaines sont conçus pour vous accompagner dans la gestion des talents au sein de votre organisation, garantissant un environnement de travail sain et productif.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-6.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Consultation en Marketing</a>
                            <p class="mb-4">Nous vous aidons à promouvoir efficacement vos projets et événements, en utilisant des stratégies de marketing adaptées à votre cible. Augmentez votre visibilité et impactez positivement la communauté.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Services End -->

    <!-- Features Start -->
    <div class="container-fluid feature pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Nos Objectifs</h4>
                <h1 class="display-5 mb-4">Rassembler, intégrer, promouvoir et soutenir notre communauté.</h1>
                <p class="mb-0">L'Association Ethnoculturelle des Camerounais du Grand-Sudbury œuvre pour créer un environnement d'entraide, de solidarité et de promotion des valeurs culturelles. Découvrez nos objectifs pour un impact plus grand.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-users fa-4x text-primary"></i>
                        </div>
                        <h4>Rassembler la Communauté</h4>
                        <p class="mb-4">Rassembler tous les Camerounaises et Camerounais résidant dans le Grand Sudbury et ses environs dans un esprit de convivialité, de fraternité et d’entraide.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-handshake fa-4x text-primary"></i>
                        </div>
                        <h4>Accompagnement des Nouveaux Arrivants</h4>
                        <p class="mb-4">Accueillir et accompagner les nouveaux arrivants camerounais au Grand Sudbury pour favoriser leur intégration dans la communauté.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-globe-africa fa-4x text-primary"></i>
                        </div>
                        <h4>Promouvoir les Valeurs Culturelles</h4>
                        <p class="mb-4">Promouvoir les valeurs culturelles Camerounaises et canadiennes au sein de la communauté, en créant des ponts entre les cultures.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-users-cog fa-4x text-primary"></i>
                        </div>
                        <h4>Organiser des Activités Communautaires</h4>
                        <p class="mb-4">Organiser des activités culturelles, éducatives et sociales pour échanger et renforcer les liens communautaires entre les membres.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="1.0s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-hand-holding-heart fa-4x text-primary"></i>
                        </div>
                        <h4>Soutien aux Membres</h4>
                        <p class="mb-4">Offrir un soutien moral, financier ou logistique à nos membres en cas de besoin pour renforcer la solidarité au sein de la communauté.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="1.2s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-gavel fa-4x text-primary"></i>
                        </div>
                        <h4>Défense des Droits des Membres</h4>
                        <p class="mb-4">Défendre les droits de nos membres et les représenter auprès des instances locales ou provinciales pour garantir leur bien-être et leurs intérêts.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="1.4s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-clipboard-list fa-4x text-primary"></i>
                        </div>
                        <h4>Accompagnement dans les Projets</h4>
                        <p class="mb-4">Encadrer, conseiller, orienter et accompagner les Camerounais du Grand Sudbury dans la réalisation de leurs projets personnels et professionnels.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Offer Start -->
    <div class="container-fluid offer-section pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Notre Offre</h4>
                <h1 class="display-5 mb-4">Les avantages que nous offrons</h1>
                <p class="mb-0">L'Association Ethnoculturelle des Camerounais du Grand-Sudbury propose des solutions uniques et un accompagnement personnalisé pour les projets de ses membres. Que ce soit dans le domaine culturel, éducatif ou social, nous nous engageons à offrir un soutien optimal à chaque initiative.</p>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="nav nav-pills bg-light rounded p-5">
                        <a class="accordion-link p-4 active mb-4" data-bs-toggle="pill" href="#collapseOne">
                            <h5 class="mb-0">Prêt d'argent pour l'investissement dans vos nouveaux projets</h5>
                        </a>
                        <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseTwo">
                            <h5 class="mb-0">Prêt d'argent pour l'investissement dans vos nouveaux projets</h5>
                        </a>
                        <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseThree">
                            <h5 class="mb-0">Le paiement mobile est plus flexible et facile pour tous les investisseurs</h5>
                        </a>
                        <a class="accordion-link p-4 mb-0" data-bs-toggle="pill" href="#collapseFour">
                            <h5 class="mb-0">Toutes les transactions sont gratuites pour les membres des traders professionnels</h5>
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="tab-content">
                        <div id="collapseOne" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="img/476217013_122216537060196747_8614367071190025563_n.jpg" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Le marché boursier offre une opportunité...</h1>
                                    <p class="mb-4">Le marché boursier fournit une plateforme idéale pour investir et réaliser des projets rentables. Découvrez comment investir intelligemment pour un avenir financier prospère.</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseTwo" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="img/476217013_122216537060196747_8614367071190025563_n.jpg" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Le marché boursier offre une opportunité...</h1>
                                    <p class="mb-4">Le marché boursier fournit une plateforme idéale pour investir et réaliser des projets rentables. Découvrez comment investir intelligemment pour un avenir financier prospère.</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseThree" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="img/476217013_122216537060196747_8614367071190025563_n.jpg" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Le marché boursier offre une opportunité...</h1>
                                    <p class="mb-4">Le marché boursier fournit une plateforme idéale pour investir et réaliser des projets rentables. Découvrez comment investir intelligemment pour un avenir financier prospère.</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseFour" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="img/476217013_122216537060196747_8614367071190025563_n.jpg" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Le marché boursier offre une opportunité...</h1>
                                    <p class="mb-4">Le marché boursier fournit une plateforme idéale pour investir et réaliser des projets rentables. Découvrez comment investir intelligemment pour un avenir financier prospère.</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offer End -->

    <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Evenements</h4>
                <h1 class="display-5 mb-4">Événements Passés & À Venir</h1>
                <p class="mb-0">Découvrez les événements passés qui ont marqué notre communauté et les prochains à venir pour renforcer nos liens et célébrer nos cultures.</p>
            </div>

            <div class="">
                <div class=" wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;padding:10px 0;">
                    <h4 class="text-primary">Evenements passés</h4>
                </div>


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
                                <!--<p class="mb-0">Février 25, 2025</p>-->
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
                                <!--<p class="mb-0">Mars 02, 2024</p>-->
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
                                <!--<p class="mb-0">Decembre 20, 2024</p>-->
                            </div>
                        </div>
                    </div>
                    <!-- Événement 4 -->
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="img/425786765_122111963090196747_8439411231553292887_n.png" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">Élections de la Nouvelle Direction</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Élections pour la Direction AECGS</a>
                        <p class="mb-4">Les élections pour la nouvelle direction de l'AECGS sont ouvertes. Découvrez les candidats et participez à cet événement crucial pour la gestion et le développement de notre association.</p>
                        <div class="d-flex align-items-center">
                            <!-- <img src="img/472622654_122204637824206950_8946875114983751356_n.jpg" class="img-fluid rounded-circle" style="width: 60px; height: 60px;" alt=""> -->
                            <div class="ms-3">
                                <!-- <h5>Admin</h5> -->
                                <!--<p class="mb-0">Janvier 23, 2025</p>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                    <!-- <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Voir la vidéo</a> -->
                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="Evenements">Voir plus</a>
                </div>
            </div>


            <div style="margin-top: 45px;">
                <div class=" wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;padding:10px 0;">
                    <h4 class="text-primary">Evenements à venir</h4>
                </div>


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
                                <!--<p class="mb-0">Juin 25, 2025</p>-->
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
                                <!--<p class="mb-0">Aout 04, 2025</p>-->
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
                                <!--<p class="mb-0">Decembre 28, 2025</p>-->
                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                    <!-- <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Voir la vidéo</a> -->
                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Voir plus</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Blog End -->


    <!-- FAQs Start -->
    <div class="container-fluid faq-section pb-5">
        <div class="container pb-5 overflow-hidden">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">FAQs</h4>
                <h1 class="display-5 mb-4">Questions Fréquemment Posées</h1>
                <p class="mb-0">Nous avons compilé les questions les plus fréquemment posées pour vous aider à mieux comprendre nos événements et l'association. Si vous avez d'autres questions, n'hésitez pas à nous contacter.</p>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="accordion accordion-flush bg-light rounded p-5" id="accordionFlushSection">
                        <div class="accordion-item rounded-top">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Qu'est-ce que l'AECGS ?
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">L'AECGS (Association Ethnoculturelle des Camerounais du Grand-Sudbury) est une organisation à but non lucratif qui vise à rassembler les Camerounais du Grand Sudbury pour promouvoir la convivialité, la fraternité et l'entraide.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Quels types d'événements organisez-vous ?
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">Nous organisons une variété d'événements, allant des activités culturelles, éducatives et sociales, aux événements de soutien moral, financier et logistique pour nos membres.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Comment puis-je participer aux événements ?
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">Pour participer, vous pouvez vous inscrire directement sur notre site Web via la section **Agenda** pour les événements à venir. Vous pouvez également nous contacter pour plus de détails.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    Puis-je devenir membre de l'AECGS ?
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">Oui, l'adhésion est ouverte à tous les Camerounais résidant dans le Grand Sudbury. Vous pouvez remplir un formulaire d'inscription sur notre site pour rejoindre l'association.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    Quel type de soutien offrez-vous ?
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">Nous offrons un soutien moral, financier et logistique pour aider nos membres à s'intégrer dans la communauté et à réaliser leurs projets.</div>
                            </div>
                        </div>
                        <div class="accordion-item rounded-bottom">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                    Comment puis-je contribuer à l'association ?
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">Vous pouvez contribuer en devenant membre, en participant à nos événements, ou en faisant des dons pour soutenir nos activités et initiatives.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded">
                        <img src="img/476589909_122216537072196747_1503253726995860021_n.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQs End -->


    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Notre Équipe</h4>
                <h1 class="display-5 mb-4">Rencontrez Nos Conseillers</h1>
                <p class="mb-0">Notre équipe de conseillers passionnés et engagés œuvre pour soutenir les Camerounais du Grand-Sudbury. Ils travaillent sans relâche pour promouvoir nos valeurs culturelles, accompagner les nouveaux arrivants, et organiser des activités enrichissantes pour la communauté.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/president.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">xxx</h4>
                            <p class="mb-0">Président de l'AECGS</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/vice.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">xxx</h4>
                            <p class="mb-0">Vice-Présidente</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/secretaire.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">xxx</h4>
                            <p class="mb-0">Secrétaire Générale</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/secretaire2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">xx</h4>
                            <p class="mb-0">Secrétaire Adjoint #1</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/adjoint.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">xxx</h4>
                            <p class="mb-0">Secrétaire Adjoint #2</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Témoignages</h4>
                <h1 class="display-5 mb-4">Avis de Nos Membres</h1>
                <p class="mb-0">Découvrez les témoignages inspirants de nos membres qui ont bénéficié de nos programmes et activités. Leur expérience avec l'AECGS démontre notre engagement à favoriser l'intégration, promouvoir la culture camerounaise et soutenir la communauté locale.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                <div class="testimonial-item">
                    <div class="testimonial-quote-left">
                        <i class="fas fa-quote-left fa-2x"></i>
                    </div>
                    <div class="testimonial-img">
                        <img src="img/user.jpeg" class="img-fluid" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p class="mb-0">L'AECGS a été d'une grande aide pour mon intégration à Sudbury. Grâce à leur soutien, j'ai pu rencontrer d'autres Camerounais et participer à des événements qui m'ont permis de me sentir chez moi.</p>
                    </div>
                    <div class="testimonial-title">
                        <div>
                            <h4 class="mb-0">Marlène N.</h4>
                            <p class="mb-0">Membre de l'AECGS</p>
                        </div>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-quote-right">
                        <i class="fas fa-quote-right fa-2x"></i>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-quote-left">
                        <i class="fas fa-quote-left fa-2x"></i>
                    </div>
                    <div class="testimonial-img">
                        <img src="img/user.jpeg" class="img-fluid" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p class="mb-0">Les activités culturelles de l'AECGS m'ont permis de rester connectée avec mes racines tout en m'intégrant facilement à la société canadienne. J'ai rencontré des personnes incroyables et partagé des moments inoubliables.</p>
                    </div>
                    <div class="testimonial-title">
                        <div>
                            <h4 class="mb-0">Yvonne D.</h4>
                            <p class="mb-0">Membre de l'AECGS</p>
                        </div>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-quote-right">
                        <i class="fas fa-quote-right fa-2x"></i>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-quote-left">
                        <i class="fas fa-quote-left fa-2x"></i>
                    </div>
                    <div class="testimonial-img">
                        <img src="img/user.jpeg" class="img-fluid" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p class="mb-0">Je tiens à remercier l'AECGS pour leur soutien moral et logistique. Ils m'ont aidé à surmonter les défis d'être un nouvel arrivant au Canada. Ils m'ont guidée à travers toutes les étapes et m'ont offert un environnement chaleureux.</p>
                    </div>
                    <div class="testimonial-title">
                        <div>
                            <h4 class="mb-0">Charlotte E.</h4>
                            <p class="mb-0">Membre de l'AECGS</p>
                        </div>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-quote-right">
                        <i class="fas fa-quote-right fa-2x"></i>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-quote-left">
                        <i class="fas fa-quote-left fa-2x"></i>
                    </div>
                    <div class="testimonial-img">
                        <img src="img/user.jpeg" class="img-fluid" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p class="mb-0">Les programmes éducatifs de l'AECGS ont été essentiels pour mon développement personnel et professionnel. Grâce à leurs conseils, j'ai pu avancer dans mes projets et mieux comprendre le système canadien.</p>
                    </div>
                    <div class="testimonial-title">
                        <div>
                            <h4 class="mb-0">Jessica N.</h4>
                            <p class="mb-0">Membre de l'AECGS</p>
                        </div>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-quote-right">
                        <i class="fas fa-quote-right fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial End -->

    <?php
    include('footer.php');
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php
    include('script.php');
    ?>
</body>

</html>