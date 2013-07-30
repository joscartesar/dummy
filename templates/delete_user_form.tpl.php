<form action="delete_user.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $_GET['user_id']; ?>" name="user_id" />
    <label for="id_confirm">¿Realmente desea eleminar este usuario? </label>
    <div>
      <input id="id_confirm" type="submit" value="Confirmar" />
    </div>
  </fieldset>
</form>
