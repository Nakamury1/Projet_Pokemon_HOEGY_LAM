<?php

abstract class Pokemon{
    use Soins; // Implémentation du trait Soins

    // Liste des propriétés
    protected int $id;
    protected string $nom;
    protected string $type;
    protected int $pointsdevie;
    protected int $attaque;
    protected int $defense;
    protected string $img;

    // Création d'une méthode construct
    public function __construct(
        int $id,
        string $nom,
        string $type,
        int $pointsdevie,
        int $attaque,
        int $defense,
        string $img,
    )
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setType($type);
        $this->setPointsdevie($pointsdevie);
        $this->setAttaque($attaque);
        $this->setDefense($defense);
        $this->setImage($img);
    }

    // Setters et Getters
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getId(): string
    {
        return $this->id;
    }

    public function setNom($nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
    public function getType(): string
    {
        return $this->type;
    }

    public function setPointsdevie(int $pointsdevie): self
    {
        $this->pointsdevie = $pointsdevie;
        return $this;
    }
    public function getPointsdevie(): int
    {
        return $this->pointsdevie;
    }

    public function setAttaque(int $attaque): self {
        $this->attaque = $attaque;
        return $this;
    }

    public function getAttaque(): int {
        return $this->attaque;
    }

    public function setDefense(int $defense): self {
        $this->defense = $defense;
        return $this;
    }
    public function getDefense(): int {
        return $this->defense;
    }
    public function setImage(string $img): self {
        $this->img = $img;
        return $this;
    }
    public function getImage(): string {
        return $this->img; 
    }

    // Création des méthodes
    public function Attaquer(Pokemon $adversaire): self
    {
        $degats = $this->attaque - $adversaire->defense;
        if ($degats > 0) {
            $adversaire->getRecevoirDegats($degats);
        }
        else {
            $degats = 1;
            $adversaire->getRecevoirDegats($degats);
        }
        return $this;
    }

    public function getRecevoirDegats(int $degats): self
    {
        $this->pointsdevie -= $degats;
        return $this;
    }

    public function EstKO(): bool
    {
        return $this->pointsdevie <= 0;
    }

    // Création d'une méthode abstraite
    abstract public function CapaciteSpeciale(Pokemon $adversaire);
}

?>