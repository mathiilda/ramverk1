<article class="article">
    <h1 class="heading"><?= $data["heading"] ?></h1>
    <p>Skriv in en ip-adress för att se om den validerar.</p>
    <p><?= $data["json"] ?></p>
    <form method="GET" action=<?= $data["action"] ?>>
        <input name="ip" type="text">
        <input type="submit" value="Skicka">
    </form>
</article>