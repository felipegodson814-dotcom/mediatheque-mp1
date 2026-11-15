<?php
require_once __DIR__ . '/includes/fonctions.php';

$livres = require __DIR__ . '/data/livres.php';
$categories = array_values(array_unique(array_map(
    static fn (array $livre): string => strtolower((string) ($livre['categorie'] ?? '')),
    $livres
)));
sort($categories);

$basePath = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médiathèque IPNET</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-theme="light">
    <header class="topbar">
        <div class="container nav-wrap">
            <div class="brand">
                <a href="index.php">IPNET Médiathèque</a>
            </div>
            <nav class="main-nav" aria-label="Navigation principale">
                <a href="index.php" class="nav-link <?php echo $basePath === 'index.php' ? 'active' : ''; ?>">Accueil</a>
                <a href="catalogue.php" class="nav-link <?php echo $basePath === 'catalogue.php' ? 'active' : ''; ?>">Catalogue</a>
                <a href="apropos.php" class="nav-link <?php echo $basePath === 'apropos.php' ? 'active' : ''; ?>">À propos</a>
            </nav>
            <button id="theme-toggle" class="theme-toggle" type="button" aria-label="Basculer le thème">🌙</button>
        </div>
    </header>
    <main class="container page-content">
