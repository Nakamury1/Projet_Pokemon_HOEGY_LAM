<?php

trait Soins{
    private $soins = [];

    public function Soigner(Pokemon $pokemon): void
    {
        $this->pointsdevie = 100;
        echo $pokemon->getNom() . "a retrouvé ses points de vies :" . $pokemon->getPointsdevie();
        return;
    }
}
?>