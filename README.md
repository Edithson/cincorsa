# 🏢 CINV-COR SA — Site Vitrine & Plateforme de Gestion

[![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php)](https://php.net)
[![Livewire](https://img.shields.io/badge/Livewire-3.6-4E5BA6?style=flat-square&logo=livewire)](https://livewire.laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-4.1-38BDF8?style=flat-square&logo=tailwind-css)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-7.0-646CFF?style=flat-square&logo=vite)](https://vitejs.dev)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)

Plateforme web officielle de **CINV-COR SA** (*Compagnie d'Ingénierie Documentaire, de Valorisation et de Conservation des Archives SA*). Le projet combine un site vitrine moderne et hautement performant avec un espace d'administration complet (Back-Office) sécurisé pour la gestion du contenu et des demandes de contact.

---

## 📋 Table des Matières

- [À propos de CINV-COR SA](#-à-propos-de-cinv-cor-sa)
- [Fonctionnalités Principales](#-fonctionnalités-principales)
  - [Espace Public](#-espace-public)
  - [Espace Administration (Back-Office)](#-espace-administration-back-office)
- [Architecture & Stack Technique](#-architecture--stack-technique)
- [Structure du Projet](#-structure-du-projet)
- [Modèle de Données & Sécurité (RBAC)](#-modèle-de-données--sécurité-rbac)
- [Installation & Configuration](#-installation--configuration)
  - [Prérequis](#prérequis)
  - [Étapes d'installation](#étapes-dinstallation)
  - [Variables d'environnement (.env)](#variables-denvironnement-env)
- [Commandes Utiles](#-commandes-utiles)
- [Securité & reCAPTCHA v3](#-securité--recaptcha-v3)
- [Licence](#-licence)

---

## 🏢 À propos de CINV-COR SA

**CINV-COR SA** est un leader en Afrique francophone spécialisé dans l'ingénierie documentaire, la numérisation professionnelle, l'archivage physique et électronique (SAE), ainsi que la fourniture de solutions logicielle GEIDE (Gestion Électronique des Informations et Documents d'Entreprise).

---

## ✨ Fonctionnalités Principales

### 🌐 Espace Public
- **Accueil Dynamique (`/`)** : Présentation générale, processus industriel, chiffres clés, partenaires, témoignages clients et derniers articles d'actualité.
- **Présentation Institutionnelle (`/about`)** : Histoire de l'entreprise, frise chronologique interactive (2001-2025), vision, mission et valeurs.
- **Offres de Services (`/service`)** :
  - Archivage Physique & Gestion des Stocks
  - Archivage Électronique (SAE conforme)
  - Logicielles GEIDE / GED
  - Dématérialisation & Workflows de validation
- **Actualités & Blog (`/article`, `/article/{slug}`)** : Consultation d'articles d'actualités avec pagination, gestion intelligente des slugs SEO et recommandation d'articles récents.
- **Cadre Légal & Réglementaire (`/faq`, `/admin/laws`)** : Publication et consultation des lois et normes régissant l'archivage au Cameroun et dans la zone CEMAC.
- **Formulaire de Contact Réactif (`/contact`)** :
  - Composant réactif **Livewire Volt** avec validation en temps réel.
  - Protection anti-bot intégrée **Google reCAPTCHA v3** (vérification du score via API backend).
  - Notifications interactives **SweetAlert2**.
  - Envoi automatique de mails Markdown structurés aux administrateurs (`ContactRequestMail`).
- **Multilingue (FR/EN)** : Commutateur de langue à la volée avec persistance en session (`/lang/{locale}`).

### 🔐 Espace Administration (Back-Office)
- **Tableau de Bord Analytics (`/admin/dashboard`)** : Statistiques globales sur les articles (publiés, brouillons, mensuels) et demandes de contact (lues, non lues).
- **Gestion des Articles (`/admin/articles`)** : Interface CRUD réactive sous Volt (publication, upload d'images, édition de contenu).
- **Gestion des Textes de Loi (`/admin/laws`)** : Ajout, modification et téléchargement de documents réglementaires (PDF / Images).
- **Gestion des Demandes de Contact (`/admin/contact`)** : Consultation et traitement des demandes d'entreprises entrantes.
- **Gestion des Réglages du Site (`/admin/settings`)** : Modification dynamique des coordonnées, logos, réseaux sociaux, heures d'ouverture et stockage mis en cache (`Cache::rememberForever`).
- **Gestion des Utilisateurs & Permissions (`/admin/users`)** : Attribution fine des rôles et niveaux d'accès (`none`, `view`, `author`, `full`).

---

## 🛠 Architecture & Stack Technique

| Composant | Technologie / Package |
| :--- | :--- |
| **Framework Backend** | **Laravel 12.0** (PHP 8.2+) |
| **Composants Réactifs** | **Livewire 3.6** & **Livewire Volt 1.7** |
| **Style & Design System** | **Tailwind CSS 4.1** + PostCSS + Autoprefixer |
| **Bundler & Outillage Front** | **Vite 7.0** + `@tailwindcss/vite` |
| **Base de Données** | SQLite (dev) / MySQL / PostgreSQL (prod) via Eloquent ORM |
| **Authentification** | Laravel Breeze + Livewire Volt |
| **Notifications UI** | SweetAlert2 |
| **Sécurité Anti-Spam** | Google reCAPTCHA v3 |
| **Éditeur de Texte** | Trix Editor |
| **Monitoring d'Erreurs** | Sentry (`sentry/sentry-laravel`) |
| **Tests Unitaires & Métier** | Pest PHP 4.2 |

---

## 📁 Structure du Projet

```text
cincorsa/
├── app/
│   ├── Enums/
│   │   └── AccessLevel.php          # Enumérations des niveaux d'accès (none, view, author, full)
│   ├── Http/
│   │   └── Controllers/             # Contrôleurs Web & Admin (HomeController, ServiceController...)
│   ├── Livewire/
│   │   └── Forms/                   # Formulaires Livewire (LoginForm...)
│   ├── Mail/
│   │   └── ContactRequestMail.php   # Notification Mailable Markdown
│   ├── Models/
│   │   ├── Article.php              # Modèle Article (UUID, Slugs, SoftDeletes)
│   │   ├── Contact.php              # Modèle Demandes de Contact
│   │   ├── Laws.php                 # Modèle Textes réglementaires / Lois
│   │   ├── Setting.php              # Modèle Réglages globaux (Cached)
│   │   └── User.php                 # Modèle Utilisateur avec casting JSON permissions
│   └── Policies/                    # Autorisations RBAC (ArticlePolicy, UserPolicy...)
├── database/
│   ├── migrations/                  # Migrations de la base de données
│   └── seeders/                     # Données de test et d'initialisation
├── lang/
│   ├── fr/                          # Traductions Français
│   └── en/                          # Traductions Anglais
├── resources/
│   ├── css/                         # Directives Tailwind CSS v4
│   ├── js/                          # Entrées JS Vite & SweetAlert2
│   └── views/
│       ├── components/              # Composants Blade réutilisables
│       ├── dashboard/               # Layouts et pages du Back-Office Admin
│       ├── emails/                  # Templates de mails Markdown
│       ├── home/                    # Pages et sections du site vitrine public
│       └── livewire/                # Composants réactifs Livewire / Volt (Admin & Public)
├── routes/
│   ├── web.php                      # Routes publiques et protégées de l'application
│   └── auth.php                     # Routes d'authentification Breeze / Volt
└── tailwind.config.js               # Configuration Tailwind CSS
```

---

## 🛡 Modèle de Données & Sécurité (RBAC)

L'application intègre un système de contrôle d'accès basé sur les rôles et permissions (**RBAC - Role-Based Access Control**) via une colonne JSON `permissions` sur le modèle `User` et une énumération PHP `AccessLevel` :

- `AccessLevel::NONE` (`'none'`) : Aucun accès à la fonctionnalité.
- `AccessLevel::VIEW` (`'view'`) : Consultation en lecture seule.
- `AccessLevel::AUTHOR` (`'author'`) : Création et gestion de ses propres contenus.
- `AccessLevel::FULL` (`'full'`) : Privilèges totaux (administration, édition et suppression globale).

Les autorisations sont vérifiées au niveau des routes et composants grâce aux **Policies Laravel** (`ArticlePolicy`, `UserPolicy`, `SettingPolicy`, `LawsPolicy`, `ContactPolicy`).

---

## 🚀 Installation & Configuration

### Prérequis
- **PHP** >= 8.2 (extensions requis : `mbstring`, `pdo`, `xml`, `cURL`, `sqlite3` / `pdo_mysql`)
- **Composer** >= 2.x
- **Node.js** >= 18.x & **npm**

### Étapes d'installation

1. **Cloner le projet et accéder au répertoire** :
   ```bash
   git clone <url-du-depot>
   cd cincorsa
   ```

2. **Installer les dépendances PHP et Node.js** :
   ```bash
   composer install
   npm install
   ```

3. **Configurer l'environnement** :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Exécuter les migrations et seeders** :
   ```bash
   touch database/database.sqlite # si utilisation de SQLite
   php artisan migrate --seed
   ```

5. **Créer le lien symbolique vers le stockage public** :
   ```bash
   php artisan storage:link
   ```

6. **Lancer le serveur de développement** :
   ```bash
   composer run dev
   ```
   *Note : Cette commande utilise `concurrently` pour démarrer simultanément `artisan serve`, `artisan queue:listen`, `artisan pail` et `vite`.*

---

## ⚙️ Variables d'environnement (.env)

Ajustez les clés principales dans le fichier `.env` :

```ini
APP_NAME="CINV-COR SA"
APP_ENV=local
APP_URL=http://localhost:8000

# Base de données
DB_CONNECTION=sqlite

# Configuration Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="contact@cinvcorsa.com"
MAIL_FROM_NAME="${APP_NAME}"

# Protection reCAPTCHA v3
RECAPTCHA_PUBLIC_KEY="votre_cle_publique_google"
RECAPTCHA_PRIVATE_KEY="votre_cle_privee_google"

# Sentry (Monitoring)
SENTRY_LARAVEL_DSN="votre_dsn_sentry"
```

---

## 💡 Securité & reCAPTCHA v3

Le formulaire de contact (`resources/views/livewire/pages/public/contact-form.blade.php`) utilise la version 3 de **Google reCAPTCHA** :
1. Le jeton frontend est généré à la soumission du formulaire sans déranger l'utilisateur (sans Challenge visuel).
2. Le backend interroge l'API `https://www.google.com/recaptcha/api/siteverify`.
3. Un score minimum de **`0.5`** est exigé pour valider l'envoi du message.

---

## 📝 Licence

Ce projet est sous licence propriétaire pour **CINV-COR SA**. Tous droits réservés.
