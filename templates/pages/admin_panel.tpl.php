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
      <div id="flang">
        <ul>
          <li><a href="/admin/posts">Posts</a></li>
      <?php if ($content['user_rol'] == "admin") { ?>
          <li><a href="/admin/tags">Tags</a></li>
          <li><a href="/admin/users">Users</a></li>
          <li><a href="/admin/roles">Roles</a></li>
      <?php } ?>
        </ul>
      </div>
      <?php print $content['block_admin_table']; ?>
    </div>
  </body>
</html>
