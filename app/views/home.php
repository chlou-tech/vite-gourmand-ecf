<?php require __DIR__ . '/layout/header.php'; ?>

<section>
    <h2>Présentation de l’entreprise</h2>
    <p>
        Vite & Gourmand est une entreprise qui existe depuis plus de 25 ans à Bordeaux, spécialisée dans la préparation
        et la livraison de repas de qualité. Nous proposons des menus variés,
        adaptés à tous les goûts et à tous les régimes alimentaires.
    </p>
</section>

<section>
    <h2>Notre équipe</h2>
    <p>
        Notre équipe est composée de Julie et José. Deux personnes passionnées,
        attentif et engagés à offrir un service rapide et professionnel.
    </p>
</section>

<section>
    <h2>Avis clients</h2>

    <?php if (!empty($avisValides)): ?>
        <?php foreach ($avisValides as $avis): ?>
            <div class="avis">
                ⭐ <?= htmlspecialchars($avis['note']) ?>/5 <br>
                <?= htmlspecialchars($avis['commentaire']) ?>
            </div>
            <br>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun avis pour le moment.</p>
    <?php endif; ?>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>