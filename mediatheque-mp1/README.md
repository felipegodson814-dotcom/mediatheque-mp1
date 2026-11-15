# Médiathèque IPNET

Projet PHP natif pour le TP 1 de l’IT 231 (Développement Web I).

## Description
Ce projet implémente une médiathèque numérique simple et élégante, sans base de données ni framework. Il met à disposition :
- une page d’accueil,
- un catalogue de livres,
- un système de filtrage par catégorie,
- une page de détail,
- une page "À propos".

## Objectifs
- respecter strictement les consignes du sujet,
- utiliser PHP 8+ natif,
- organiser le projet selon la structure demandée,
- proposer une interface moderne et responsive,
- garantir une base de sécurité et de qualité de code.

## Technologies utilisées
- PHP 8+
- HTML5
- CSS3
- JavaScript minimal (toggle clair/sombre)
- Git / GitHub

## Prérequis
- PHP 8.1 ou supérieur installé localement,
- un serveur local compatible (XAMPP, WAMP, MAMP, ou PHP interne),
- un navigateur moderne.

## Structure du projet
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
├── .gitignore
├── README.md
├── JOURNAL_DE_BORD.md
└── .github/ (optionnel si nécessaire)
```

## Fonctionnalités réalisées
- accueil avec message de bienvenue,
- total de livres disponibles calculé automatiquement,
- catalogue avec cartes de livres,
- filtrage par catégorie via paramètres `GET`,
- message explicite en cas de catégorie absente,
- page de détail avec validation d’ID,
- gestion des cas invalides ou inexistants,
- page "À propos" avec date automatique,
- système de thème clair / sombre,
- interface responsive.

## Installation
1. Cloner ou télécharger le projet.
2. Vérifier que PHP est bien installé :
   ```bash
   php -v
   ```
3. Placer le dossier dans le répertoire de votre serveur web local.
4. Lancer le serveur local.

## Lancer le projet
### Avec XAMPP / WAMP / MAMP
- Déplacer le dossier dans le dossier `htdocs` (XAMPP / MAMP) ou `www` (WAMP).
- Démarrer Apache.
- Ouvrir dans le navigateur :
  ```text
  http://localhost/mediatheque-mp1/index.php
  ```

### Avec PHP natif
Exécuter :
```bash
php -S localhost:8000
```
Puis ouvrir :
```text
http://localhost:8000/index.php
```

## Déploiement
Le projet est compatible avec un hébergement PHP standard (Apache / Nginx) sans base de données.
Il peut être déployé sur des solutions comme :
- Hostinger,
- InfinityFree,
- o2switch,
- PlanetHoster,
- ou tout hébergeur PHP 8+.

Important : GitHub Pages ne convient pas à ce projet car il ne supporte pas l’exécution native de PHP.

## Dépôt GitHub
Le dépôt contient le projet complet, ainsi que la documentation liée au TP.

## Auteurs
Projet développé dans le cadre du TP IT 231 – Médiathèque IPNET.
