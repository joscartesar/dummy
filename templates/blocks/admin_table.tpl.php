<div id="id_table">
  <p><a href="admin/<?php print $content['admin_page']; ?>/add">+ Añadir </a></p>
  <table cellpadding="5px">
    <thead>
      <tr>
        <th> ID </th>
        <th> TITULO </th>
      <?php if ($content['user_rol'] == "admin") { ?>
        <th colspan="2"> OPERACIONES </th>
      <?php } ?>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($content['rows'] as $key => $value) { ?>
      <tr>
        <td><?php print $key; ?></td>
        <td><?php print $value['field']; ?></td>
      <?php if ($content['user_rol'] == "admin") { ?>
        <td><a href="admin/<?php print $content['admin_page']; ?>/edit"> editar </a></td>
        <td><a href="admin/<?php print $content['admin_page']; ?>/delete"d>  eliminar </a></td>
      <?php } ?>
      </tr>
  <?php } ?>
    </tbody>
  </table>
</div>
