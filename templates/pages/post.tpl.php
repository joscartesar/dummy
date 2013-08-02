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
      <h4><?php print $content['sanitized_title']; ?></h4>
      <div><?php print $content['sanitized_body']; ?></div>
      <div><?php print strftime("%A, %d de %B de %Y, %r", $content['post']->get_date()); ?></div>
      <div>
        <ul class="contentParagraph">
        <?php foreach ($content['post']->_tags as $key => $value) { ?>
          <li><a href="http://www.google.com"><?php print $value['name']; ?></a></li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </body>
</html>
