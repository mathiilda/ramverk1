<article class="article">
    <h1 class="heading"><?= $data["heading"] ?></h1>
    <p>Skriv in en ip-adress för att se om den validerar.</p>
    <form method="GET" action=<?= $data["action"] ?>>
        <input name="ip" type="text">
        <input type="submit" value="Skicka">
    </form>
    <?php if ($data["json"] == true) : ?>
        <p>Svaret kommer att skrivas ut som JSON. För att hämta svaret anropas routen /api med ip-adressen du anger som parameter. Svaret returneras och skrivs ut på resultat-sidan.</p><br>
        <a href="api?ip=8.8.4.4">Testroute 1: 8.8.4.4</a><br>
        <a href="api?ip=127.0.0.1">Testroute 2: 127.0.0.1</a><br>
        <a href="api?ip=194.47.150.9">Testroute 3: 194.47.150.9</a>
    <?php endif; ?>
</article>