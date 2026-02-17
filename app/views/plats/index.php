<?php require __DIR__ . '/../layout/header.php'; ?>

<section>
    <h2>Nos plats</h2>

    <div class="card-container">

        <?php foreach ($plats as $plat): ?>

            <div class="card">

                <h3><?= htmlspecialchars($plat['nom']) ?></h3>

                <p>
                    <strong>Type :</strong>
                    <?= htmlspecialchars($plat['type_plat']) ?>
                </p>

                <p>
                    <?= htmlspecialchars($plat['description']) ?>
                </p>

                <?php if (!empty($plat['allergenes'])): ?>
                    <p>
                        <strong>Allergènes :</strong><br>
                        <?php foreach ($plat['allergenes'] as $allergene): ?>
                            <span class="badge">
                                <?= htmlspecialchars($allergene['nom']) ?>
                            </span>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>
</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>