<?php

class MySQLConnector
{

  private function __construct(){

  }

  static protected function connect($name, $user, $password, $host)
  {
    $dsn = 'mysql: host=' . $host . ';dbname=' . $name;
	$options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
	];

	try {
		$pdo = new PDO($dsn, $user, $password, $options);	
	} catch (Exception $e) {
		$pdo = False;
	}

	return $pdo;
  }


  static public function tryConnect($loginDetails)
  {
  	$db = MySQLConnector::connect($loginDetails['name'], $loginDetails['user'], $loginDetails['password'], $loginDetails['host']);

  	if ($db == False) {
  		return 'Wrong database login details';
  	}

  	$perm = MySQLConnector::checkPermissions($db, $loginDetails['user'], $loginDetails['host']);

  	if (strlen($perm) != 0) {
  		return $perm;
  	} else {
  		return True;
  	}
  }


  static protected function checkPermissions($db, $user, $host)
  {
  	$data = [
  		':user' => $user,
  		':host' => $host
  	];

  	$sql = 'SELECT Select_priv, Insert_priv, Update_priv, Delete_priv, Create_priv, Drop_priv FROM mysql.user WHERE User = :user AND Host = :host';
  	$sql = $db->prepare($sql);
  	$sql->execute($data);
  	$result = $sql->fetchAll(PDO::FETCH_ASSOC)[0];

  	$permissions = '';

  	if ($result['Select_priv'] == 'N') {
  		$permissions .= "You don't have permission to select from database\n";
  	}

  	if ($result['Insert_priv'] == 'N') {
  		$permissions .= "You don't have permission to insert to database\n";
  	}

  	if ($result['Update_priv'] == 'N') {
  		$permissions .= "You don't have permission to update in database\n";
  	}

  	if ($result['Delete_priv'] == 'N') {
  		$permissions .= "You don't have permission to delete in database\n";
  	}

  	if ($result['Create_priv'] == 'N') {
  		$permissions .= "You don't have permission to create table in database\n";
  	}

  	if ($result['Drop_priv'] == 'N') {
  		$permissions .= "You don't have permission to drop table in database\n";
  	}

  	return $permissions;
  }
}

?>