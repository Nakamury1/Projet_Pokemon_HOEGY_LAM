<?php

require_once './app/utils/Render.php';

class indexController{
  use Render;

  public function index(): void
  {
      $this->renderView('index');
  }
}

?>