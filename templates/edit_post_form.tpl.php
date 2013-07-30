<form action="edit_post.php" method="post">
  <fieldset>
    <input type="hidden" value="<?php print $post->get_id(); ?>" name="post_id" />
    <div>
      <label for="id_title">Título: </label>
      <input id="id_title" type="text" name="title" value="<?php print $post->get_title(); ?>"/>
    </div>
    <div>
      <label for="id_body">Cuerpo: </label>
      <textarea id="id_body" rows="10" cols="60" name="body"><?php print $post->get_body(); ?></textarea>
    </div>
    <div>
      <label for="id_abstract">Resumen: </label>
      <textarea id="id_abstract" rows="5" cols="60" name="abstract"><?php print $post->get_abstract(); ?></textarea>
    </div>
    <div>
      <label for="id_tag_checkbox">Etiquetas: </label>
      <?php foreach ($tag->_tags as $key => $value) { ?>
      <input id="id_tag_checkbox" type="checkbox" name="tags[<?php print $key; ?>]" value="<?php print strtolower($value['name']); ?>" <?php if (array_key_exists($key, $post->_tags)) print "checked";?> />
      <label for="<?php print strtolower($value['name']); ?>"><?php print $value['name']; ?></label>
      <?php } ?>
    </div>
    <div>
      <input type="submit" value="Editar" />
    </div>
  </fieldset>
</form>
