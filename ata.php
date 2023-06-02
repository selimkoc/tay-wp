<?php

/*
   Plugin Name: Ata 
   Plugin URI: https://github.com/selimkoc/ata
   description: Ata is a simple MVC architecture base plugin for WordPress.
   Version: 1.0
   Author: Selim Koc
   Author URI: https://www.selimkoc.com
   License: GPL2
   */

namespace Ata;

// CONFIGURATION
require_once(__DIR__ . '/config/class-config.php');

// CORE CLASSES
require_once(__DIR__ . '/core/class-controller.php');
require_once(__DIR__ . '/core/class-model.php');
require_once(__DIR__ . '/core/class-api.php');
require_once(__DIR__ . '/core/class-router.php');

// ROUTERS
require_once(__DIR__ . '/main/routers/class-ajax.php');
require_once(__DIR__ . '/main/routers/class-api.php');
require_once(__DIR__ . '/main/routers/class-custom-urls.php');
require_once(__DIR__ . '/main/routers/class-post.php');
