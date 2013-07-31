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
      <fieldset>
        <form action="/controller/add_user.php" method="post" id="add_user_form" >
          <div>
            <label for="id_username">Username: </label>
            <input id="id_username" type="text" name="username" />
          </div>
          <div>
            <label for="id_password">Password: </label>
            <input id="id_password" type="password" name="password" />
          </div>
        </form>
        <label for="id_select_rol">Rol: </label>
        <select id="id_select_rol" name="rol_list" form="add_user_form">
          <?php foreach ($roles as $key => $value) { ?>
          <option value="<?php print $key; ?>"><?php print $value['name']; ?></option>
          <?php } ?>
        </select>
      </fieldset>
      <div>
        <input type="submit" value="Añadir" form="add_user_form" />
      </div>
    </div>
  </body>
</html>
