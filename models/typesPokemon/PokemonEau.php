<?php


class PokemonEau extends Pokemon implements Combattant {
    use Soins;

    public function __construct(
        int $id,
        string $nom,
        int $pointsdevie,
        int $attaque,
        int $defense,
        string $img,
    )
    {
       parent::__construct($id, $nom, 'Eau', $pointsdevie, $attaque, $defense, $img);
    }

    private const EFFICACE = 1.5;
    private const FAIBLE = 0.5;

    public function CapaciteSpeciale(Pokemon $adversaire): int {
        $degatsBase = $this->attaque * 1.5;
        
        if ($adversaire->getType() === 'Feu' || $adversaire->getType() === 'Roche' || $adversaire->getType() === 'Sol') {
            $degatsBase *= self::EFFICACE;
        }
        elseif ($adversaire->getType() === 'Dragon' || $adversaire->getType() === 'Eau' || $adversaire->getType() === 'Plante') {
            $degatsBase *= self::FAIBLE;
        }

        $degats = max(1, (int)$degatsBase - $adversaire->getDefense());
        $adversaire->getRecevoirDegats($degats);
        return $degats;
    }

    public function SeBattre(Pokemon $adversaire): array {
        $resultats = [];
        $resultats[] = [
            'attaquant' => $this->getNom(),
            'type_attaque' => 'Hydrocanon',
            'degats' => $this->CapaciteSpeciale($adversaire),
            'pv_restants_adversaire' => $adversaire->getPointsdevie()
        ];
        return $resultats;
    }

    public function UtiliserAttaqueSpeciale(Pokemon $adversaire): int {
        return $this->CapaciteSpeciale($adversaire);
    }
}

?>
