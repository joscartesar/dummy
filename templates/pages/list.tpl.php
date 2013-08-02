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
      <?php foreach ($content['posts'] as $key => $value) { ?>
      <h4><?php print "<a href='/post?post_id=". $key. "'>". $value['title']. "</a>"; ?></h4>
      <hr />
      <?php
        print $value['abstract'];
        print strftime("%A, %d de %B de %Y, %r", $value['date']);
      }
      ?>
      <ul>
        <li><?php
                  if (isset($content['index']) && ($content['index'] > 1)) {
                    $sig = $content['index'] - 1;
                    print '<a href="/home?index='. $sig. '">Anterior</a>';
                  }
            ?>
        </li>
        <?php
              for ($i = 1; $i <= $content['no_pages']; $i++) {
                print '<li><a href="/home?index='. $i. '">'. $i. ' </a></li>';
              }
        ?>
        <li><?php
                  if (!isset($content['index'])) {
                    $sig = 2;
                    print '<a href="/home?index='. $sig. '">Siguiente</a>';
                  }else if (isset($content['index']) && ($content['index'] < $content['no_pages'])) {
                    $sig = $content['index'] + 1;
                    print '<a href="/home?index='. $sig. '">Siguiente</a>';
                  }
            ?>
        </li>
      </ul>
    </div>
  </body>
</html>
