<?php

require_once('../../includes/modules/sort/users.php');

$data = file_get_contents("exampleData.json");
$data = json_decode($data);

$options = [
  "other" => [
    "className" => "ITA",
    "academicYear" => 2,
  ],
];

$x = UsersSort::sortByOptions($data->result->data, $options);
var_dump($x);

?>
