<?php


if (!defined('ABSPATH')) {
  define('ABSPATH', __DIR__ . '\\');
}

include_once ABSPATH . 'includes/lib.php';



if (!file_exists(ABSPATH . 'config.php')) {
	require_once ABSPATH . 'install.php';
}

require_once ABSPATH . 'load.php';




?>
