<?php

declare(strict_types=1);

require __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';

$nombreTotalLivres = count($livres);
$nombreDisponibles = compterLivresDisponibles($livres);
$nombreCategories = count(array_unique(array_column($livres, 'categorie')));

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="hero__content">
        <span class="eyebrow">Bibliothèque numérique</span>
        <h1>Bienvenue à la Médiathèque IPNET</h1>
        <p>
            Découvrez un catalogue moderne, pensé pour faciliter la recherche, la découverte
            et la consultation des ouvrages de notre médiathèque universitaire.
        </p>
        <div class="hero__actions">
            <a href="catalogue.php" class="btn btn-primary">Explorer le catalogue</a>
            <a href="apropos.php" class="btn btn-secondary">À propos</a>
        </div>
    </div>

    <div class="hero__stats" aria-label="Statistiques du catalogue">
        <div class="stat-card">
            <span class="stat-card__label">Livres au catalogue</span>
            <strong><?= htmlspecialchars((string) $nombreTotalLivres, ENT_QUOTES, 'UTF-8'); ?></strong>
        </div>
        <div class="stat-card">
            <span class="stat-card__label">Livres disponibles</span>
            <strong><?= htmlspecialchars((string) $nombreDisponibles, ENT_QUOTES, 'UTF-8'); ?></strong>
        </div>
        <div class="stat-card">
            <span class="stat-card__label">Catégories</span>
            <strong><?= htmlspecialchars((string) $nombreCategories, ENT_QUOTES, 'UTF-8'); ?></strong>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-heading">
        <p class="eyebrow">Notre mission</p>
        <h2>Accéder à la connaissance, en toute simplicité</h2>
    </div>

    <div class="feature-grid">
        <article class="feature-card">
            <div class="feature-card__icon" aria-hidden="true">📚</div>
            <h3>Catalogue dynamique</h3>
            <p>Parcourez des ouvrages variés et consultez des fiches claires et utiles.</p>
        </article>
        <article class="feature-card">
            <div class="feature-card__icon" aria-hidden="true">🔎</div>
            <h3>Filtrage par catégorie</h3>
            <p>Affinez le catalogue par thème et retrouvez rapidement les livres qui vous intéressent.</p>
        </article>
        <article class="feature-card">
            <div class="feature-card__icon" aria-hidden="true">📖</div>
            <h3>Lecture et découverte</h3>
            <p>Explorez des titres de fiction, des essais et des ressources pour apprendre et s’inspirer.</p>
        </article>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
