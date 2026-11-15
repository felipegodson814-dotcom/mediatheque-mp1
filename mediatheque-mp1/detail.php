<?php
require_once __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    require_once __DIR__ . '/includes/header.php';
    ?>
    <section class="message-page">
        <div class="alert alert-error">
            Identifiant de livre invalide. Merci de sélectionner un livre dans le catalogue.
        </div>
        <a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a>
    </section>
    <?php
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$livre = trouverLivreParId($livres, $id);

if ($livre === null) {
    require_once __DIR__ . '/includes/header.php';
    ?>
    <section class="message-page">
        <div class="alert alert-error">
            Le livre demandé est introuvable.
        </div>
        <a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a>
    </section>
    <?php
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

require_once __DIR__ . '/includes/header.php';
$disponibilite = (bool) ($livre['disponible'] ?? false);
?>
<section class="detail-layout">
    <div class="detail-visual">
        <span><?php echo htmlspecialchars((string) ($livre['categorie'] ?? 'Livre'), ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
    <div class="detail-content">
        <span class="eyebrow">Fiche détaillée</span>
        <h1><?php echo htmlspecialchars((string) ($livre['titre'] ?? 'Titre inconnu'), ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="detail-author"><?php echo htmlspecialchars((string) ($livre['auteur'] ?? 'Auteur inconnu'), ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="detail-badges">
            <span class="badge <?php echo $disponibilite ? 'badge-success' : 'badge-danger'; ?>"><?php echo $disponibilite ? 'Disponible' : 'Indisponible'; ?></span>
            <span class="badge badge-neutral"><?php echo htmlspecialchars((string) ($livre['categorie'] ?? 'Non classé'), ENT_QUOTES, 'UTF-8'); ?></span>
        </div>

        <div class="detail-list">
            <div><strong>Année :</strong> <?php echo htmlspecialchars((string) ($livre['annee'] ?? 'N/A'), ENT_QUOTES, 'UTF-8'); ?></div>
            <div><strong>Catégorie :</strong> <?php echo htmlspecialchars((string) ($livre['categorie'] ?? 'Non classé'), ENT_QUOTES, 'UTF-8'); ?></div>
            <div><strong>Prix :</strong> <?php echo number_format((float) ($livre['prix'] ?? 0), 2, ',', ' '); ?> €</div>
            <div><strong>Disponibilité :</strong> <?php echo $disponibilite ? 'Oui' : 'Non'; ?></div>
        </div>

        <div class="detail-actions">
            <a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
