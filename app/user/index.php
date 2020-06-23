<?php

require_once('../includes/class-usersDataSorter.php');

$data = file_get_contents("../usersData.json");
$data = json_decode($data);

$options = [
  "other" => [
    "className" => "ITA"
  ],
];

$x = UsersSort::sortByOptions($data->result->data, $options);
var_dump($x);

?>
