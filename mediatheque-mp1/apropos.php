<?php
require_once __DIR__ . '/includes/fonctions.php';
require_once __DIR__ . '/includes/header.php';
$dateDuJour = date('d/m/Y');
?>
<section class="about-page">
    <span class="eyebrow">À propos</span>
    <h1>Médiathèque IPNET</h1>
    <p>
        La Médiathèque IPNET est une plateforme culturelle moderne conçue pour offrir un accès simple,
        ergonomique et agréable à une vaste collection de documents et d’ouvrages. Elle accompagne les
        lecteurs dans leur découverte, avec une navigation pensée pour mettre en avant la qualité des contenus,
        la variété des genres et la simplicité d’utilisation.
    </p>
    <p>
        Notre mission est de promouvoir la lecture, l’apprentissage et la culture numérique dans un environnement
        professionnel, clair et inspirant. Chaque ressource est organisée pour permettre une consultation rapide,
        une recherche efficace et une expérience agréable sur tous types d’écrans.
    </p>
    <div class="about-bubble">
        <strong>Date du jour :</strong> <?php echo htmlspecialchars($dateDuJour, ENT_QUOTES, 'UTF-8'); ?>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
