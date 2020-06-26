<?php

$path = $_SERVER["REQUEST_URI"];

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Gradarr">
<title><?= (!empty($currentPage) ? ($currentPage . " - ") : "") ?>Gradarr</title>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@500;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= $path ?>includes/style/style.css">
<noscript>
For this website to function properly, you need to have JavaScript turned on.
</noscript>
