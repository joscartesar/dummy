<form action="delete_post.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $_GET['post_id']; ?>" name="post_id" />
    <label for="id_confirm">¿Realmente desea eliminar este post? </label>
    <div>
      <input id="id_confirm" type="submit" value="Confirmar"/>
    </div>
  </fieldset>
</form>

