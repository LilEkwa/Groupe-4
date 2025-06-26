<!DOCTYPE html>
<html lang="en">

<?php
include('head.php');
include 'login/config.php';
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
    </div>
    <div class="container-fluid position-relative p-0">

        <div>
            <table class="table table-responsive table-bordered p-5">
                <thead>
                    <thead>
                        <th>#</th>
                        <th>Nom du titulaire</th>
                        <th>Email</th>
                    </thead>
                <tbody>
                    <?php
                    $sqli = $conn->query("SELECT * FROM all_users WHERE acctype = 'US'");
                    while ($row = $sqli->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                        </tr> <!-- Affichage des données dans une table HTML -->
                    <?php
                    }
                    ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
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