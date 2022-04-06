$(".admindelete").click(function() {
    $(".admindelete").attr("data-clicked", "false");
    $(this).attr("data-clicked", "true");

  });

  $("#confirmadmindelete").click(function() {
    let button = $(".admindelete").filter('[data-clicked="true"]');
    
    $.ajax({
      url: '/administration/administrators/deleteadmin.php',
      type: 'post',
      data: button.attr("id"),
      success: function(data) {
        console.log(data);
        if (data==true) {
          alert("Nelze odstranit superadministrátora.")
        }else{
        location.reload();
      }
      }
    });
    button.attr("data-clicked", "false");
  });