$('#formfilter button').click(function(e) {
    e.preventDefault();
    let filtername = $(this).attr("name");
    $.ajax({
        url: '/carlist/validatedatafilter.php',
        type: 'post',
        data: $('#formfilter').serialize() + '&filtername=' + filtername,
        success: function(data) {

            data = JSON.parse(data);

            if (data["od"] == true || data["do"] == true) {

                alert("Cena musí být číslo");

            } else {


                $("#formfilter").submit();
            }
        }
    });
});