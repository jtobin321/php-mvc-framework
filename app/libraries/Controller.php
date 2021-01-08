<?php
/*
 * Base Controller
 * Loads the models and views
*/
class Controller {
  public function model($model) {
    $modelFile = "../app/models/{$model}.php";
    require_once $modelFile;

    return new $model();
  }

  public function view($view, $data = []) {
    $viewFile = "../app/views/{$view}.php";
    if (file_exists($viewFile)) {
      require_once $viewFile;
    } else {
      die('View does not exist');
    }
  }
}
