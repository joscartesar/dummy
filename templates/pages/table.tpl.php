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
      <table class="contentTable">
        <thead>
          <tr>
            <th>Header 1</th>
            <th>Header 2</th>
          </tr>
        </thead>
        <tbody>
      <?php for ($i = 0; $i < 10; $i++) { ?>
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
