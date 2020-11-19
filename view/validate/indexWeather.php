<article class="article">
    <h1 class="heading"><?= $data["heading"] ?></h1>
    <p>Skriv in din ip-address för att se kommande väder nära dig.</p>
    <form method="POST" action=<?= $data["action"] ?>>
        <input name="ip" value="194.47.150.9" type="text" require>
        <input type="submit" value="Skicka">
    </form>
</article>