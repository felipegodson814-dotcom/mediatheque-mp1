# Médiathèque IPNET

Catalogue dynamique de la Médiathèque IPNET réalisé pour le TP 1 du cours IT 231 — Développement Web I.

## Description et objectifs

Cette application web en PHP natif présente une collection de livres et permet de parcourir le catalogue, filtrer les ouvrages par catégorie et consulter leur fiche détaillée. Le projet met en pratique les bases de PHP, la structuration de pages réutilisables, la validation des paramètres GET et l’échappement des données affichées.

## Technologies

- PHP 8+ natif, sans framework
- HTML5 et CSS3 responsive
- JavaScript natif pour la préférence de thème
- Git et GitHub
- Aucune base de données : les ouvrages sont dans `data/livres.php`

## Prérequis

- PHP 8.0 ou supérieur
- Navigateur web récent
- XAMPP, WAMP, MAMP, ou PHP installé en ligne de commande

## Structure

```text
mediatheque-mp1/
├── index.php
├── catalogue.php
├── detail.php
├── apropos.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── fonctions.php
├── data/
│   └── livres.php
├── css/
│   └── style.css
├── js/
│   └── theme.js
├── README.md
├── JOURNAL_DE_BORD.md
└── .gitignore
```

## Fonctionnalités

- Accueil avec présentation et statistiques calculées par PHP
- Catalogue de 10 livres en cartes, avec titre, auteur, année, catégorie, prix et disponibilité
- Filtrage GET par catégorie, message de validation et retour à la liste complète
- Fiche détaillée par identifiant et gestion des identifiants absents, invalides ou inconnus
- Page À propos avec date calculée automatiquement
- Mode clair/sombre mémorisé dans le navigateur
- Mise en page responsive et états de disponibilité visibles
- Fonctions PHP requises et utilisées :
  - `afficherLivre(array $livre): string`
  - `filtrerParCategorie(array $livres, string $categorie): array`
  - `trouverLivreParId(array $livres, int $id): ?array`
  - `compterLivresDisponibles(array $livres): int`

## Installation et lancement

### PHP natif

Depuis le dossier du projet, lancez :

```bash
php -S 127.0.0.1:8000
```

Puis ouvrez `http://127.0.0.1:8000/`.

### XAMPP

1. Démarrez Apache dans le panneau XAMPP.
2. Copiez le dossier du projet dans `xampp/htdocs/`.
3. Ouvrez `http://localhost/mediatheque-mp1/`.

### WAMP

1. Démarrez les services WAMP.
2. Copiez le dossier dans `wamp64/www/`.
3. Ouvrez `http://localhost/mediatheque-mp1/`.

## Vérification syntaxique

Pour contrôler la syntaxe PHP de tous les fichiers depuis la racine :

```bash
find . -name '*.php' -print0 | xargs -0 -n1 php -l
```

Vérifiez également dans le navigateur l’accueil, le catalogue, un filtre tel que `catalogue.php?categorie=Roman`, un filtre inconnu, une fiche telle que `detail.php?id=3` et les cas `detail.php` / `detail.php?id=999`.

## Déploiement

Le projet exige un hébergement disposant de PHP 8+ et d’un serveur web (par exemple Apache ou Nginx). Téléversez le contenu du projet sur l’hébergement, puis vérifiez que le répertoire public contient `index.php`. GitHub Pages n’exécute pas PHP : le dépôt source GitHub n’est pas à lui seul un hébergement fonctionnel de cette application. Aucun hébergeur externe n’est configuré dans ce dépôt.

## Dépôt source

https://github.com/felipegodson814-dotcom/mediatheque-mp1

## Données

`data/livres.php` retourne un tableau PHP de livres. Chaque entrée contient les clés `id`, `titre`, `auteur`, `annee`, `categorie`, `prix` et `disponible`.
