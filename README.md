# Vite & Gourmand – Application de gestion traiteur
## Présentation du projet

Vite & Gourmand est une application web développée en PHP selon une architecture MVC.
Elle permet la gestion complète d’une entreprise traiteur, avec différents niveaux d’accès (Client, Employé, Administrateur).

Le projet a été réalisé dans le cadre d’un ECF (Évaluation en Cours de Formation).

---

## Fonctionnalités principales
### Visiteur

- Consultation des menus
- Consultation des plats
- Consultation des avis validés
- Page de contact
- Inscription / Connexion

### Client

- Création de commandes
- Consultation et annulation de ses commandes
- Dépôt d’avis
- Gestion de son compte

### Employé

- Gestion des commandes (mise à jour des statuts)
- Validation / refus des avis
- Création de menus
- Création de plats

### Administrateur

- Gestion complète des utilisateurs
- Gestion des commandes
- Gestion des avis
- Création menus & plats
- Consultation des statistiques :
  - Nombre d’utilisateurs
  - Chiffre d’affaires
  - Commandes par statut

---

## Stack technique

- Front-end : HTML5, CSS3
- Back-end : PHP (architecture MVC)
- Base de données : MySQL (via PDO)
- Serveur local : XAMPP
- Gestion de version : Git / GitHub

---

## Structure du projet
`app/`        → Controllers, Models, Views

`config/`     → Configuration base de données

`public/`     → Point d’entrée (index.php)

`sql/`        → Scripts SQL complémentaires

`database.sql` → Script complet de création de la base

`.env.example` → Exemple de configuration

--- 

## Installation en local
### Cloner le projet
```bash
git clone https://github.com/chlou-tech/vite-gourmand-ecf.git
```
### Configuration

**1.** Copier le fichier `.env.example`

**2.** Le renommer en `.env`

**3.** Modifier les informations de connexion à la base de données

*Exemple :*
```bash
DB_HOST=localhost
DB_NAME=vite_gourmand
DB_USER=root
DB_PASS=
```
### Création de la base de données

**1.** Créer une base nommée :
```bash
vite_gourmand
```

**2.** Importer le fichier :
```bash
database.sql
```

via phpMyAdmin.

### Lancer l’application

Placer le projet dans le dossier `htdocs` de XAMPP puis accéder à :
```bash
http://localhost/Vite&Gourmand/public/index.php?page=home
```
