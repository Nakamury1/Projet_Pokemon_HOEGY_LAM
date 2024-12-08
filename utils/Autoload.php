<?php

class Autoload{
    public static function register() {
      // Enregistre la méthode d'autoload
      // Appelera la méthode 'autoload' à chaque fois qu'une class inconnue sera instanciée
      // en lui envoyant la class demandée (__CLASS__) en paramètre
      spl_autoload_register([__CLASS__, 'autoload']);
    }
   
    public static function autoload($class): void 
    {
      // Définit le chemin potentiel du fichier
      $controller = __DIR__ .'/../controllers/'. $class .'.php';
      $model = __DIR__ .'/../models/'. $class .'.php';
      $util = __DIR__ .'/../utils/'. $class .'.php';
      $type = __DIR__ .'/../models/typesPokemon/'. $class .'.php';

      if (file_exists($controller)) {
        require_once $controller;
      }
      else if (file_exists($model)) {
        require_once $model;
      }
      else if (file_exists($util)) {
        require_once $util;
      }
      else if (file_exists($type)) {
        require_once $type;
      }
      else{
        die('<p>Fichier introuvable pour la classe : ' . $class . '</p>');
      }
    }
  }

?>