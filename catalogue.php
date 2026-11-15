<?php

declare(strict_types=1);

require __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';

$categories = array_values(array_unique(array_map(
    static fn (array $livre): string => (string) ($livre['categorie'] ?? 'Non classé'),
    $livres
)));
sort($categories, SORT_STRING);

$selectionCategorie = '';
$message = '';
$messageType = 'info';
$livresAffiches = $livres;

if (isset($_GET['categorie'])) {
    $selectionCategorie = trim((string) $_GET['categorie']);

    if ($selectionCategorie !== '') {
        if (!in_array($selectionCategorie, $categories, true)) {
            $message = 'La catégorie demandée n’existe pas. Veuillez choisir une catégorie valide.';
            $messageType = 'danger';
        } else {
            $livresAffiches = filtrerParCategorie($livres, $selectionCategorie);
            $message = 'Affichage filtré pour la catégorie : ' . $selectionCategorie;
            $messageType = 'success';
        }
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="section">
    <div class="section-heading section-heading--split">
        <div>
            <p class="eyebrow">Catalogue</p>
            <h1>Nos ouvrages</h1>
        </div>
        <div class="results-pill" aria-live="polite">
            <?= htmlspecialchars((string) count($livresAffiches), ENT_QUOTES, 'UTF-8'); ?> livre(s) affiché(s)
        </div>
    </div>

    <?php if ($message !== ''): ?>
        <div class="alert alert-<?= htmlspecialchars($messageType, ENT_QUOTES, 'UTF-8'); ?>" role="status">
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <nav class="filter-bar" aria-label="Filtrer les livres par catégorie">
        <a href="catalogue.php" class="btn btn-secondary">Toutes les catégories</a>
        <?php foreach ($categories as $categorie): ?>
            <a
                href="catalogue.php?categorie=<?= rawurlencode($categorie); ?>"
                class="btn btn-filter <?= $selectionCategorie === $categorie ? 'active' : ''; ?>"
                <?= $selectionCategorie === $categorie ? 'aria-current="page"' : ''; ?>
            >
                <?= htmlspecialchars($categorie, ENT_QUOTES, 'UTF-8'); ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <?php if ($livresAffiches !== []): ?>
        <div class="book-grid">
            <?php foreach ($livresAffiches as $livre): ?>
                <?= afficherLivre($livre); ?>
            <?php endforeach; ?>
        </div>
    <?php elseif ($messageType !== 'danger'): ?>
        <p class="alert alert-info">Aucun livre n’est disponible dans cette catégorie pour le moment.</p>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
