    function getimg(input) {
        if (input.files && input.files[0]) {
            let loader = new FileReader();

            loader.onload = function(e) {
                document.getElementById('imgpre').src = e.target.result
            }

            loader.readAsDataURL(input.files[0]);

        }
    }

    $("#imginput").change(function() {
        getimg(this);
    });

    $(".custom-file-input").on("change", function() {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });