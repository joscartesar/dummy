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
      <?php foreach ($posts as $key => $value) { ?>
      <h4><?php print "<a href='index.php?page=post&id=". $key. "'>". $value['title']. "</a>"; ?></h4>
      <hr />
      <?php
        print $value['abstract'];
        print strftime("%A, %d de %B de %Y, %r", $value['date']); 
      }
      ?>
      <ul>
        <li><?php
                  if (isset($_GET['index']) && ($_GET['index'] > 1)) {
                    $sig = $_GET['index'] - 1;
                    print '<a href="index.php?page=list&index='. $sig. '">Anterior</a>';
                  }
            ?>
        </li>
        <?php
              for ($i = 1; $i <= $no_pages; $i++) {
                print '<li><a href="index.php?page=list&index='. $i. '">'. $i. ' </a></li>';
              }
        ?>
        <li><?php
                  if (!isset($_GET['index'])) {
                    $sig = 2;
                    print '<a href="index.php?page=list&index='. $sig. '">Siguiente</a>';
                  }else if (isset($_GET['index']) && ($_GET['index'] < $no_pages)) {
                    $sig = $_GET['index'] + 1;
                    print '<a href="index.php?page=list&index='. $sig. '">Siguiente</a>';
                  }
            ?>
        </li>
      </ul>
    </div>
  </body>
</html>
