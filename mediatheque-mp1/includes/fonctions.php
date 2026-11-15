<?php
function afficherLivre(array $livre): string
{
    $titre = htmlspecialchars((string)($livre['titre'] ?? 'Titre inconnu'), ENT_QUOTES, 'UTF-8');
    $auteur = htmlspecialchars((string)($livre['auteur'] ?? 'Auteur inconnu'), ENT_QUOTES, 'UTF-8');
    $annee = htmlspecialchars((string)($livre['annee'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
    $categorie = htmlspecialchars((string)($livre['categorie'] ?? 'Non classé'), ENT_QUOTES, 'UTF-8');
    $prix = number_format((float)($livre['prix'] ?? 0), 2, ',', ' ');
    $disponible = (bool)($livre['disponible'] ?? false);
    $etat = $disponible
        ? '<span class="badge badge-success">Disponible</span>'
        : '<span class="badge badge-danger">Indisponible</span>';
    $id = (int)($livre['id'] ?? 0);

    return sprintf(
        '<article class="book-card">
            <div class="book-cover">
                <span>%s</span>
            </div>
            <div class="book-body">
                <div class="book-meta-row">
                    <span class="book-category">%s</span>
                    %s
                </div>
                <h3>%s</h3>
                <p class="book-author">%s</p>
                <ul class="book-details">
                    <li><strong>Année :</strong> %s</li>
                    <li><strong>Prix :</strong> %s €</li>
                </ul>
                <a href="detail.php?id=%d" class="btn btn-outline">Voir le détail</a>
            </div>
        </article>',
        htmlspecialchars(substr($categorie, 0, 1), ENT_QUOTES, 'UTF-8'),
        $categorie,
        $etat,
        $titre,
        $auteur,
        $annee,
        $prix,
        $id
    );
}

function filtrerParCategorie(array $livres, string $categorie): array
{
    $categorieRecherchee = strtolower(trim($categorie));
    if ($categorieRecherchee === '') {
        return $livres;
    }

    return array_values(array_filter(
        $livres,
        static function ($livre) use ($categorieRecherchee): bool {
            $categorieLivre = strtolower((string)($livre['categorie'] ?? ''));
            return $categorieLivre === $categorieRecherchee;
        }
    ));
}

function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if ((int)($livre['id'] ?? 0) === $id) {
            return $livre;
        }
    }

    return null;
}

function compterLivresDisponibles(array $livres): int
{
    $total = 0;

    foreach ($livres as $livre) {
        if (!empty($livre['disponible']) && (bool) $livre['disponible']) {
            $total++;
        }
    }

    return $total;
}
