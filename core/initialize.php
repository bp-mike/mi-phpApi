<?php
    define('DS')? null : define('DS', 'DIRECTORY_SEPARATOR');
    define('SITE_ROOT')? null : define('SITE_ROOT', DS.'xampp64'.DS.'www'.DS.'miphpapi');

    // xampp64/www/miphpapi/includes
    define('INC_PATH')? null : define('INC_PATH', SITE_ROOT.DS.'include');
    define('CORE_PATH')? null : define('INC_PATH', SITE_ROOT.DS.'core');

    // load the config file first
    require_once(INC_PATH.DS."config.php");
    
    // load core classes
    require_once(CORE_PATH.DS."post.php");
    
?>