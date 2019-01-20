<?php
  /*
   * App Core Class
   * Creates URL & Loads Core Controller
   * URL Format - /{controller}/{method}/{params}
   */

  class Core {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
      //print_r($this->getUrl());
      
      // url components
      $url = $this->getUrl();
      $controller = ucwords($url[0]);
      $method = 'index'; // by default method is index

      if (isset($url[1])) {
        $method = $url[1]; // if method is given
      }

      // now, looking for matched controller
      if (file_exists('../app/controllers/' . $controller . '.php')) {
        // controller found! let's store it
        $this->currentController = $controller;
        // now, unsetting controller from url
        unset($url[0]);
      }

      // Require the controller
      require_once('../app/controllers/' . $this->currentController . '.php');

      // Instantiating required controller
      $this->currentController = new $this->currentController;

      // now, looking for the action/method (if provided)
      if (isset($method)) {
        // now, checking.. if the given action/method does exist
        if (method_exists($this->currentController, $method)) {
          $this->currentMethod = $method;
          // now, unsetting method from url
          unset($url[1]);
        }
      }

      // getting params from url if given
      $this->params = $url ? array_values($url) : [];

      // calling a callback with the array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // returning the contents of the URL in an Array
    public function getUrl() {
      if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }

  }