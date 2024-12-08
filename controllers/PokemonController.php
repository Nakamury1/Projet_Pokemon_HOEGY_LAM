<?php

require_once './app/utils/Render.php';

class PokemonController{
  use Render;

  public function findAll(): void
  {
      $pokemonModel = new pokemonModel();
      $pokemons = $pokemonModel->findAll();

      // préparation du tableau à envoyer au layout
      $data = [
        'title' => 'Liste des pokemons',
        'pokemons' => $pokemons
      ];
  
      // Rendu avec layout
      $this->renderView('pokemon/all', $data);
  }

  public function findOneById(int $id): void
  {
      $pokemonModel = new pokemonModel();
      $pokemon = $pokemonModel->findOneById($id);
   
      require_once './app/views/pokemon/one.php';

      $data = [
        'title' => 'Un pokemon',
        'pokemons' => $pokemon
      ];

      // Rendu avec layout
      $this->renderView('pokemon/one', $data);
  }
  
  public function combat(int $id): void
  {   
      $pokemon1 = new PokemonFeu(1,'Brasegali', 140, 100, 60, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/257.png');
      $pokemon2 = new PokemonEau(2,'Aligatueur', 130, 100, 70, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/160.png');
      $pokemon3 = new PokemonPlante(3,'Torterra', 120, 70, 110, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/389.png');
      $pokemon4 = new PokemonAcier(4,'Exagide', 100, 80, 120, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/681.png');
      $pokemon5 = new PokemonCombat(5,'Lucario', 120, 100, 90, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/448.png');
      $pokemon6 = new PokemonSol(6,'Bourrinos', 120, 90, 120, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/750.png');
      $pokemon7 = new PokemonSpectre(7,'Ectoplasma', 140, 90, 80, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/094.png');
      $pokemon8 = new PokemonTenebres(8,'Trioxhydre', 140, 120, 80, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/635.png');
      $pokemon9 = new PokemonFee(9,'Florges', 140, 100, 80, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/671.png');
      $pokemon10 = new PokemonDragon(10,'Dracolosse', 130, 100, 100, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/149.png');
      $pokemon11 = new PokemonNormal(11,'Leuphorie', 100, 80, 110, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/242.png');
      $pokemon12 = new PokemonInsecte(12,'Cizayox', 130, 80, 110, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/212.png');
      $pokemon13 = new PokemonRoche(13,'Gigalithe', 120, 80, 130, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/526.png');
      $pokemon14 = new PokemonPsy(14,'Alakazam', 140, 80, 110, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/065.png');
      $pokemon15 = new PokemonVol(15,'Flambusard', 130, 110, 90, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/663.png');
      $pokemon16 = new PokemonGlace(16,'Polagriffe', 140, 110, 100, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/614.png');
      $pokemon17 = new PokemonPoison(17,'Miasmax', 120, 100, 90, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/569.png');
      $pokemon18 = new PokemonElectrik(18,'Pharamp', 130, 110, 90, 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/181.png');

      $pokemons =[$pokemon1, $pokemon2, $pokemon3, $pokemon4, $pokemon5, $pokemon6, $pokemon7, $pokemon8, $pokemon9, $pokemon10, $pokemon11, $pokemon12, $pokemon13, $pokemon14, $pokemon15, $pokemon16, $pokemon17, $pokemon18];
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['pokemon1_pv'])) {
            $pokemons[$id-1]->setPointsdevie((int)$_POST['pokemon1_pv']);
        }
        if (isset($_POST['pokemon2_pv'])) {
            $pokemons[14]->setPointsdevie((int)$_POST['pokemon2_pv']);
        }
        
        if (isset($_POST['action'])) {
            if ($_POST['action'] === 'attaquer') {
                $pokemons[$id-1]->Attaquer($pokemons[14]);
            } elseif ($_POST['action'] === 'capacite_speciale') {
                $pokemons[$id-1]->CapaciteSpeciale($pokemons[14]);
            }
        }
    }

      // Rendu avec layout
      $this->renderView('pokemon/combat', [
        'id' => $id,
        'pokemons' => $pokemons
    ]);
  }
}

  

?>

