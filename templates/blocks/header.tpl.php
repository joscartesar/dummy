<div id="header">
<h1 class="hc"> ^(º 3º)^ Mi Primer Blog ^(º 3º)^ </h1>
<?php if ($content['username'] == 'anonymous') { ?>
  <p class="hc"><a class="hc" href="/login">Login</a></p>
<?php } else { ?>
  <p class="hc"><a class="hc" href="/admin">Administrar</a></p>
  <p class="hc"><a class="hc" href="/logout">Logout</a></p>
<?php } ?>
<p class="hc">Bienvenido usuario <?php print $content['username']; ?></p>
</div>
