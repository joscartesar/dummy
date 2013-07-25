<?php
include_once("model/db.php");
include_once("model/rol_obj.php");

$sql = "SELECT * FROM rol";
$result = $db->fetch($sql);
$rol = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['rol_id'];
  $content = array("name" => $row['name']);
  $rol[$id] = $content;
}
?>
<fieldset>
  <form action="add_user.php" method="post" id="add_user_form" >
    <div>
      <label for="id_username">Username: </label>
      <input id="id_username" type="text" name="username" />
    </div>
    <div>
      <label for="id_password">Password: </label>
      <input id="id_password" type="password" name="password" />
    </div>
  </form>
  <label for="id_select_rol">Rol: </label>
  <select id="id_select_rol" name="rol_list" form="add_user_form">
    <?php foreach ($rol as $key => $value) { ?>
    <option value="<?php print $key; ?>"><?php print $value['name']; ?></option>
    <?php } ?>
  </select>
</fieldset>
<div>
  <input type="submit" value="Añadir" form="add_user_form" />
</div>
