# Tableau de Bord Administrateur

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

## À propos du projet

Ce projet est un tableau de bord administrateur moderne, responsive et intuitif développé avec Laravel 11 et Tailwind CSS. Il permet de gérer des clients et leurs abonnements via une interface utilisateur élégante et fonctionnelle.

### Fonctionnalités principales

- **Tableau de bord principal** : Vue d'ensemble avec statistiques (nombre de clients, abonnements actifs, etc.)
- **Gestion des clients** : Liste, ajout, modification et désactivation de clients
- **Suivi des éléments** : Consultation des éléments suivis par client
- **Gestion des abonnements** : Liste, ajout, modification et suspension d'abonnements
## Technologies utilisées

- **Backend** : Laravel 11
- **Frontend** : Tailwind CSS
- **Base de données** : MySQL
- **Icônes** : Heroicons

## Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js et NPM
- MySQL
- Serveur web (Apache, Nginx) ou utilisation du serveur de développement Laravel

## Installation

### 1. Cloner le projet (si nécessaire)

```bash
git clone [URL_DU_REPO] admin-dashboard
cd admin-dashboard
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
```

### 4. Configurer l'environnement

```bash
cp .env.example .env
```

Ouvrez le fichier `.env` et configurez les informations de connexion à la base de données :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_dashboard
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```
### 5. Créer la base de données

Créez une base de données nommée `admin_dashboard` dans phpMyAdmin ou via la ligne de commande MySQL.

### 6. Générer la clé d'application

```bash
php artisan key:generate
```

### 7. Exécuter les migrations et les seeders

```bash
php artisan migrate --seed
```

### 8. Compiler les assets

```bash
npm run dev
```

### 9. Démarrer le serveur de développement

```bash
php artisan serve
```

Vous pouvez maintenant accéder à l'application à l'adresse [http://localhost:8000](http://localhost:8000)

## Structure du projet

- **app/Models/** - Modèles Eloquent (Client, Subscription, FollowedItem)
- **app/Http/Controllers/AdminController.php** - Contrôleur principal
- **database/migrations/** - Migrations pour la structure de la base de données
- **database/seeders/** - Seeders pour les données de test
- **resources/views/admin/** - Vues Blade pour le tableau de bord
- **resources/css/app.css** - Styles Tailwind CSS
- **routes/web.php** - Définition des routes

## Informations de connexion

Après avoir exécuté les seeders, vous pouvez vous connecter avec les identifiants suivants :

- **Email** : admin@example.com
- **Mot de passe** : password

## Licence

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus d'informations.
