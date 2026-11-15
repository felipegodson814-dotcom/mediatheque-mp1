<?php

declare(strict_types=1);

require __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';
$idLivre = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$livre = ($idLivre !== false && $idLivre !== null && $idLivre > 0)
    ? trouverLivreParId($livres, $idLivre)
    : null;

require __DIR__ . '/includes/header.php';
?>

<section class="section">
    <?php if ($idLivre === false || $idLivre === null || $idLivre <= 0): ?>
        <div class="alert alert-danger" role="alert">Identifiant de livre absent ou invalide.</div>
        <div class="inline-actions"><a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a></div>
    <?php elseif ($livre === null): ?>
        <div class="alert alert-danger" role="alert">Le livre demandé est introuvable.</div>
        <div class="inline-actions"><a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a></div>
    <?php else: ?>
        <?php
        $titre = htmlspecialchars((string) $livre['titre'], ENT_QUOTES, 'UTF-8');
        $auteur = htmlspecialchars((string) $livre['auteur'], ENT_QUOTES, 'UTF-8');
        $categorie = htmlspecialchars((string) $livre['categorie'], ENT_QUOTES, 'UTF-8');
        $annee = htmlspecialchars((string) $livre['annee'], ENT_QUOTES, 'UTF-8');
        $prix = number_format((float) $livre['prix'], 2, ',', ' ');
        $disponible = (bool) $livre['disponible'];
        ?>
        <div class="detail-header">
            <p class="eyebrow">Fiche détaillée · Livre n° <?= htmlspecialchars((string) $livre['id'], ENT_QUOTES, 'UTF-8'); ?></p>
            <h1><?= $titre; ?></h1>
        </div>

        <div class="detail-layout">
            <div class="detail-cover" aria-hidden="true"><div class="detail-cover__content">📘</div></div>
            <div class="detail-content">
                <div class="detail-badges">
                    <span class="badge badge-primary"><?= $categorie; ?></span>
                    <span class="badge badge-<?= $disponible ? 'success' : 'danger'; ?>">
                        <?= $disponible ? 'Disponible' : 'Indisponible'; ?>
                    </span>
                </div>
                <div class="meta-grid">
                    <div class="meta-item"><span class="meta-label">Auteur</span><strong><?= $auteur; ?></strong></div>
                    <div class="meta-item"><span class="meta-label">Année</span><strong><?= $annee; ?></strong></div>
                    <div class="meta-item"><span class="meta-label">Catégorie</span><strong><?= $categorie; ?></strong></div>
                    <div class="meta-item"><span class="meta-label">Prix</span><strong><?= htmlspecialchars($prix, ENT_QUOTES, 'UTF-8'); ?> €</strong></div>
                    <div class="meta-item"><span class="meta-label">Disponibilité</span><strong><?= $disponible ? 'Disponible' : 'Indisponible'; ?></strong></div>
                    <div class="meta-item"><span class="meta-label">Identifiant</span><strong><?= htmlspecialchars((string) $livre['id'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                </div>
                <p class="detail-description">
                    Cet ouvrage fait partie du catalogue de la Médiathèque IPNET. Consultez son statut
                    de disponibilité et explorez les autres titres du catalogue.
                </p>
                <div class="inline-actions"><a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a></div>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
