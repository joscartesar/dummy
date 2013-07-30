<form action="edit_tag.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $tag->get_id(); ?>" name="tag_id" />
    <div>
      <label for="id_name">Nombre: </label>
      <input id="id_name" type="text" name="name" value="<?php print $tag->get_name(); ?>"/>
    </div>
    <div>
      <input type="submit" value="Editar" />
    </div>
  </fieldset>
</form>
