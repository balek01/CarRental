$('#formregister button').click(function(e) {
    e.preventDefault();
    let registername = $(this).attr("name");

    $.ajax({
        url: '/registration/validatedata.php',
        type: 'post',
        data: $('#formregister').serialize() + '&btnname=' + registername,
        success: function(data) {

            
            data = JSON.parse(data);

            $(".err").hide();
         let iserror = false;
            for (let index in data) {
                if (data[index] == true) {
                    console.log(data[index]);
                    iserror = true;
                    $("#" + index).show();
                }
            }

            if (iserror!=true) {
                alert("Registrace byla úspěšná, stačí se přihlásit!");
                window.location.href="/";
            }
           
           
        }
    });
});