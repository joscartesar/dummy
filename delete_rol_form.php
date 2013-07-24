<form action="delete_rol.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $_GET['rol_id']; ?>" name="rol_id" />
    <label for="id_confirm">¿Realmente desea eleminar este rol? </label>
    <div>
      <input id="id_confirm" type="submit" value="Confirmar" />
    </div>
  </fieldset>
</form>
