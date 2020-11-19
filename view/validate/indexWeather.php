<article class="article">
    <h1 class="heading"><?= $data["heading"] ?></h1>
    <p>Skriv in lat/long för att se kommando väder.</p>
    <form method="POST" action=<?= $data["action"] ?>>
        <input placeholder="Lattitud" value="56.164530" name="lat" type="text" require>
        <input placeholder="Longitud" value="14.865926" name="long" type="text" require>
        <input type="submit" value="Skicka">
    </form>
</article>