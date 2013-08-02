$(document).ready(function() {
  //ajax call
  $.ajax({
    type:"POST",
    url:"/ajax",
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
    $.ajaxQueue({
      type: "POST",
      url: "/ajax",
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
  });
//redefines jQuery function to enqueue ajax calls
  (function($) {
    var ajaxQueue = $({});
    $.ajaxQueue = function(ajaxOpts) {
      var oldComplete = ajaxOpts.complete;
      ajaxQueue.queue(function(next) {
        ajaxOpts.complete = function() {
          if (oldComplete) {
            oldComplete.apply(this, arguments);
          }
          else {
            next();
          }
        };
        $.ajax(ajaxOpts);
      });
    };
  })(jQuery);
});

