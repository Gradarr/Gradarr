<?php

if (!defined('ABSPATH')) {
  define('ABSPATH', __DIR__ . '/');
}

if (!file_exists(ABSPATH . "config.php")) {
  $configSampleFile = fopen(ABSPATH . "config-sample.php", "r") OR die("Unable to read config-sample.php!");
  $configSampleFileContents = fread($configSampleFile, filesize(ABSPATH . "config-sample.php"));
  fclose($configSampleFile);

  $configFile = fopen("config.php", "w") OR die("Unable to create config.php!");
  fwrite($configFile, $configSampleFileContents);
  fclose($configFile);
  unset($configSampleFileContents);
}

require_once(ABSPATH . 'load.php');

?>
