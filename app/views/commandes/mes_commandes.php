<h1>Mes commandes</h1>

<ul>
<?php foreach ($commandes as $commande): ?>
    <li>
        Commande #<?= $commande['id_commande'] ?> -
        <?= $commande['statut'] ?> -
        <?= $commande['prix_total'] ?> €

        <?php if ($commande['statut'] === 'en_attente'): ?>
            | <a href="index.php?page=commande-annuler&id=<?= $commande['id_commande'] ?>">
                Annuler
              </a>
        <?php endif; ?>
        
        <?php if ($commande['statut'] === 'livree'): ?>
    | <a href="index.php?page=avis-create&id=<?= $commande['id_commande'] ?>">
        Laisser un avis
      </a>
<?php endif; ?>
    </li>
<?php endforeach; ?>

</ul>

<a href="index.php?page=home">Retour</a>
