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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">A propos de nous</h4>
                <!-- <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active text-primary">About</li>
                    </ol>     -->
            </div>
        </div>
        <!-- Header End -->
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
                            <img src="img/user.jpeg" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">xxxx</h4>
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
                            <img src="img/user.jpeg" class="img-fluid" alt="">
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
                            <img src="img/user.jpeg" class="img-fluid" alt="">
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
                            <img src="img/user.jpeg" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">Rxxx</h4>
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
            </div>
        </div>
    </div>

    <!-- Team End -->

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