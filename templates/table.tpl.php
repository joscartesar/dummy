<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dummy Blog </title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/scripts.js"></script>
  </head>
  <body>
    <div id="header">
      <?php include_once("../controller/header.php"); ?>
    </div>
    <div id="leftmenu">
      <?php include_once("../controller/menu.php"); ?>
    </div>
    <div id="content">
<table class="contentTable">
  <thead>
    <tr>
      <th>Header 1</th>
      <th>Header 2</th>
    </tr>
  </thead>
  <tbody>
<?php

for ($i = 0; $i < 10; $i++) {

?>
    <tr>
      <td>row 1, cell 1</td>
      <td>row 1, cell 2</td>
    </tr>
<?php } ?>
    <tr>
      <td>row 2, cell 1</td>
      <td>row 2, cell 2</td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>
