$(document).ready(function(){
  $("#admin_tag").hide();
//  console.log($(".contentImage"));

  $("#flang_post").click(function(){
    displayAdminPost();
  });
  $("#flang_tag").click(function(){
    displayAdminTag();
  });
});

function displayAdminPost()
{
  $("#admin_post").show();
  $("#admin_tag").hide();
}

function displayAdminTag()
{
  $("#admin_tag").show();
  $("#admin_post").hide();
}

