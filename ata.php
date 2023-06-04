<?php

/*
   Plugin Name: ATA 
   Plugin URI: https://github.com/selimkoc/ata
   description: ATA is a simple MVC architecture base plugin for WordPress.
   Version: 1.0
   Author: Selim Koc
   Author URI: https://selimkoc.com
   Texts Domain: ata
   Domain Path: /languages
   License: GPL2
   */

namespace ATA;

define('ATA\ATA_PLUGIN_DIR', __DIR__);

require_once ATA_PLUGIN_DIR . '/inc.php';

new Ata();
