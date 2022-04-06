
  $(".addrating").click(function() {
    $(".addrating").attr("data-clicked", "false");
    $(this).attr("data-clicked", "true");

  });

  $('#modalrating').on('hidden.bs.modal', function(e) {
    $(".addrating").attr("data-clicked", "false");
    $(".getstars i").attr("data-rating", "false");
    for (index = 5; index > 0; index--) {
      $("#hvezda" + index).attr("class", "fa fa-star-o fa-lg");
    }

  })
  $(".getstars i").click(function() {
    $(".getstars i").attr("data-rating", "false");
    $(this).attr("data-rating", "true");
    let star = $(".getstars i").filter('[data-rating="true"]').first().attr("value");

    for (index = 5; index > 0; index--) {
      $("#hvezda" + index).attr("class", "fa fa-star-o fa-lg");
    }

    for (star; star > 0; star--) {
      $("#hvezda" + star).attr("class", "fa fa-star fa-lg");
    }

  });

  $("#confirmadd").click(function() {
    let button = $(".addrating").filter('[data-clicked="true"]').first();
    let star = $(".getstars i").filter('[data-rating="true"]').first();
    console.log(button.attr("id"));
    let arr = {
      "id": button.attr("id"),
      "star": star.attr("value")
    };


    $.ajax({
      url: '/reservedhistory/addrating.php',
      type: 'post',
      data: arr,
      success: function(data) {
        location.reload();
      }
    });

    button.attr("data-clicked", "false");
    star.attr("data-rating", "false");
  });


  $(".getstars i").mouseover(function() {

    let hodnota = $(this).attr("value");

    for (hodnota; hodnota > 0; hodnota--) {

      $("#hvezda" + hodnota).attr("class", "fa fa-star fa-lg");
    }
  });

  $(".getstars").mouseout(function() {

    let pom = $(".getstars i").filter('[data-rating="true"]').first().attr("value");

    if (typeof pom !== "undefined") {
      for (let index = 5; index > pom; index--) {
        $("#hvezda" + index).attr("class", "fa fa-star-o fa-lg")
      }
    } else {
      for (let index = 5; index > 0; index--) {

        $("#hvezda" + index).attr("class", "fa fa-star-o fa-lg")

      }
    }
  });
