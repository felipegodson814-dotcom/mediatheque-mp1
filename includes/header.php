<?php

declare(strict_types=1);

$pageActuelle = basename((string) ($_SERVER['SCRIPT_NAME'] ?? 'index.php'));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Catalogue dynamique de la Médiathèque IPNET : livres, catégories et fiches détaillées.">
    <meta name="theme-color" content="#f4f7fb">
    <title>Médiathèque IPNET — Catalogue numérique</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-theme="light">
    <div class="page-shell">
        <header class="site-header">
            <div class="container nav">
                <a href="index.php" class="brand" aria-label="Accueil Médiathèque IPNET">
                    <span class="brand__mark">IPNET</span>
                    <span class="brand__text">Médiathèque</span>
                </a>
                <nav class="main-nav" aria-label="Navigation principale">
                    <a href="index.php" class="<?= $pageActuelle === 'index.php' ? 'active' : ''; ?>">Accueil</a>
                    <a href="catalogue.php" class="<?= $pageActuelle === 'catalogue.php' ? 'active' : ''; ?>">Catalogue</a>
                    <a href="apropos.php" class="<?= $pageActuelle === 'apropos.php' ? 'active' : ''; ?>">À propos</a>
                </nav>
                <button id="theme-toggle" class="theme-toggle" aria-label="Activer le mode sombre" type="button">🌙</button>
            </div>
        </header>
        <main class="container main-content">
