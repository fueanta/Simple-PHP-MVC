<?php
  // Load Config
  require_once '_config/config.php';

  // Load Helpers
  require_once '_helpers/url_helper.php';
  require_once '_helpers/session_helper.php';

  // Auto Load Libraries
  spl_autoload_register(function($className) {
    require_once '_libraries/' . $className . '.php';
  });

  /* Manually Load Libraries
   *
   * require_once '_libraries/core.php';
   * require_once '_libraries/controller.php';
   * require_once '_libraries/database.php';
   * 
   */ 
