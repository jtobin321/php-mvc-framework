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
    if (isset($url[0])) {
      $controller = ucwords($url[0]);
    }

    // Load the controller and set it, but only if its legit
    $ctrlFile = "../app/controllers/{$controller}.php";
    if (file_exists($ctrlFile)) {
      $this->currentController = $controller;
      unset($url[0]);
    } 

    $ctrlFile = "../app/controllers/{$this->currentController}.php";
    require_once $ctrlFile;

    $this->currentController = new $this->currentController();


    // Now, check for second param A.K.A. the method
    if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
      $this->currentMethod = $url[1];
      unset($url[1]);
    }

    // Set other params
    $this->params = $url ? array_values($url) : [];

    call_user_func_array(
      [$this->currentController, $this->currentMethod],
      $this->params
    );
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
