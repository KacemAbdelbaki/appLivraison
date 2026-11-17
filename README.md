# appLivraison

The admin back office for a food delivery app ("livraison" means delivery). Administrators manage clients, staff,
delivery drivers and the product catalogue. The interface is in French.

Built with Laravel 11 and Blade.

> **Status:** early work in progress. The admin CRUD pages exist, but the database migrations don't match the
> models yet (see [Database](#database)).

## Features

| Section | What you can do |
|---------|-----------------|
| **Clients** | add, list, edit and delete clients (name, city, phone, email) |
| **Personnel** | manage staff (name, address, phone, email, job title, start date) |
| **Équipes** | group staff into teams |
| **Transporteurs** | register staff members as delivery drivers |
| **Catégories / Sous-catégories** | manage the product catalogue's categories and sub-categories |

## Getting started

### Requirements

- PHP 8.2+ and [Composer](https://getcomposer.org)
- MySQL, or SQLite for a quick local try

### Install and run

```bash
git clone https://github.com/KacemAbdelbaki/appLivraison.git
cd appLivraison
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Open http://localhost:8000/home for the admin dashboard.

## Database

The models use these tables:

| Model | Table |
|-------|-------|
| `Client` | `client` |
| `Personnels` | `personnels` |
| `Equipe` | `equipe` |
| `Transporteur` | `transporteur` |
| `Categories` | `categories` |
| `SousCategories` | `sous_categories` |

The current migration (`2024_06_29_210622_update_schema.php`) creates a different, earlier schema: `clients`,
`livreurs`, `restaurants`, `menus`, `plats`, `supplements` and `categories`. Until the migrations are updated, create
the tables listed above using the columns in each model's `$fillable`.

## Pages

| Path | Page |
|------|------|
| `/home` | Dashboard |
| `/listeClient`, `/ajouterClient`, `/modifierClient/{id}` | Clients |
| `/listePersonnels`, `/ajouterPersonnel`, `/modifierPersonnel/{id}` | Staff |
| `/transporteur`, `/ajouterTransporteur` | Delivery drivers |
| `/categorie`, `/ajouterCategorie`, `/sousCategorie`, `/ajouterSousCategorie` | Catalogue |

## Project structure

```
app/
├── Http/Controllers/   # Client, Personnels, Equipe, Transporteur, Categories, SousCategories
└── Models/
resources/views/Administrateur/   # One folder per section, plus layout (navbar, sidebar, footer)
routes/web.php
database/migrations/
```
