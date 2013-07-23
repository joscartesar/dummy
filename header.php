<?php
include_once("model/user_obj.php");
include_once("session.php");

?>
<h1> ^(º 3º)^ Mi Primer Blog ^(º 3º)^ </h1>
<?php if ($user->get_username() == ANONYMOUS_USER_USERNAME) { ?>
<p><a href="index.php?page=login">Login</a></p>
<?php } else { ?>
<p><a href="index.php?page=admin">Administrar</a></p>
<p><a href="index.php?page=logout">Logout</a></p>
<?php } ?>
<p>Bienvenido usuario <?php print $user->get_username(); ?></p>

