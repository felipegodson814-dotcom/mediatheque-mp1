<?php

declare(strict_types=1);

require __DIR__ . '/includes/header.php';
?>

<section class="section section--narrow">
    <div class="section-heading">
        <p class="eyebrow">À propos</p>
        <h1>La Médiathèque IPNET</h1>
    </div>

    <div class="about-card">
        <p>
            La Médiathèque IPNET est un espace de culture, de documentation et de lecture destiné
            à soutenir les étudiants, les enseignants et toutes les personnes curieuses dans leur
            parcours académique et personnel.
        </p>
        <p>
            Notre mission est de rendre l’accès au savoir simple et agréable. Le catalogue rassemble
            des ressources littéraires, pédagogiques et documentaires, organisées pour encourager
            l’apprentissage, la découverte et la réflexion.
        </p>
        <p>
            La navigation permet de parcourir les ouvrages, de filtrer la collection par catégorie
            et de consulter une fiche complète pour chaque livre.
        </p>
        <div class="info-panel">
            <strong>Date du jour :</strong>
            <?= htmlspecialchars(date('d/m/Y'), ENT_QUOTES, 'UTF-8'); ?>
        </div>
    </div>

    <div class="inline-actions">
        <a href="index.php" class="btn btn-primary">Retour à l’accueil</a>
        <a href="catalogue.php" class="btn btn-secondary">Voir le catalogue</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
