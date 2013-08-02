<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dummy Blog </title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="/js/jquery-1.10.1.min.js"></script>
  </head>
  <body>
    <?php print $content['block_header']; ?>
    <?php print $content['block_menu']; ?>
    <div id="content">
      <form action="/delete_post_action" method="post">
        <fieldset>
          <input type="hidden" value="<?php print $content['id']; ?>" name="post_id" />
          <label for="id_confirm">¿Realmente desea eliminar este post? </label>
          <div>
            <input id="id_confirm" type="submit" value="Confirmar"/>
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
