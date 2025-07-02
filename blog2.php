<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - AECGS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-image: url('https://cameroungrandsudbury.ca/img/476796242_122216537678196747_3619470869414038664_n.jpg');
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 25px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 5.9rem 0;
            color: white;
        }

        .hero h1 {
            color: white;
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s both;
        }

        /* Search Bar */
        .search-container {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .search-bar {
            display: flex;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 0.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .search-bar input {
            background: transparent;
            border: none;
            padding: 0.8rem 1.5rem;
            color: white;
            font-size: 1rem;
            width: 300px;
            outline: none;
        }

        .search-bar input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-btn {
            background: rgba(255, 255, 255, 0.3);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.2);
        }

        /* Blog Content */
        .blog-content {
            background: white;
            border-radius: 20px 20px 0px 0px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            animation: fadeInUp 1s ease 0.6s both;
        }

        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: 2px solid #27ae60;
            background: transparent;
            color: #27ae60;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-btn:hover, .filter-btn.active {
            background: #27ae60;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }

        /* Blog Grid */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #f0f0f0;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .blog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog-card:hover img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            color: #666;
            font-size: 0.9rem;
        }

        .category {
            background: #27ae60;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .card-content h3 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1.3rem;
            line-height: 1.4;
        }

        .card-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .read-more {
            color: #27ae60;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            color: #2ecc71;
            text-decoration: underline;
        }

         /* Comments Section */
        .comments-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #eee;
        }

        .comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .comments-count {
            color: #666;
            font-size: 0.9rem;
        }

        .toggle-comments {
            background: #27ae60;
            color: white;
            border: none;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .toggle-comments:hover {
            background: #2ecc71;
            transform: scale(1.05);
        }

        .comments-container {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .comment-form {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .comment-input {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            font-size: 0.9rem;
        }

        .comment-input:focus {
            border-color: #27ae60;
        }

        .comment-submit {
            background: #27ae60;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .comment-submit:hover {
            background: #2ecc71;
        }

        .comment {
            background: white;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            border-left: 3px solid #27ae60;
        }

        .comment-author {
            font-weight: 600;
            font-size: 0.9rem;
            color: #333;
        }

        .comment-date {
            font-size: 0.8rem;
            color: #666;
            margin-left: 0.5rem;
        }

        .comment-text {
            margin-top: 0.3rem;
            font-size: 0.9rem;
            color: #555;
        }

        /* Modal for Article View */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            padding: 2rem;
            border: none;
            border-radius: 15px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideIn 0.3s ease;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 15px;
        }

        .close:hover {
            color: #000;
        }

        .modal h2 {
            color: #333;
            margin-bottom: 1rem;
            padding-right: 40px;
        }

        .modal-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .modal-content-text {
            line-height: 1.8;
            color: #444;
            margin-bottom: 2rem;
        }

        .modal-comments {
            border-top: 2px solid #eee;
            padding-top: 2rem;
        }

        .modal-comments h3 {
            margin-bottom: 1rem;
            color: #333;
        }


        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin: 3rem 0;
            gap: 1rem;
        }

        .page-btn {
            padding: 0.8rem 1.2rem;
            border: 2px solid #27ae60;
            background: white;
            color: #27ae60;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .page-btn:hover, .page-btn.active {
            background: #27ae60;
            color: white;
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .search-bar input {
                width: 200px;
            }
            
            .blog-grid {
                grid-template-columns: 1fr;
            }
            
            .filters {
                justify-content: center;
            }
            .modal-content {
                width: 95%;
                margin: 5% auto;
                padding: 1.5rem;
            }

            .card-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<?php include 'head.php'; ?>
<body>
   

    <div class="container-fluid position-relative p-0">
        <?php include('navbar.php'); ?>
    </div>


    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Blog AECGS</h1>
            <p>Découvrez nos dernieres actualités</p>
            
            <div class="search-container">
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Rechercher une actualité...">
                    <button class="search-btn" onclick="searchArticles()">🔍</button>
                    <a href="#"></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="blog-content">
        <div class="container">
            <!-- Filters -->
            <div class="filters">
                <button class="filter-btn active" onclick="filterArticles('all')">Tous</button>
                <button class="filter-btn" onclick="filterArticles('technologie')">Technologie</button>
                <button class="filter-btn" onclick="filterArticles('business')">Business</button>
                <button class="filter-btn" onclick="filterArticles('innovation')">Innovation</button>
                <button class="filter-btn" onclick="filterArticles('actualites')">Actualités</button>
            </div>

            <!-- Blog Grid -->
            <div class="blog-grid" id="blogGrid">
                <!-- Articles will be loaded here -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="page-btn" onclick="previousPage()">← Précédent</button>
                <button class="page-btn active">1</button>
                <button class="page-btn" onclick="nextPage()">2</button>
                <button class="page-btn" onclick="nextPage()">Suivant →</button>
            </div>
        </div>
    </section>

    <script>
        // Données d'exemple des articles de blog
        const blogArticles = [
            {
                id: 1,
                title: "L'avenir de l'intelligence artificielle",
                excerpt: "Découvrez comment l'IA transforme notre monde et les opportunités qu'elle offre pour l'avenir.",
                category: "technologie",
                date: "2025-06-15",
                image: "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&h=200&fit=crop",
                author: "Marie Dubois",
                comments: [
                    { author: "Jean Martin", date: "2025-06-16", text: "Très bon article, merci pour ces insights !" },
                    { author: "Sophie Laurent", date: "2025-06-17", text: "L'IA va effectivement changer notre façon de travailler." }
                ]
            },
            {
                id: 2,
                title: "Stratégies de croissance pour les entreprises",
                excerpt: "Les meilleures pratiques pour développer votre entreprise dans un marché concurrentiel.",
                category: "business",
                date: "2025-06-10",
                image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=200&fit=crop",
                author: "Jean Martin"
            },
            {
                id: 3,
                title: "Innovation dans le secteur de la santé",
                excerpt: "Comment les nouvelles technologies révolutionnent les soins de santé et améliorent la vie des patients.",
                category: "innovation",
                date: "2025-06-05",
                image: "https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=200&fit=crop",
                author: "Dr. Sophie Laurent"
            },
            {
                id: 4,
                title: "Tendances technologiques 2025",
                excerpt: "Les technologies émergentes qui façonneront l'année 2025 et leur impact sur les entreprises.",
                category: "technologie",
                date: "2025-05-28",
                image: "https://www.wedemain.fr/wp-content/uploads/2024/12/Fond-futuriste-2025-870x566.jpg",
                author: "Pierre Durand"
            },
            {
                id: 5,
                title: "AECGS remporte un prix d'excellence",
                excerpt: "Notre entreprise a été récompensée pour son innovation et son engagement envers l'excellence.",
                category: "actualites",
                date: "2025-05-20",
                image: "https://images.unsplash.com/photo-1556761175-4b46a572b786?w=400&h=200&fit=crop",
                author: "Équipe AECGS",
                comments: [
                    { author: "Client Satisfait", date: "2025-05-21", text: "Félicitations ! Bien mérité !" },
                    { author: "Partenaire AECGS", date: "2025-05-22", text: "Très fier de travailler avec vous." }
                ]
            },
            {
                id: 6,
                title: "Le futur du travail à distance",
                excerpt: "Comment les entreprises s'adaptent aux nouvelles modalités de travail et optimisent la productivité.",
                category: "business",
                date: "2025-05-15",
                image: "https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?w=400&h=200&fit=crop",
                author: "Anne Moreau"
            }
        ];

        let currentPage = 1;
        let currentFilter = 'all';
        let currentSearchTerm = '';

        // Fonction pour formater la date
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('fr-FR', options);
        }

        // Fonction pour créer une carte d'article
        function createArticleCard(article) {
            const commentsCount = article.comments ? article.comments.length : 0;
            return `
                <article class="blog-card fade-in" data-category="${article.category}">
                    <img src="${article.image}" alt="${article.title}" loading="lazy">
                    <div class="card-content">
                        <div class="card-meta">
                            <span class="category">${article.category.charAt(0).toUpperCase() + article.category.slice(1)}</span>
                            <span class="date">${formatDate(article.date)}</span>
                        </div>
                        <h3>${article.title}</h3>
                        <p>${article.excerpt}</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <small style="color: #999;">Par ${article.author}</small>
                            <a href="#" class="read-more" onclick="openArticle(${article.id})">Lire la suite →</a>
                        </div>
                        
                        <!-- Section Commentaires -->
                        <div class="comments-section">
                            <div class="comments-header">
                                <span class="comments-count">${commentsCount} commentaire${commentsCount > 1 ? 's' : ''}</span>
                                <button class="toggle-comments" onclick="toggleComments(${article.id})">
                                    💬 Voir commentaires
                                </button>
                            </div>
                            <div class="comments-container" id="comments-${article.id}">
                                <div class="comment-form">
                                    <input type="text" class="comment-input" placeholder="Ajouter un commentaire..." id="comment-input-${article.id}">
                                    <button class="comment-submit" onclick="addComment(${article.id})">Publier</button>
                                </div>
                                <div class="comments-list" id="comments-list-${article.id}">
                                    ${article.comments ? article.comments.map(comment => `
                                        <div class="comment">
                                            <span class="comment-author">${comment.author}</span>
                                            <span class="comment-date">${formatDate(comment.date)}</span>
                                            <div class="comment-text">${comment.text}</div>
                                        </div>
                                    `).join('') : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            `;
        }
        // Fonction pour basculer l'affichage des commentaires
        function toggleComments(articleId) {
            const commentsContainer = document.getElementById(`comments-${articleId}`);
            const toggleBtn = event.target;
            
            if (commentsContainer.style.display === 'none' || commentsContainer.style.display === '') {
                commentsContainer.style.display = 'block';
                toggleBtn.textContent = '^ Masquer commentaires';
            } else {
                commentsContainer.style.display = 'none';
                toggleBtn.textContent = '💬 Voir commentaires';
            }
        }
         // Fonction pour ajouter un commentaire
        function addComment(articleId) {
            const commentInput = document.getElementById(`comment-input-${articleId}`);
            const commentText = commentInput.value.trim();
            
            if (commentText === '') {
                alert('Veuillez saisir un commentaire.');
                return;
            }

            // Trouver l'article
            const article = blogArticles.find(a => a.id === articleId);
            if (!article) return;

            // Ajouter le nouveau commentaire
            const newComment = {
                author: 'Utilisateur', 
                date: new Date().toISOString().split('T')[0],
                text: commentText
            };

            if (!article.comments) {
                article.comments = [];
            }
            article.comments.push(newComment);

            // Mettre à jour l'affichage
            const commentsList = document.getElementById(`comments-list-${articleId}`);
            const commentElement = document.createElement('div');
            commentElement.className = 'comment';
            commentElement.innerHTML = `
                <span class="comment-author">${newComment.author}</span>
                <span class="comment-date">${formatDate(newComment.date)}</span>
                <div class="comment-text">${newComment.text}</div>
            `;
            commentsList.appendChild(commentElement);
            commentInput.value = ''; // Réinitialiser le champ de saisie
        }
        
        // Fonction pour afficher les articles
        function displayArticles() {
            const blogGrid = document.getElementById('blogGrid');
            let filteredArticles = blogArticles;

            // Filtrer par catégorie
            if (currentFilter !== 'all') {
                filteredArticles = filteredArticles.filter(article => article.category === currentFilter);
            }

            // Filtrer par terme de recherche
            if (currentSearchTerm) {
                filteredArticles = filteredArticles.filter(article => 
                    article.title.toLowerCase().includes(currentSearchTerm.toLowerCase()) ||
                    article.excerpt.toLowerCase().includes(currentSearchTerm.toLowerCase())
                );
            }

            blogGrid.innerHTML = filteredArticles.map(createArticleCard).join('');

            // Animation d'apparition
            setTimeout(() => {
                const cards = document.querySelectorAll('.blog-card');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }, 50);
        }

        // Fonction de filtrage
        function filterArticles(category) {
            currentFilter = category;
            
            // Mettre à jour les boutons de filtre
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            displayArticles();
        }

        // Fonction de recherche
        function searchArticles() {
            const searchInput = document.getElementById('searchInput');
            currentSearchTerm = searchInput.value;
            displayArticles();
        }

        // Fonction pour ouvrir un article
        function openArticle(articleId) {
            const article = blogArticles.find(a => a.id === articleId);
            if (article) {
                alert(`Ouverture de l'article: "${article.title}"\n\nCeci serait normalement une redirection vers la page complète de l'article.`);
            }
        }

        // Fonctions de pagination
        function nextPage() {
            currentPage++;
            // Logique de pagination ici
            console.log(`Page ${currentPage}`);
        }

        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                console.log(`Page ${currentPage}`);
            }
        }

        // Recherche en temps réel
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                searchArticles();
            }, 300);
        });

        // Effet de scroll pour les animations
        function handleScroll() {
            const elements = document.querySelectorAll('.blog-card');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('fade-in');
                }
            });
        }

        window.addEventListener('scroll', handleScroll);

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            displayArticles();
            handleScroll();
        });

        // Navigation mobile
        document.addEventListener('DOMContentLoaded', function() {
            // Ajouter un menu burger pour mobile
            if (window.innerWidth <= 768) {
                const nav = document.querySelector('nav');
                nav.innerHTML += `
                    <button class="mobile-menu-btn" onclick="toggleMobileMenu()" style="
                        background: none;
                        border: none;
                        color: white;
                        font-size: 1.5rem;
                        cursor: pointer;
                        display: block;
                    ">☰</button>
                `;
            }
        });

        function toggleMobileMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        }
    </script>

    <?php
    // Simulation de code PHP pour la gestion des articles
    /*
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'aecgs_blog';
    $username = 'your_username';
    $password = 'your_password';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }

    // Fonction pour récupérer les articles
    function getArticles($category = null, $search = null, $page = 1, $limit = 6) {
        global $pdo;
        
        $sql = "SELECT * FROM articles WHERE status = 'published'";
        $params = [];
        
        if ($category && $category !== 'all') {
            $sql .= " AND category = :category";
            $params[':category'] = $category;
        }
        
        if ($search) {
            $sql .= " AND (title LIKE :search OR excerpt LIKE :search)";
            $params[':search'] = "%$search%";
        }
        
        $sql .= " ORDER BY created_at DESC LIMIT " . (($page - 1) * $limit) . ", $limit";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour ajouter un nouvel article
    function addArticle($title, $excerpt, $content, $category, $author, $image) {
        global $pdo;
        
        $sql = "INSERT INTO articles (title, excerpt, content, category, author, image, created_at, status) VALUES (:title, :excerpt, :content, :category, :author, :image, NOW(), 'published')";
        
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':title' => $title,
            ':excerpt' => $excerpt,
            ':content' => $content,
            ':category' => $category,
            ':author' => $author,
            ':image' => $image
        ]);
    }

    // Traitement des requêtes AJAX
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Content-Type: application/json');
        
        $action = $_POST['action'] ?? '';
        
        switch ($action) {
            case 'get_articles':
                $category = $_POST['category'] ?? 'all';
                $search = $_POST['search'] ?? '';
                $page = intval($_POST['page'] ?? 1);
                
                $articles = getArticles($category, $search, $page);
                echo json_encode($articles);
                break;
                
            case 'add_article':
                if (isset($_POST['title'], $_POST['excerpt'], $_POST['content'], $_POST['category'], $_POST['author'])) {
                    $result = addArticle(
                        $_POST['title'],
                        $_POST['excerpt'],
                        $_POST['content'],
                        $_POST['category'],
                        $_POST['author'],
                        $_POST['image'] ?? ''
                    );
                    echo json_encode(['success' => $result]);
                }
                break;
        }
        exit;
    }
    */
    
    // Structure de base de données recommandée
    /*
    CREATE TABLE articles (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        excerpt TEXT,
        content LONGTEXT,
        category VARCHAR(100),
        author VARCHAR(100),
        image VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
        views INT DEFAULT 0
    );
    */
    ?>

     <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
    <?php
    include 'footer.php';
    ?>
</body>
</html>