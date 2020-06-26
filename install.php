<?php

require_once('includes/lib.php');

$error = '';

if (!empty($_POST)) {
  if (!empty($_POST['db_name']) AND !empty($_POST['db_user']) AND !empty($_POST['db_host']) AND !empty($_POST['db_prefix']) AND !empty($_POST['lang']) AND isset($_POST['db_password'])) {

    $configOptions = [
      'DB_NAME'     => $_POST['db_name'],
      'DB_USER'     => $_POST['db_user'],
      'DB_PASSWORD' => $_POST['db_password'],
      'DB_HOST'     => $_POST['db_host'],
      'DB_PREFIX'   => $_POST['db_prefix'],
      'LOCALE'      => $_POST['lang']
    ];

    $status = createConfigFile($configOptions);

    if (is_bool($status) AND $status == True) {

      header('location: index.php');
      exit;

    } else {

      $error = $status;
    }
  }
}



if (!file_exists('config.php')) { ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Gradarr - Install</title>
    <link rel="stylesheet" href="includes/style/install.css">
  </head>
  <body>
    <div id="mainMenu">
      <h1>Gradarr</h1>
    </div>
    <div id="mainContent">
      <div>
        <h2>Install</h2>
        <div class="error"><?= $error ?></div>
        <p>Wellcome to open-source school information system Gradarr</p>
        <form action="install.php" method="POST">
          <div>
            <h3>Database</h3>
            <div class="line"></div>
            <div>
              <label>
                Database name
                <input type="text" name="db_name" required="true" value="<?= (!empty($_POST['db_name'])) ? $_POST['db_name'] : "" ?>">
              </label>
              <label>
                Username
                <input type="text" name="db_user" required="true" value="<?= (!empty($_POST['db_user'])) ? $_POST['db_user'] : '' ?>">
              </label>
              <label>
                Password
                <input type="password" name="db_password" autocomplete="false" value="<?= (!empty($_POST['db_password'])) ? $_POST['db_password'] : '' ?>">
              </label>
            </div>
            <div>
              <label>
                Database Host
                <input type="text" name="db_host" required="true" value="<?= (!empty($_POST['db_host'])) ? $_POST['db_host'] : '' ?>">
              </label>
              <label>
                Table Prefix
                <input type="text" name="db_prefix" required="true" value="<?= (!empty($_POST['db_prefix'])) ? $_POST['db_prefix'] : 'gr_' ?>">
              </label>
            </div>
          </div>
          <div>
            <h3>Settings</h3>
            <div class="line"></div>
            <div>
              <label>
                Language
                <input type="text" name="lang" required="true" value="<?= (!empty($_POST['lang'])) ? $_POST['lang'] : 'en' ?>">
              </label>
            </div>
          </div>
          <button type="submit">Install</button>
      </form>
      </div>
    </div>
  </body>
</html>
<?php
  exit;
} else {
  header("location: index.php");
  exit;
}
?>
