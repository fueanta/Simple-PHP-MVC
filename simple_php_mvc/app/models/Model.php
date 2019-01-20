<?php
  class Model {
    // db connection reference for models
    protected $db;

    public function __construct() {
      // instantaiting a db connection
      $this->db = new Database;
    }
  }