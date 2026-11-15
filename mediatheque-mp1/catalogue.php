<?php
require_once __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';
$categories = array_values(array_unique(array_map(
    static fn (array $livre): string => strtolower((string) ($livre['categorie'] ?? '')),
    $livres
)));
sort($categories);

$catDemandee = trim((string) ($_GET['categorie'] ?? ''));
$listeAffichee = $catDemandee === '' ? $livres : filtrerParCategorie($livres, $catDemandee);
$categoriesValides = array_map('ucfirst', $categories);

if ($catDemandee !== '' && !in_array(strtolower($catDemandee), array_map('strtolower', $categories), true)) {
    $message = 'La catégorie demandée est introuvable. Veuillez choisir une catégorie valide.';
    $listeAffichee = [];
} else {
    $message = $catDemandee === ''
        ? 'Affichage de tous les livres.'
        : 'Résultats pour la catégorie : ' . htmlspecialchars(ucfirst($catDemandee), ENT_QUOTES, 'UTF-8');
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="catalog-header">
    <div>
        <span class="eyebrow">Catalogue</span>
        <h1>Explorer notre collection</h1>
    </div>
    <a href="catalogue.php" class="btn btn-secondary">Voir tout</a>
</section>

<section class="filters" aria-label="Filtres par catégorie">
    <div class="filter-list">
        <a href="catalogue.php" class="filter-chip <?php echo $catDemandee === '' ? 'active' : ''; ?>">Tous</a>
        <?php foreach ($categoriesValides as $categorie): ?>
            <a href="catalogue.php?categorie=<?php echo urlencode(strtolower($categorie)); ?>" class="filter-chip <?php echo strtolower($catDemandee) === strtolower($categorie) ? 'active' : ''; ?>"><?php echo htmlspecialchars($categorie, ENT_QUOTES, 'UTF-8'); ?></a>
        <?php endforeach; ?>
    </div>
</section>

<?php if (isset($message)): ?>
    <div class="alert <?php echo $catDemandee !== '' && !in_array(strtolower($catDemandee), array_map('strtolower', $categories), true) ? 'alert-error' : 'alert-info'; ?>">
        <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php endif; ?>

<section class="catalog-grid">
    <?php if ($listeAffichee === []): ?>
        <div class="empty-state">
            <h2>Aucun livre trouvé</h2>
            <p>Le catalogue ne contient pas de résultats pour cette catégorie.</p>
            <a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a>
        </div>
    <?php else: ?>
        <?php foreach ($listeAffichee as $livre): ?>
            <?php echo afficherLivre($livre); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

<p class="count-info">Nombre total de livres affichés : <strong><?php echo count($listeAffichee); ?></strong></p>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
