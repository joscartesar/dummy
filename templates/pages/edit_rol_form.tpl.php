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
      <form action="/edit_rol_action" method="post">
        <fieldset>
          <input type="hidden" value="<?php print $content['rol']->get_rol_id(); ?>" name="rol_id" />
          <div>
            <label for="id_rol_name">Rol: </label>
            <input id="id_rol_name" type="text" name="name" value="<?php print $content['rol']->get_rol_name(); ?>" />
          </div>
          <div>
            <input type="submit" value="Editar" />
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
