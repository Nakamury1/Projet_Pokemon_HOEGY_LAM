<?php
$combatTermine = false;
$tour = isset($_POST['tour']) ? $_POST['tour'] : 1;

echo "<body class='fight'>";

echo "<div class='PP'>";
echo "<div class='PP1'>";
echo "<h3 class='nom_pokemon'>".$pokemons[$id-1]->getNom()."</h3>";
echo "<img src='".$pokemons[$id-1]->getImage()."' class='img_combat'>";
echo "<p class='PV'>PV: ".$pokemons[$id-1]->getPointsdevie()."</p>";
echo "</div>";

echo "<div class='PP1'>";
echo "<h3 class='nom_pokemon'>".$pokemons[14]->getNom()."</h3>";
echo "<img src='".$pokemons[14]->getImage()."' class='img_combat'>";
echo "<p class='PV'>PV: ".$pokemons[14]->getPointsdevie()."</p>";
echo "</div>";
echo "</div>";

echo "<section class='zone_BC'>";

echo "<div class='commentaire'>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($tour % 2 == 1) { // Tour du joueur
        if (isset($_POST['action']) && $_POST['action'] === 'attaquer') {
            $pokemons[$id-1]->Attaquer($pokemons[14]);
        } elseif (isset($_POST['action']) && $_POST['action'] === 'capacite_speciale') {
            $pokemons[$id-1]->CapaciteSpeciale($pokemons[14]);
        }
    } else { // Tour du Pokémon adverse
        $pokemons[14]->Attaquer($pokemons[$id-1]);
        echo "<p class='text_comm'>" . $pokemons[14]->getNom() . " attaque " . $pokemons[$id-1]->getNom() . "!</p>";
    }

    if ($pokemons[14]->estKO()) {
        echo "<div class='text'>";
        echo "<p class='text_comm'>" . $pokemons[14]->getNom() . " est KO ! Le combat est terminé.</p>";
        echo "<form method='post' action='/pokemon/findAll'>";
        echo "<button type='submit'>Retour à la liste des Pokémon</button>";
        echo "</form>";
        echo "</div>";
        $combatTermine = true;
    } elseif ($pokemons[$id-1]->estKO()) {
        echo "<div class='text'>";
        echo "<p class='text_comm'>" . $pokemons[$id-1]->getNom() . " est KO ! Vous avez perdu le combat.</p>";
        echo "<form method='post' action='/pokemon/findAll'>";
        echo "<button type='submit'>Retour à la liste des Pokémon</button>";
        echo "</form>";
        echo "</div>";
        $combatTermine = true;
    } else {
        echo "<p class='text_comm'>Points de vie de " . $pokemons[14]->getNom() . " après l'action: " . $pokemons[14]->getPointsdevie() . "</p>";
        echo "<p class='text_comm'>Points de vie de " . $pokemons[$id-1]->getNom() . " après l'action: " . $pokemons[$id-1]->getPointsdevie() . "</p>";
    }

    $tour++;
}

echo "</div>";

if (!$combatTermine) {
    echo "<form method='post' class='BC'>";
    echo "<input type='hidden' name='pokemon1_pv' value='" . $pokemons[$id-1]->getPointsdevie() . "'>";
    echo "<input type='hidden' name='pokemon2_pv' value='" . $pokemons[14]->getPointsdevie() . "'>";
    echo "<input type='hidden' name='tour' value='" . $tour . "'>";
    echo "<button class='button_combat' type='submit' name='action' value='attaquer'>Attaquer</button>";
    echo "<button class='button_combat' type='submit' name='action' value='capacite_speciale'>Capacité Spéciale</button>";
    echo "<button class='button_combat' type='submit' name='action' value='soigner'>Soigner</button>";
    echo "</form>";
}

echo "</section>";

echo "</body>";

?>
