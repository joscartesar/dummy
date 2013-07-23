<!DOCTYPE html>
<?php
include_once("session.php");
setlocale(LC_ALL, "es_ES.UTF-8");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dummy Blog </title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
  </head>
  <body>
    <div id="header">
      <?php include_once("header.php"); ?>
    </div>
    <div id="leftmenu">
      <?php include_once("menu.php"); ?>
    </div>
    <div id="content">
      <?php
        if (isset($_GET['page'])) {
          switch ($_GET['page']) {
            case "list":
              include_once("list.php");
              break;
            case "table":
              include_once("table.php");
              break;
            case "gallery":
              include_once("gallery.php");
              break;
            case "post":
              include_once("post.php");
              break;
            case "admin":
              include_once("admin_panel.php");
              break;
            case "admin_post":
              include_once("admin_post.php");
              break;
            case "admin_tag":
              include_once("admin_tag.php");
              break;
            case "add_post":
              include_once("add_post_form.php");
              break;
            case "edit_post":
              include_once("edit_post_form.php");
              break;
            case "delete_post":
              include_once("delete_post_form.php");
              break;
            case "add_tag":
              include_once("add_tag_form.php");
              break;
            case "edit_tag":
              include_once("edit_tag_form.php");
              break;
            case "delete_tag":
              include_once("delete_tag_form.php");
              break;
            case "login":
              include_once("login_form.php");
              break;
            case "logout":
              include_once("logout_form.php");
              break;
            case "add_user":
              include_once("add_user_form.php");
              break;
            case "edit_user":
              include_once("edit_user_form.php");
              break;
            case "delete_user":
              include_once("delete_user_form.php");
              break;
            default:
              include_once("list.php");
        }
      }else {
         include_once("list.php");
        }
      ?>
    </div>
  </body>
<html>

