<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dummy Blog </title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="header">
      <?php include_once(PATH_CONTROLLER. "/header.php"); ?>
    </div>
    <div id="leftmenu">
      <?php include_once(PATH_CONTROLLER. "/menu.php"); ?>
    </div>
    <div id="content">
      <form action="/controller/delete_rol.php" method="post">
        <fieldset>
          <input type="hidden" value="<?php print $_GET['rol_id']; ?>" name="rol_id" />
          <label for="id_confirm">¿Realmente desea eleminar este rol? </label>
          <div>
            <input id="id_confirm" type="submit" value="Confirmar" />
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
