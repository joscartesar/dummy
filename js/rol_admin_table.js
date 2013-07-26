$(document).ready(function() {
  //ajax call
  $.ajax({
    type:"POST",
    url:"ajax.php",
    dataType:"json",
    success:function(data) {
      //rendering json response into a html table
      $.each(data, function(index) {
        var rol_name = data[index].name;
          $("#id_tbody").append('<tr>'+
                                '<td>'+ index +'</td>'+
                                '<td>'+ rol_name +'</td>'+
                                '<td><a href="index.php?page=edit_rol&rol_id='+ index +'">editar</a></td>'+
                                '<td><a href="index.php?page=delete_rol&rol_id='+ index +'">eliminar</a></td>'+
                                '</tr>');
      });
    },
    error:function() {}
  });
//now try: with keyup (warning: prevent from multiple ajax call typing some letters
  $("#id_search").keyup(function() {
    var filter_value = $(this).val();
    clearTimeout($.data(this, 'timer'));
    var wait = setTimeout(function(filter_value) {
    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: {
        filter: filter_value
      },
      dataType: "json",
      success: function(data) {
        $("#id_tbody").empty();
        //rendering json response into a html table
        $.each(data, function(index) {
          var rol_name = data[index].name;
            $("#id_tbody").append('<tr>'+
                                  '<td>'+ index +'</td>'+
                                  '<td>'+ rol_name +'</td>'+
                                  '<td><a href="index.php?page=edit_rol&rol_id='+ index +'">editar</a></td>'+
                                  '<td><a href="index.php?page=delete_rol&rol_id='+ index +'">eliminar</a></td>'+
                                  '</tr>');
        });
      },
      error: function() {}
    });
}, 500);
    $(this).data('timer', wait);
  });
});

