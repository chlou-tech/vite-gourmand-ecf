CREATE TABLE role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE utilisateur (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    adresse TEXT,
    actif BOOLEAN DEFAULT TRUE,
    id_role INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES role(id_role)
);

CREATE TABLE menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    theme VARCHAR(100),
    regime VARCHAR(100),
    nb_personnes_min INT NOT NULL,
    prix_base DECIMAL(10,2) NOT NULL,
    conditions TEXT,
    stock INT NOT NULL,
    actif BOOLEAN DEFAULT TRUE
);

CREATE TABLE plat (
    id_plat INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    type_plat VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE allergene (
    id_allergene INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE menu_plat (
    id_menu INT NOT NULL,
    id_plat INT NOT NULL,
    PRIMARY KEY (id_menu, id_plat),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu),
    FOREIGN KEY (id_plat) REFERENCES plat(id_plat)
);

CREATE TABLE plat_allergene (
    id_plat INT NOT NULL,
    id_allergene INT NOT NULL,
    PRIMARY KEY (id_plat, id_allergene),
    FOREIGN KEY (id_plat) REFERENCES plat(id_plat),
    FOREIGN KEY (id_allergene) REFERENCES allergene(id_allergene)
);

CREATE TABLE commande (
    id_commande INT AUTO_INCREMENT PRIMARY KEY,
    date_commande DATETIME NOT NULL,
    date_prestation DATE NOT NULL,
    heure_livraison TIME,
    adresse_livraison TEXT,
    nb_personnes INT NOT NULL,
    prix_total DECIMAL(10,2) NOT NULL,
    prix_livraison DECIMAL(10,2),
    id_user INT NOT NULL,
    id_menu INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES utilisateur(id_user),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu)
);

CREATE TABLE commande_statut (
    id INT AUTO_INCREMENT PRIMARY KEY,
    statut VARCHAR(100) NOT NULL,
    date_statut DATETIME NOT NULL,
    id_commande INT NOT NULL,
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande)
);

CREATE TABLE avis (
    id_avis INT AUTO_INCREMENT PRIMARY KEY,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    valide BOOLEAN DEFAULT FALSE,
    date_avis DATETIME,
    id_commande INT NOT NULL,
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande)
);

CREATE TABLE horaire (
    id_horaire INT AUTO_INCREMENT PRIMARY KEY,
    jour_semaine VARCHAR(20) NOT NULL,
    heure_ouverture TIME NOT NULL,
    heure_fermeture TIME NOT NULL
);
