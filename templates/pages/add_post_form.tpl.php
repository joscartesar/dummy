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
      <form action="/add_post_action" method="post">
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
            <?php foreach ($content['tags']->_tags as $key => $value) { ?>
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
