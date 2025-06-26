<?php
include 'head.php';
include 'navbar.php';
?>

<div class="container mt-5">
    <h1 class="mb-4">Blog</h1>
    <div class="row">
        <!-- Exemple d'article de blog -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/600x300" class="card-img-top" alt="Image de l'article">
                <div class="card-body">
                    <h5 class="card-title">Titre de l'article 1</h5>
                    <p class="card-text">Ceci est un exemple de contenu pour le premier article du blog. Vous pouvez ajouter ici un résumé ou un extrait de l'article.</p>
                    <a href="#" class="btn btn-primary">Lire la suite</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/600x300" class="card-img-top" alt="Image de l'article">
                <div class="card-body">
                    <h5 class="card-title">Titre de l'article 2</h5>
                    <p class="card-text">Voici un autre exemple d'article. Vous pouvez dupliquer ce bloc pour ajouter plus d'articles à votre blog.</p>
                    <a href="#" class="btn btn-primary">Lire la suite</a>
                </div>
            </div>
        </div>
        <!-- Ajoutez d'autres articles ici -->
    </div>
</div>

<?php
include 'footer.php';
?>
