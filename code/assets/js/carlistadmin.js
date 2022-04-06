$(".getiddescription").click(function() {
    let clickedID = $(this).attr("id");

    $.ajax({
      url: '/administration/carsadmin/getdescription.php',
      type: 'post',
      data: clickedID,
      success: function(data) {

        data = JSON.parse(data);

        $("#descriptionmodal").html(data.description);
      }

    })
  });


  $(".getidequipment").click(function() {
    let clickedID = $(this).attr("id");

    $.ajax({
      url: '/administration/carsadmin/getcarequipment.php',
      type: 'post',
      data: clickedID,
      success: function(data) {

        data = JSON.parse(data);

        if (data == "") {
          data = "Toto vozidlo nemá vybavení."
        }

        $("#equipmentmodal").html(data);
      }

    })
  });



  $(".hidecar").click(function() {
    $(".hidecar").attr("data-clicked", "false");
    $(this).attr("data-clicked", "true");

  });

  $("#confirmhide").click(function() {
    let button = $(".hidecar").filter('[data-clicked="true"]')
    $.ajax({
      url: '/administration/carsadmin/hidecar.php',
      type: 'post',
      data: button.attr("id"),
      success: function(data) {
      
       location.reload();
      }
    });
    button.attr("data-clicked", "false");
  });