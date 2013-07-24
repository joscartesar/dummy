<?php
include_once("model/user_obj.php");

$user_edit = new User;
$user_edit->_load($_GET['user_id']);
?>
<form action="edit_user.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $_GET['user_id']; ?>" name="user_id" />
    <div>
      <label for="id_username">Username: </label>
      <input id="id_username" type="text" name="username" value="<?php print $user_edit->get_username(); ?>" />
    </div>
    <div>
      <label for="id_password">Password: </label>
      <input id="id_password" type="password" name="password" />
    </div>
    <div>
      <input type="submit" value="Editar" />
    </div>
  </fieldset>
</form>
