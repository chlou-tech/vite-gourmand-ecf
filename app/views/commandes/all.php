<h1>Toutes les commandes</h1>

<ul>
<?php foreach ($commandes as $commande): ?>
    <li>
        Commande #<?= $commande['id_commande'] ?> -
        <?= $commande['statut'] ?> -
        <?= $commande['prix_total'] ?> € 

        <br>
        Changer statut :
        <a href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=validee">Validée</a> |
        <a href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=en_preparation">En préparation</a> |
        <a href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=livree">Livrée</a> |
        <a href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=annulee">Annulée</a>
    </li>
    <br>
<?php endforeach; ?>
</ul>

<a href="index.php?page=home">Retour</a>
