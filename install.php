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

if (!file_exists('config.php')) {
  $currentPage = "Installation"; ?><!DOCTYPE html>
<html>
  <head>
    <?php require_once("includes/structure/head.php"); ?>
    <link rel="stylesheet" href="includes/style/components/install.css">
  </head>
  <body class="container">
    <header class="small-16 medium-2 large-2">
      <?php require_once("./includes/structure/header.php"); ?>
    </header>
    <main class="container small-16 medium-16 large-14">
      <div class="background">
        <div class="box">
          <h2>Installation</h2>
          <p>Wellcome to open-source school information system Gradarr</p>
          <div class="error"><?= $error ?></div>
          <form action="install.php" method="POST">
            <div>
              <h3>Database</h3>
              <hr size="1" color="black" noshade>
              <!-- <div class="line"></div> -->
              <div>
                <?php
                generateInput("text", "db_name", "Database name", "dns", $_POST['db_name'], ["required"]);
                generateInput("text", "db_user", "Database user", "account_circle", $_POST['db_user'], ["required"]);
                generateInput("password", "db_password", "Database password", "vpn_key", $_POST['db_password'], ["autocomplete='false'"]);
                generateInput("text", "db_host", "Host", "home", $_POST['db_host'], ["required"]);
                generateInput("text", "db_prefix", "Database table prefix", null, (!empty($_POST['db_prefix'])) ? $_POST['db_prefix'] : 'gr_', ["required"]);
                ?>
              </div>
            </div>
            <div>
              <h3>Settings</h3>
              <hr size="1" color="black" noshade>
              <!-- <div class="line"></div> -->
              <div>
                <label>
                  Language
                  <input type="text" name="lang" required="true" value="<?= (!empty($_POST['lang'])) ? $_POST['lang'] : 'en' ?>">
                </label>
              </div>
            </div>
            <button type="submit">Install</button>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas lorem. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce aliquam vestibulum ipsum. Duis risus. Maecenas libero. Mauris elementum mauris vitae tortor. Aenean placerat. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce tellus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec vitae arcu. Maecenas aliquet accumsan leo. Fusce nibh. Duis risus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer malesuada. Curabitur vitae diam non enim vestibulum interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis pulvinar. Nulla quis diam. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>

<p>Nulla pulvinar eleifend sem. Aliquam id dolor. Fusce consectetuer risus a nunc. Ut tempus purus at lorem. Cras elementum. Duis condimentum augue id magna semper rutrum. Pellentesque sapien. Donec quis nibh at felis congue commodo. Nulla non lectus sed nisl molestie malesuada. Duis condimentum augue id magna semper rutrum. Phasellus faucibus molestie nisl. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus.</p>

<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc auctor. Fusce wisi. Nulla pulvinar eleifend sem. Mauris dictum facilisis augue. Suspendisse nisl. Cras elementum. In rutrum. Proin mattis lacinia justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aenean id metus id velit ullamcorper pulvinar. Donec iaculis gravida nulla. Proin mattis lacinia justo.</p>

<p>Nullam dapibus fermentum ipsum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Integer imperdiet lectus quis justo. Maecenas libero. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Ut tempus purus at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Suspendisse sagittis ultrices augue. Et harum quidem rerum facilis est et expedita distinctio. Etiam quis quam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

          </form>
        </div>
      </div>
    </main>
    <footer class="container small-16 medium-16 large-16">
      <div class="small-16 medium-2 large-2">
      </div>
      <?php require_once("./includes/structure/footer.php"); ?>
    </footer>
  </body>
</html>

<?php
  exit;
} else {
  header("location: index.php");
  exit;
}
?>
