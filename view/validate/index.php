<article class="article">
    <h1 class="heading"><?= $data["heading"] ?></h1>
    <?php if ($data["type"] == "rest" || $data["type"] == null) : ?>
        <p>Skriv in en ip-adress för att se om den validerar.</p>
        <form method="POST" action=<?= $data["action"] ?>>
            <input name="ip" type="text" require>
            <input type="submit" value="Skicka">
        </form>
    <?php endif; ?>
    <?php if ($data["type"] == "rest") : ?>
        <br>
        <p> <strong>Hur man använder API:et:</strong> För att hämta svaret anropa routen <code>/api</code>. Ip adressen anger du med nyckeln "ip" (i till exempel Postman). Svaret returneras som JSON.</p><br>
        <form action="api" method="POST">
            <input name="ip" type="hidden" value="2001:0db8:85a3:0000:0000:8a2e:0370:7334">
            <input type="submit" value="Testroute 1">
        </form><br>
        <form action="api" method="POST">
            <input name="ip" type="hidden" value="127.0.0.1">
            <input type="submit" value="Testroute 2">
        </form><br>
        <form action="api" method="POST">
            <input name="ip" type="hidden" value="194.47.150.9">
            <input type="submit" value="Testroute 3">
        </form>
    <?php endif; ?>
    <?php if ($data["type"] == "geo" || $data["type"] == "geoRest") : ?>
        <p>Skriv in en ip-adress för att bland annat se dens geografiska position och ort/land.</p>
        <form method="POST" action=<?= $data["action"] ?>>
            <input name="ip" type="text" value="<?= $data["placeholder"]?>" require>
            <input type="submit" value="Skicka">
        </form>
    <?php endif; ?>
    <?php if ($data["type"] == "geoRest") : ?>
        <br>
        <p> <strong>Hur man använder API:et:</strong> För att hämta svaret anropa routen <code>/apiGeo</code>. Ip adressen anger du med nyckeln "ip" (i till exempel Postman). Svaret returneras som JSON.</p><br>
        <form action="apiGeo" method="POST">
            <input name="ip" type="hidden" value="172.217.21.142">
            <input type="submit" value="Testroute 1">
        </form><br>
        <form action="apiGeo" method="POST">
            <input name="ip" type="hidden" value="140.82.121.4">
            <input type="submit" value="Testroute 2">
        </form><br>
        <form action="apiGeo" method="POST">
            <input name="ip" type="hidden" value="194.47.150.9">
            <input type="submit" value="Testroute 3">
        </form>
    <?php endif; ?>
</article>