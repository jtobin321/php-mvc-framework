<?php
/*
  * App Core Class
  * Creates URL & loads core controller
  * URL FORMAT - /controller/method/params
*/
class Core {
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct() {
    $url = $this->getUrl();
    $controller = '';
    if (count($url) > 0) {
      $controller = ucwords($url[0]);
    }

    $ctrlFile = "../app/controllers/{$controller}.php";
    if (file_exists($ctrlFile)) {
      $this->currentController = $controller;
      unset($url[0]);
    } 

    $ctrlFile = "../app/controllers/{$this->currentController}.php";
    require_once $ctrlFile;

    $this->currentController = new $this->currentController();
  }

  public function getUrl() {
    $url = [];
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
    }

    return $url;
  }
}
