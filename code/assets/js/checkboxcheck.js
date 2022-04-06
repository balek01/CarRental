function ischecked(){
    let checkBox = $("#checkito").prop("checked");
    if (checkBox == true) {
        $("#submitbutton").attr("disabled", false);
    }else{
        $("#submitbutton").attr("disabled", true);

    }
}