$('#formlogin button').click(function(e) {
    e.preventDefault();
    let id = $(this).attr("id");

    $.ajax({
        url: '/assets/php/login.php',
        type: 'post',
        data: $('#formlogin').serialize() + '&btnid=' + id,
        success: function(data) {

            data = JSON.parse(data);      
            $("#errlog").hide();

            if (data == false) {

                $("#errlog").show();
            }
            if (data == true) {
                console.log(data);
                window.location.reload();
            }


        }
    });
});