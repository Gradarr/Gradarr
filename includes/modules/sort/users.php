<?php

/**
 * Sorts user's data.
 */
class UsersSort
{
  public static function sortByTypes($data)
  {

    $result = [
      "teachers" => [],
      "students" => [],
      "others" => []
    ];

    foreach ($data as $key => $person) {
      switch ($person->type) {
        case 'teacher':
          $result["teachers"][] = $person;
          break;

        case 'student':
          $result["students"][] = $person;
          break;

        default:
          $result["others"][] = $person;
          break;
      }
    }

    return $result;
  }

  public static function sortByOptions($data, $options = null)
  {
    $result = [];

    if ($options == null) {
      return $data;
    }

    foreach ($data as $person) {
      $person = (array) $person;

      $search = true;
      foreach ($options as $key => $value) {
        if (array_key_exists($key, $person)) {
          if (is_object($person[$key])) {
            $person[$key] = (array) $person[$key];

            foreach ($value as $otherOptionKey => $otherOptionValue) {
              if (!isset($person[$key][$otherOptionKey])) {
                $search = false;
                break;
              } elseif ($person[$key][$otherOptionKey] != $otherOptionValue) {
                $search = false;
                break;
              }
            }

          }
          elseif ($person[$key] != $value) {
            $search = false;
            break;
          }
        }
      }

      if ($search == true) {
        $result[] = $person;
      }
    }

    return $result;
  }

}

?>
