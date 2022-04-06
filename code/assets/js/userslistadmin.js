$(".getaddress").click(function() {
    let clickedID = $(this).attr("id");

    console.log(clickedID);
    $.ajax({
      url: '/administration/usersadmin/getaddress.php',
      type: 'post',
      data: clickedID,
      success: function(data) {

        data = JSON.parse(data);
        console.log(data);
        data["city"] = data["city"].charAt(0).toUpperCase() + data["city"].slice(1)
        data["street"] = data["street"].charAt(0).toUpperCase() + data["street"].slice(1)
        $("#useraddressid").html( data["iduser_address"]);
        $("#useraddresscity").html(data["city"]);
        $("#useraddresspostcode").html( data["postcode"]);
        $("#useraddressstreet").html(data["street"]);
        $("#useraddresshousenumber").html(data["house_number"]);

      }

    })
  });


  
  $(".deleteuser").click(function() {
    $(".deleteuser").attr("data-clicked", "false");
    $(this).attr("data-clicked", "true");

  });

  $("#confirmdeleteuser").click(function() {
    let button = $(".deleteuser").filter('[data-clicked="true"]')
    $.ajax({
      url: '/administration/usersadmin/deleteuser.php',
      type: 'post',
      data: button.attr("id"),
      success: function(data) {
         
       location.reload();
      }
    });
    button.attr("data-clicked", "false");
  });