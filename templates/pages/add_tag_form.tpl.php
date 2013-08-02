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
      <form action="/add_tag_action" method="post">
        <fieldset>
          <div>
            <label for="id_name">Nombre: </label>
            <input id="id_name" type="text" name="name"/>
          </div>
          <div>
            <input type="submit" value="Añadir"/>
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
