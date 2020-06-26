<?php

require_once('includes/lib.php');

if (!file_exists('config.php')) {
  require_once('install.php');
}

$currentPage = "";

require_once('load.php');
?>