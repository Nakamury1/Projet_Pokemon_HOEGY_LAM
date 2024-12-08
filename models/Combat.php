<?php

class Combat {
    private Pokemon $pokemon1;
    private Pokemon $pokemon2;
    //private array $historique;

    public function __construct(Pokemon $pokemon1, Pokemon $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
        //$this->historique = [];
    }

    //public function getHistorique(): string
    //{return $this->historique;}

    public function DemarrerCombat(): array
    {
        $tour = 1;
        $attaquantActuel = $this->pokemon1;
        $defenseurActuel = $this->pokemon2;

        // Le combat continue tant qu'aucun Pokémon n'est KO
        while (!$this->pokemon1->EstKO() || !$this->pokemon2->EstKO()) {
            //$this->ajouthistorique("Le combat commence !");

            // Alternance des rôles
            list($attaquantActuel, $defenseurActuel) = [$defenseurActuel, $attaquantActuel];
            $tour++;
        }

        $this->historique[] = [
            'tour' => $tour,
            'action' => $this->DeterminerVainqueur()
        ];

        return $this->historique;
    }

    private function TourDeCombat(Pokemon $attaquant, Pokemon $defenseur): array {
        // 20% de chance d'utiliser une capacité spéciale
        $utiliseCapaciteSpeciale = (rand(1, 100) <= 20);

        if ($utiliseCapaciteSpeciale) {
            $degats = $attaquant->CapaciteSpeciale($defenseur);
            $typeAttaque = 'capacité spéciale';
        } else {
            $degats = $attaquant->attaquer($defenseur);
            $typeAttaque = 'attaque normale';
        }

        return [
            'attaquant' => $attaquant->getNom(),
            'defenseur' => $defenseur->getNom(),
            'type_attaque' => $typeAttaque,
            'degats' => $degats,
            'pv_attaquant' => $attaquant->getPointsdevie(),
            'pv_defenseur' => $defenseur->getPointsdevie()
        ];
    }

    public function DeterminerVainqueur(): array {
        $vainqueur = null;
        $perdant = null;

        if ($this->pokemon1->EstKO()) {
            $vainqueur = $this->pokemon2;
            $perdant = $this->pokemon1;
        } elseif ($this->pokemon2->EstKO()) {
            $vainqueur = $this->pokemon1;
            $perdant = $this->pokemon2;
        }

        return [
            'vainqueur' => $vainqueur->getNom(),
            'perdant' => $perdant->getNom(),
            'pv_restants_vainqueur' => $vainqueur->getPointsdevie()
        ];
    }

    public function getStatistiquesCombat(): array {
        return [
            'nombre_tours' => count($this->historique),
            'pokemon1' => [
                'nom' => $this->pokemon1->getNom(),
                'pv_initiaux' => $this->pokemon1->getPointsdevieMAX(),
                'pv_finaux' => $this->pokemon1->getPointsdevie()
            ],
            'pokemon2' => [
                'nom' => $this->pokemon2->getNom(),
                'pv_initiaux' => $this->pokemon2->getPointsdevieMAX(),
                'pv_finaux' => $this->pokemon2->getPointsdevie()
            ],
            //'historique' => $this->historique
        ];
    }
    /*
    public function ajouthistorique(string $historique)
    {
        $this->historique[] = $historique;
    }
    */
}   

?>