<form action="delete_tag.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $_GET['tag_id']; ?>" name="tag_id" />
    <label for="id_confirm">¿Realmente desea eliminar esta etiqueta? </label>
    <div>
      <input id="id_confirm" type="submit" value="Confirmar"/>
    </div>
  </fieldset>
</form>
