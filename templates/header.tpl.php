<?php global $user; ?>
<h1> ^(º 3º)^ Mi Primer Blog ^(º 3º)^ </h1>
<?php if ($user->get_username() == ANONYMOUS_USER_USERNAME) { ?>
<p><a href="login">Login</a></p>
<?php } else { ?>
<p><a href="admin">Administrar</a></p>
<p><a href="logout">Logout</a></p>
<?php } ?>
<p>Bienvenido usuario <?php print $user->get_username(); ?></p>

