INSERT INTO role (libelle) VALUES
('utilisateur'),
('employe'),
('administrateur');

INSERT INTO horaire (jour_semaine, heure_ouverture, heure_fermeture) VALUES
('Lundi', '08:00:00', '18:00:00'),
('Mardi', '08:00:00', '18:00:00'),
('Mercredi', '08:00:00', '18:00:00'),
('Jeudi', '08:00:00', '18:00:00'),
('Vendredi', '08:00:00', '18:00:00'),
('Samedi', '09:00:00', '16:00:00'),
('Dimanche', '09:00:00', '14:00:00');

INSERT INTO allergene (nom) VALUES
('Gluten'),
('Lactose'),
('Fruits à coque'),
('Œufs'),
('Soja');

INSERT INTO plat (nom, type_plat, description) VALUES
('Salade de chèvre chaud', 'Entrée', 'Salade verte, chèvre, miel'),
('Saumon rôti', 'Plat', 'Saumon frais et légumes de saison'),
('Lasagnes végétariennes', 'Plat', 'Lasagnes aux légumes'),
('Tarte aux pommes', 'Dessert', 'Tarte maison'),
('Mousse au chocolat', 'Dessert', 'Chocolat noir');

INSERT INTO plat_allergene (id_plat, id_allergene) VALUES
(1, 2), -- chèvre = lactose
(2, 4), -- saumon = œufs
(5, 2); -- mousse = lactose

INSERT INTO menu (titre, description, theme, regime, nb_personnes_min, prix_base, conditions, stock, actif) VALUES
(
  'Menu Classique',
  'Menu traditionnel pour tous types d’événements',
  'Classique',
  'Classique',
  10,
  25.00,
  'Commande minimum 3 jours à l’avance',
  10,
  TRUE
),
(
  'Menu Végétarien',
  'Menu sans viande',
  'Événement',
  'Végétarien',
  8,
  22.00,
  'Commande minimum 2 jours à l’avance',
  8,
  TRUE
);

INSERT INTO menu_plat (id_menu, id_plat) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 3),
(2, 5);

