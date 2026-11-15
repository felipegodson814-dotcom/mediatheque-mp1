<?php
$livres = require __DIR__ . '/../data/livres.php';
$livresDisponibles = compterLivresDisponibles($livres);
require_once __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="hero-content">
        <span class="eyebrow">Bienvenue à la Médiathèque IPNET</span>
        <h1>Un espace numérique pensé pour la lecture.</h1>
        <p>
            Découvrez une collection enrichie de romans, essais, récits et ouvrages de références.
            La médiathèque IPNET met la culture à la disposition de tous, avec des ressources
            simples, élégantes et faciles à parcourir.
        </p>
        <div class="hero-actions">
            <a href="catalogue.php" class="btn btn-primary">Accéder au catalogue</a>
            <a href="apropos.php" class="btn btn-secondary">En savoir plus</a>
        </div>
    </div>
    <div class="hero-panel">
        <div class="stat-box">
            <span class="stat-label">Livres disponibles</span>
            <strong><?php echo $livresDisponibles; ?></strong>
        </div>
        <div class="stat-box">
            <span class="stat-label">Collection</span>
            <strong><?php echo count($livres); ?></strong>
        </div>
    </div>
</section>

<section class="features">
    <div class="feature-card">
        <h3>Catalogue dynamique</h3>
        <p>Parcourez les nouveautés et filtrez selon votre catégorie préférée.</p>
    </div>
    <div class="feature-card">
        <h3>Détails complets</h3>
        <p>Chaque ouvrage affiche son auteur, son année, sa catégorie et sa disponibilité.</p>
    </div>
    <div class="feature-card">
        <h3>Expérience fluide</h3>
        <p>Une interface moderne, responsive et agréable à utiliser sur tous vos écrans.</p>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
