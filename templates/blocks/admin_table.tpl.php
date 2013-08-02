<?php if ($content['admin_page'] == 'roles') { ?>
<script type="text/javascript" src="/js/rol_admin_table.js"></script>
<div>
  <form>
    <label for="id_search">Buscar: </label>
    <input id="id_search" type="text" name="filter" />
  </form>
</div>
<?php } ?>
<div id="id_table">
  <p><a href="/admin/<?php print $content['admin_page']; ?>/add">+ Añadir </a></p>
  <table cellpadding="5px">
    <thead>
      <tr>
        <th> ID </th>
        <th> CAMPO </th>
      <?php if ($content['user_rol'] == "admin") { ?>
        <th colspan="2"> OPERACIONES </th>
      <?php } ?>
      </tr>
    </thead>
    <tbody id="id_tbody">
  <?php if ($content['admin_page'] != 'roles') {
          foreach ($content['rows'] as $key => $value) { ?>
      <tr>
        <td><?php print $key; ?></td>
        <td><?php print $value['field']; ?></td>
      <?php if ($content['user_rol'] == "admin") { ?>
        <td><a href="/admin/<?php print $content['admin_page']; ?>/edit?id=<?php print $key; ?>"> editar </a></td>
        <td><a href="/admin/<?php print $content['admin_page']; ?>/delete?id=<?php print $key; ?>">  eliminar </a></td>
      <?php } ?>
      </tr>
  <?php   }
        } ?>
    </tbody>
  </table>
</div>
