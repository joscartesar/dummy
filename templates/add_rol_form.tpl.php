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
      <form action="/controller/add_rol.php" method="post" >
      <fieldset>
        <div>
          <label for="id_rol_name">Rol: </label>
          <input id="id_rol_name" type="text" name="name" />
        </div>
        <div>
          <input type="submit" value="Añadir" />
        </div>
      </fieldset>
      </form>
    </div>
  </body>
</html>
