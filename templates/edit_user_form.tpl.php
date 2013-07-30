<?php
include_once("model/user_obj.php");

$sql = "SELECT * FROM rol";
$result = $db->fetch($sql);
$roles = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['rol_id'];
  $content = array("name" => $row['name']);
  $roles[$id] = $content;
}
$user_edit = new User;
$user_edit->_load($_GET['user_id']);
$rol = $user_edit->get_user_rol();
?>
<fieldset>
  <form action="edit_user.php" method="post" id="edit_user_form" >
    <input type="hidden" value="<?php print $_GET['user_id']; ?>" name="user_id" />
    <div>
      <label for="id_username">Username: </label>
      <input id="id_username" type="text" name="username" value="<?php print $user_edit->get_username(); ?>" />
    </div>
    <div>
      <label for="id_password">Password: </label>
      <input id="id_password" type="password" name="password" />
    </div>
  </form>
  <select id="id_select_rol" name="rol_list" form="edit_user_form" >
    <?php foreach ($roles as $key => $value) { ?>
    <option value="<?php print $key; ?>" <?php if ($value['name'] == $rol) {print 'selected';} ?>><?php print $value['name']; ?></option>
    <?php } ?>
  </select>
</fieldset>
<div>
  <input type="submit" value="Editar" form="edit_user_form" />
</div>
