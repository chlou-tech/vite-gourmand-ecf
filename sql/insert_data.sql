INSERT INTO allergene VALUES ('1','1','Gluten','Gluten');
INSERT INTO allergene VALUES ('2','2','Lactose','Lactose');
INSERT INTO allergene VALUES ('3','3','Fruits à coque','Fruits à coque');
INSERT INTO allergene VALUES ('4','4','Œufs','Œufs');
INSERT INTO allergene VALUES ('5','5','Soja','Soja');

INSERT INTO avis VALUES ('1','1','5','5','top top','top top','1','1','2026-02-13 14:26:40','2026-02-13 14:26:40','4','4');
INSERT INTO avis VALUES ('2','2','3','3','ça va','ça va','1','1','2026-02-17 18:22:57','2026-02-17 18:22:57','4','4');


INSERT INTO commande VALUES ('1','1','2026-02-12 19:01:25','2026-02-12 19:01:25','2026-02-12','2026-02-12','18:55:00','18:55:00','123 rue du test','123 rue du test','7','7','175.00','175.00','10.00','10.00','11','11','1','1','livree','livree');
INSERT INTO commande VALUES ('2','2','2026-02-12 19:01:41','2026-02-12 19:01:41','2026-02-12','2026-02-12','18:55:00','18:55:00','123 rue du test','123 rue du test','7','7','175.00','175.00','10.00','10.00','11','11','1','1','annulee','annulee');
INSERT INTO commande VALUES ('3','3','2026-02-12 19:10:02','2026-02-12 19:10:02','2026-02-24','2026-02-24','12:09:00','12:09:00','123 rue du test encore','123 rue du test encore','4','4','88.00','88.00','10.00','10.00','11','11','2','2','livree','livree');
INSERT INTO commande VALUES ('4','4','2026-02-13 14:25:17','2026-02-13 14:25:17','2026-02-21','2026-02-21','14:25:00','14:25:00','123 rue du test encore','123 rue du test encore','10','10','220.00','220.00','10.00','10.00','11','11','2','2','livree','livree');


INSERT INTO horaire VALUES ('1','1','Lundi','Lundi','08:00:00','08:00:00','18:00:00','18:00:00');
INSERT INTO horaire VALUES ('2','2','Mardi','Mardi','08:00:00','08:00:00','18:00:00','18:00:00');
INSERT INTO horaire VALUES ('3','3','Mercredi','Mercredi','08:00:00','08:00:00','18:00:00','18:00:00');
INSERT INTO horaire VALUES ('4','4','Jeudi','Jeudi','08:00:00','08:00:00','18:00:00','18:00:00');
INSERT INTO horaire VALUES ('5','5','Vendredi','Vendredi','08:00:00','08:00:00','18:00:00','18:00:00');
INSERT INTO horaire VALUES ('6','6','Samedi','Samedi','09:00:00','09:00:00','16:00:00','16:00:00');
INSERT INTO horaire VALUES ('7','7','Dimanche','Dimanche','09:00:00','09:00:00','14:00:00','14:00:00');


INSERT INTO menu VALUES ('1','1','Menu Classique','Menu Classique','Menu traditionnel pour tous types d’événements','Menu traditionnel pour tous types d’événements','Classique','Classique','Classique','Classique','10','10','25.00','25.00','Commande minimum 3 jours à l’avance','Commande minimum 3 jours à l’avance','10','10','1','1');
INSERT INTO menu VALUES ('2','2','Menu Végétarien','Menu Végétarien','Menu sans viande','Menu sans viande','Événement','Événement','Végétarien','Végétarien','8','8','22.00','22.00','Commande minimum 2 jours à l’avance','Commande minimum 2 jours à l’avance','8','8','1','1');


INSERT INTO menu_plat VALUES ('1','1','1','1');
INSERT INTO menu_plat VALUES ('2','2','1','1');
INSERT INTO menu_plat VALUES ('1','1','2','2');
INSERT INTO menu_plat VALUES ('2','2','3','3');
INSERT INTO menu_plat VALUES ('1','1','4','4');
INSERT INTO menu_plat VALUES ('2','2','5','5');


INSERT INTO plat VALUES ('1','1','Salade de chèvre chaud','Salade de chèvre chaud','Entrée','Entrée','Salade verte, chèvre, miel','Salade verte, chèvre, miel');
INSERT INTO plat VALUES ('2','2','Saumon rôti','Saumon rôti','Plat','Plat','Saumon frais et légumes de saison','Saumon frais et légumes de saison');
INSERT INTO plat VALUES ('3','3','Lasagnes végétariennes','Lasagnes végétariennes','Plat','Plat','Lasagnes aux légumes','Lasagnes aux légumes');
INSERT INTO plat VALUES ('4','4','Tarte aux pommes','Tarte aux pommes','Dessert','Dessert','Tarte maison','Tarte maison');
INSERT INTO plat VALUES ('5','5','Mousse au chocolat','Mousse au chocolat','Dessert','Dessert','Chocolat noir','Chocolat noir');
INSERT INTO plat VALUES ('6','6','Testtest','Testtest','miam miam','miam miam','un bon plat pour les gourmands','un bon plat pour les gourmands');


INSERT INTO plat_allergene VALUES ('6','6','1','1');
INSERT INTO plat_allergene VALUES ('1','1','2','2');
INSERT INTO plat_allergene VALUES ('5','5','2','2');
INSERT INTO plat_allergene VALUES ('6','6','2','2');
INSERT INTO plat_allergene VALUES ('2','2','4','4');


INSERT INTO role VALUES ('1','1','utilisateur','utilisateur');
INSERT INTO role VALUES ('2','2','employe','employe');
INSERT INTO role VALUES ('3','3','administrateur','administrateur');


INSERT INTO utilisateur VALUES ('4','4','Admin','Admin','Test','Test','admin@test.fr','admin@test.fr','$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay','$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay',NULL,NULL,NULL,NULL,'1','1','3','3');
INSERT INTO utilisateur VALUES ('11','11','User','User','Test','Test','user@test.fr','user@test.fr','$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay','$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay',NULL,NULL,NULL,NULL,'0','0','2','2');
INSERT INTO utilisateur VALUES ('12','12','Employe','Employe','Test','Test','employe@test.fr','employe@test.fr','$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay','$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay',NULL,NULL,NULL,NULL,'0','0','2','2');
INSERT INTO utilisateur VALUES ('14','14','Test','Test','Utilisateur','Utilisateur','user@test.fr','user@test.fr','$2y$10$84W0rka.l9tuavTSBAilLuPoI8xuBDxnHtuLgHqOcV17sAo4Yxn7e','$2y$10$84W0rka.l9tuavTSBAilLuPoI8xuBDxnHtuLgHqOcV17sAo4Yxn7e',NULL,NULL,NULL,NULL,'0','0','1','1');
INSERT INTO utilisateur VALUES ('15','15','Employé','Employé','Test','Test','employe@test.fr','employe@test.fr','$2y$10$yU.JUcegCcA5jf7JXv.3Suf3.nOacWOYWgmGscLB5ZT4LSzPrE.mq','$2y$10$yU.JUcegCcA5jf7JXv.3Suf3.nOacWOYWgmGscLB5ZT4LSzPrE.mq',NULL,NULL,NULL,NULL,'1','1','2','2');
INSERT INTO utilisateur VALUES ('16','16','Utilisateur','Utilisateur','Test','Test','user@test.fr','user@test.fr','$2y$10$ZM0s/WP3qSzmte2J./porOBiRXhXKc/5Kfy6WCdurHr1Jt8hQ/AEC','$2y$10$ZM0s/WP3qSzmte2J./porOBiRXhXKc/5Kfy6WCdurHr1Jt8hQ/AEC',NULL,NULL,NULL,NULL,'1','1','1','1');

