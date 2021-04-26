<?php

/* 
 * The Post class is a very basic example of what a model should look like
 */
class Post {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }
}
