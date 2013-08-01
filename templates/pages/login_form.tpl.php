<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dummy Blog </title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="header">
      <?php print $content['block_header']; ?>
    </div>
    <div id="leftmenu">
      <?php print $content['block_menu']; ?>
    </div>
    <div id="content">
      <form action="login_action" method="post">
        <fieldset>
          <div>
            <label for="id_username">Username: </label>
            <input id="id_username" type="text" name="username" />
          </div>
          <div>
            <label for="id_password">Password: </label>
            <input id="id_password" type="password" name="password" />
          </div>
          <div>
            <input type="submit" value="login" />
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
