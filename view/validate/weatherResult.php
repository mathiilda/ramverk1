<?php $count = 0; ?>

<article class="article">
    <h1 class="heading">Resultat</h1>
    <?php if ($data["forecast"] == "error") : ?>
        <p>Vi kunde inte hitta en plats som matchade dina kordinater. Försök igen.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Antal dagar från idag</th>
                <th>Väder</th>
            </tr>
            <?php foreach ($data["forecast"] as $day) : ?>
                <tr>
                    <td><?= strval($count) ?></td>
                    <td><?= strval($day->weather[0]->description) ?></td>
                    <?php $count += 1; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</article>