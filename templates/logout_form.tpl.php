<?php global $path_controller ?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dummy Blog </title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="header">
      <?php include_once($path_controller. "/header.php"); ?>
    </div>
    <div id="leftmenu">
      <?php include_once($path_controller. "/menu.php"); ?>
    </div>
    <div id="content">
      <form action="/controller/logout.php" method="post">
        <fieldset>
          <div>
            <label for="id_submit">¿Realmente desea cerrar sesión? </label>
            <input type="submit" value="logout" />
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
