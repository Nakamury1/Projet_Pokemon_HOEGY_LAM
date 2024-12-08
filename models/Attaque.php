<?php

class Attaque {
    private string $nom;
    private int $puissance;
    private int $precision;

    public function ExecuterAttaque(Pokemon $adversaire){
        if (rand(1, 100) <= $this->precision) {
            $adversaire->recevoirDegats($this->puissance);
            return $this->$puissance;
        }
        else {
            return 0;
        }
    }
}

class Flammeche extends Attaque{
    public function __construct(){
        parent::__construct("Flammèche", 40, 100);
    }
}

class Feuillage extends Attaque{
    public function __construct(){
        parent::__construct("Feuillage", 40, 100);
    }
}

class PistoletAO extends Attaque{
    public function __construct(){
        parent::__construct("Pistolet à O", 40, 100);
    }
}

class Eclair extends Attaque{
    public function __construct(){
        parent::__construct("Eclair", 40, 100);
    }
}

class QueueDeFer extends Attaque{
    public function __construct(){
        parent::__construct("Queue de Fer", 100, 75);
    }
}

class VentFeerique extends Attaque{
    public function __construct(){
        parent::__construct("Vent Féérique", 40, 100);
    }
}

class Taillade extends Attaque{
    public function __construct(){
        parent::__construct("Taillade", 40, 95);
    }
}

class PoisonCroix extends Attaque{
    public function __construct(){
        parent::__construct("Poison-Croix", 70, 100);
    }
}

class Tunnelier extends Attaque{
    public function __construct(){
        parent::__construct("Tunnelier", 80, 95);
    }
}

class CruAile extends Attaque{
    public function __construct(){
        parent::__construct("Cru-Aile", 60, 100);
    }
}

class CasseBrique extends Attaque{
    public function __construct(){
        parent::__construct("Casse-Brique", 75, 100);
    }
}

class ChocMental extends Attaque{
    public function __construct(){
        parent::__construct("Choc Mental", 50, 100);
    }
}

class OmbrePortee extends Attaque{
    public function __construct(){
        parent::__construct("Ombre Portée", 40, 100);
    }
}

class EcrasFace extends Attaque{
    public function __construct(){
        parent::__construct("Ecras'Face", 40, 100);
    }
}

class Machouille extends Attaque{
    public function __construct(){
        parent::__construct("Machouille", 80, 100);
    }
}

class DracoQueue extends Attaque{
    public function __construct(){
        parent::__construct("Draco-Queue", 60, 90);
    }
}

class CrocsGivre extends Attaque{
    public function __construct(){
        parent::__construct("Crocs Givre", 65, 95);
    }
}

class JetPierres extends Attaque{
    public function __construct(){
        parent::__construct("Jet-Pierres", 50, 90);
    }
}

?>