$(".deletereservation").click(function() {
    $(".deletereservation").attr("data-clicked", "false");
    $(this).attr("data-clicked", "true");

  });

  $("#confirmdelete").click(function() {
    let button = $(".deletereservation").filter('[data-clicked="true"]')
    $.ajax({
      url: '/administration/reservationsadmin/deletereservation.php',
      type: 'post',
      data: button.attr("id"),
      success: function(data) {
         
       location.reload();
      }
    });
    button.attr("data-clicked", "false");
  });