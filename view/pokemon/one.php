<?php

if ($pokemon) {
    echo "<h2>". $pokemon['nom'] ."</h2>";
    echo "<img src='". $pokemon['img'] ."'>";
    echo "<p>Type: ". $pokemon['type']."</p>";
    echo "<p>PV: ". $pokemon['pointsdevie'] ."</p>";
    echo "<div class='ATKDEF'>";
        echo "<p class='ATKDEF_item'>ATK: ". $pokemon['attaque'] ."</p>";
        echo "<p class='ATKDEF_item'>DEF: ". $pokemon['defense'] ."</p>";
    echo "</div>";
}
else {
    echo '<p>Pokemon introuvable</p>';
}

?>