<?php

interface Combattant{
    public function SeBattre(Pokemon $adversaire);
    public function UtiliserAttaqueSpeciale(Pokemon $adversaire);
}

?>