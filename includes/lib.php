<?php

$includesPath = dirname(__FILE__) . '/';

//////////////
//ALL FILES //
//////////////

require_once('modules/sort/users.php');
require_once('modules/database/MySQLConnector.php');
require_once('modules/forms/inputs.php');


//////////////
//FUNCTIONS //
//////////////

function getStylesheetUrl($file = "") {
  return $_SERVER["REQUEST_URI"] . "includes/style/" . $file;
}

/**
 * create config file with options
 * @param  array $options array with options
 * @since  0.1
 * example array : [
 *  "DB_NAME" => "NAME", //mandatory
 *  "DB_USER" => "USERNAME", //mandatory
 *  "DB_PASSWORD" => "PASSWORD", //mandatory
 *  "DB_HOST" => "LOCALHOST", //mandatory
 *  "DB_PREFIX" => "GR_", //mandatory
 *  "LOCALE" => "en" //mandatory
 * ]
 */
function createConfigFile($options) {
  global $includesPath;

  // @ ignores warnings
  $configSampleContents = @file_get_contents($includesPath . '../config-sample.php');

  if ($configSampleContents == False) {
    echo 'Unable to read config-sample.php!';
    exit;
  }

  foreach ($options as $option => $value) {
    $regex = '/(\w+\(.*?(\'|\")' . $option . '\2.*?,).*?(\'|\").*?\3(\);)/';

    $configSampleContents = preg_replace($regex, '$1 $3' . $value . '$3$4', $configSampleContents);
  }

  $dbOptions = [
    'name'     => $options['DB_NAME'],
    'user'     => $options['DB_USER'],
    'password' => $options['DB_PASSWORD'],
    'host'     => $options['DB_HOST']
  ];

  $valid = MySQLConnector::tryConnect($dbOptions);

  if (!is_bool($valid)) {
    return $valid;
  }

  $status = file_put_contents($includesPath . '../config.php', $configSampleContents);

  if ($status) {
    return True;
  } else {
    return 'It is not possible to create a config file';
  }
}

?>
