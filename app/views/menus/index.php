<?php require __DIR__ . '/../layout/header.php'; ?>

<section>
    <h2>Nos menus</h2>

    <!-- ===================== -->
    <!-- 🔎 FILTRES -->
    <!-- ===================== -->

        <div class="filters">

            <div class="filters">

            <label>Prix maximum :</label>
            <input type="number" id="prixMax" step="0.01">

            <label>Thème :</label>
            <input type="text" id="theme">

            <label>Régime :</label>
            <input type="text" id="regime">

            <label>Minimum personnes :</label>
            <input type="number" id="nbPersonnes">

        </div>

    </div>

    <br>

    <!-- ===================== -->
    <!-- 📋 LISTE DES MENUS -->
    <!-- ===================== -->

    <div class="card-container" id="menu-container">
        <?php require __DIR__ . '/_list.php'; ?>
    </div>
    
</section>

<script>
function fetchMenus() {
    const prixMax = document.getElementById('prixMax').value;
    const theme = document.getElementById('theme').value;
    const regime = document.getElementById('regime').value;
    const nbPersonnes = document.getElementById('nbPersonnes').value;

    const params = new URLSearchParams({
        ajax: 1,
        prixMax: prixMax,
        theme: theme,
        regime: regime,
        nbPersonnes: nbPersonnes
    });

    fetch('index.php?page=menus&' + params.toString())
        .then(response => response.text())
        .then(html => {
            document.getElementById('menu-container').innerHTML = html;
        });
}

// événements
document.getElementById('prixMax').addEventListener('input', fetchMenus);
document.getElementById('theme').addEventListener('input', fetchMenus);
document.getElementById('regime').addEventListener('input', fetchMenus);
document.getElementById('nbPersonnes').addEventListener('input', fetchMenus);
</script>

<?php require __DIR__ . '/../layout/footer.php'; ?>