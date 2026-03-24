# 🍽️ Vite & Gourmand – Application de gestion traiteur
## 🚀 Application en ligne

👉 https://viteetgourmand.infinityfreeapp.com

---

## 📖 Présentation du projet

Vite & Gourmand est une application web développée en PHP (architecture MVC) permettant la gestion complète d’une entreprise traiteur.

Le projet a été réalisé dans le cadre d’un ECF (Évaluation en Cours de Formation).

L’application distingue trois rôles :

- 👤 Client

- 👨‍🍳 Employé

- 👑 Administrateur

---

## 🔐 Comptes de test

| Rôle          | Email                                     | Mot de passe |
| ------------- | ----------------------------------------- | ------------ |
| 👑 Admin      | [admin@test.fr](mailto:admin@test.fr)     | test123     |
| 👨‍🍳 Employé | [employe@test.fr](mailto:employe@test.fr) | employe123   |
| 👤 Client     | [user@test.fr](mailto:user@test.fr)       | user123      |

---

## ⚙️ Fonctionnalités principales
### 👀 Visiteur

- Consultation des menus

- Consultation des plats

- Consultation des avis validés

- Page de contact

- Inscription / Connexion

### 👤 Client

- Création de commandes

- Consultation et annulation de ses commandes

- Dépôt d’avis

- Gestion de son compte

### 👨‍🍳 Employé

- Gestion des commandes (mise à jour des statuts)

- Validation / refus des avis

- Création de menus

- Création de plats

### 👑 Administrateur

- Gestion complète des utilisateurs

- Gestion des commandes

- Gestion des avis

- Création menus & plats

- Consultation des statistiques :

  - Nombre d’utilisateurs

  - Chiffre d’affaires

  - Commandes par statut

---

## 🛠️ Stack technique

- Front-end : HTML5, CSS3

- Back-end : PHP (architecture MVC)

- Base de données : MySQL (via PDO)

- Déploiement : InfinityFree

- Gestion de version : Git / GitHub

---

## 📂 Structure du projet

`app/`        → Controllers, Models, Views

`config/`     → Configuration base de données

`public/`     → Point d’entrée (index.php)

`sql/`        → Scripts SQL complémentaires

`database.sql` → Script complet de création de la base

`.env.example` → Exemple de configuration

---

## 💻 Installation en local

### 1️⃣ Cloner le projet

git clone https://github.com/chlou-tech/vite-gourmand-ecf.git

### 2️⃣ Configuration

Copier le fichier :
`.env.example`

Le renommer en :
`.env`

Modifier les informations :
```bash
DB_HOST=localhost
DB_NAME=vite_gourmand
DB_USER=root
DB_PASS=
```

### 3️⃣ Création de la base

Créer une base :
`vite_gourmand`

Importer :
`database.sql`
via phpMyAdmin.

### 4️⃣ Lancer l’application

Placer le projet dans :
`htdocs/`

Puis accéder à :

http://localhost/Vite&Gourmand/public/index.php?page=home

---

## Lancement avec Docker

L’application peut être lancée via Docker afin de garantir un environnement de développement identique sur toutes les machines.

### 📦 Prérequis
- Docker
- Docker Compose

🚀 Lancer les containers :
  `docker compose up -d`

→ L’application sera accessible sur :
`http://localhost:8000`

### 🗄️ Importer la base de données

⚠️ Important : l’import doit être réalisé depuis le container pour éviter les problèmes d’encodage.

`docker cp database.sql vite_gourmand_db:/database.sql`

Puis :

`docker exec -it vite_gourmand_db mysql -uroot -proot vite_gourmand -e "source /database.sql"`

🛑 Arrêter les containers :
`docker compose down`

♻️ Réinitialiser complètement la base :
```bash
docker compose down -v
docker compose up -d
```
---

## 🔐 Sécurité mise en place

- Utilisation de PDO avec requêtes préparées

- Protection contre les injections SQL

- Gestion des rôles avec contrôle d’accès

- Séparation MVC

- Protection des pages sensibles via middleware personnalisé

---

## 🌿 Gestion Git

- Branche principale : main

- Branche de développement : develop

- Fonctionnalités développées sur branches dédiées

---

## 📊 Livrables associés

- Script SQL complet

- README d’installation

- Application déployée

- Documentation technique (à fournir séparément)

