<?php
include_once("model/rol_obj.php");

$rol = new Rol;
$rol->_load($_GET['rol_id']);
?>
<form action="edit_rol.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $_GET['rol_id']; ?>" name="rol_id" />
    <div>
      <label for="id_rol_name">Rol: </label>
      <input id="id_rol_name" type="text" name="name" value="<?php print $rol->get_rol_name(); ?>" />
    </div>
    <div>
      <input type="submit" value="Editar" />
    </div>
  </fieldset>
</form>
