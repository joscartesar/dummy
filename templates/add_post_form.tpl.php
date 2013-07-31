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
      <form action="/controller/add_post.php" method="post">
        <fieldset>
          <div>
            <label for="id_title">Título: </label>
            <input id="id_title" type="text" name="title"/>
          </div>
          <div>
            <label for="id_body">Cuerpo: </label>
            <textarea id="id_body" rows="10" cols="60" name="body"></textarea>
          </div>
          <div>
            <label for="id_tag_checkbox">Etiquetas: </label>
            <?php foreach ($tag->_tags as $key => $value) { ?>
            <input id="id_tag_checkbox" type="checkbox" name="tags[<?php print $key; ?>]" value="<?php print strtolower($value['name']); ?>" />
            <label for="<?php print strtolower($value['name']); ?>"><?php print $value['name']; ?></label>
            <?php } ?>
          </div>
          <div>
            <input type="submit" value="Añadir"/>
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
