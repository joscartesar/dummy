<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dummy Blog </title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
  </head>
  <body>
    <?php print $content['block_header']; ?>
    <?php print $content['block_menu']; ?>
    <div id="content">
      <fieldset>
        <form action="/add_user_action" method="post" id="add_user_form" >
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
          <?php foreach ($content['roles'] as $key => $value) { ?>
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
