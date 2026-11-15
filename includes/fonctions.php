<?php

declare(strict_types=1);

/** Génère la carte HTML sécurisée d'un livre du catalogue. */
function afficherLivre(array $livre): string
{
    $id = filter_var($livre['id'] ?? null, FILTER_VALIDATE_INT);
    if ($id === false || $id === null || $id <= 0) {
        return '';
    }

    $titre = htmlspecialchars((string) ($livre['titre'] ?? 'Titre inconnu'), ENT_QUOTES, 'UTF-8');
    $auteur = htmlspecialchars((string) ($livre['auteur'] ?? 'Auteur inconnu'), ENT_QUOTES, 'UTF-8');
    $annee = htmlspecialchars((string) ($livre['annee'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
    $categorie = htmlspecialchars((string) ($livre['categorie'] ?? 'Non classé'), ENT_QUOTES, 'UTF-8');
    $prix = number_format((float) ($livre['prix'] ?? 0), 2, ',', ' ');
    $disponible = (bool) ($livre['disponible'] ?? false);
    $statutTexte = $disponible ? 'Disponible' : 'Indisponible';
    $statutClasse = $disponible ? 'success' : 'danger';

    return <<<HTML
        <article class="book-card">
            <div class="book-card__header">
                <span class="book-card__category">{$categorie}</span>
                <span class="badge badge-{$statutClasse}">{$statutTexte}</span>
            </div>
            <h2>{$titre}</h2>
            <p><strong>Auteur :</strong> {$auteur}</p>
            <p><strong>Année :</strong> {$annee}</p>
            <p><strong>Prix :</strong> {$prix} €</p>
            <div class="book-card__actions">
                <a href="detail.php?id={$id}" class="btn btn-primary">Voir les détails</a>
            </div>
        </article>
    HTML;
}

/** Retourne les livres dont la catégorie correspond au filtre. */
function filtrerParCategorie(array $livres, string $categorie): array
{
    $categorieRecherchee = strtolower(trim($categorie));

    return array_values(array_filter(
        $livres,
        static fn (array $livre): bool => strtolower(trim((string) ($livre['categorie'] ?? ''))) === $categorieRecherchee
    ));
}

/** Recherche un livre par identifiant, ou retourne null si absent. */
function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if (is_array($livre) && (int) ($livre['id'] ?? 0) === $id) {
            return $livre;
        }
    }

    return null;
}

/** Compte les livres dont la disponibilité est vraie. */
function compterLivresDisponibles(array $livres): int
{
    $nombre = 0;

    foreach ($livres as $livre) {
        if (is_array($livre) && (bool) ($livre['disponible'] ?? false)) {
            $nombre++;
        }
    }

    return $nombre;
}
