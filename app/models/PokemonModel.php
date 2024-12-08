<?php

class PokemonModel extends Bdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $pokemon = $this->co->prepare('SELECT * FROM pokemon');
        $pokemon->execute();

        return $pokemon->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOneById(int $id): array | false
    {
        $stmt = $this->co->prepare('SELECT * FROM pokemon WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>