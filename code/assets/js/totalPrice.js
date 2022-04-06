function totalPrice(price) {
    $("#errreserve2").hide();

    

    let datumod = document.getElementById("datumod").value;
    datumod = new Date(datumod);

    let datumdo = document.getElementById("datumdo").value;
    datumdo = new Date(datumdo);

    let timediff = datumdo - datumod;
    let days = timediff / (1000 * 3600 * 24) + 1;

   
    price = price * days;
console.log(price);

    let output = "Cena celkem " + price + " Kč";

    let today = new Date();
    let date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    today = new Date(date);


    if (price > 0) {

        document.getElementById("totalprice").innerHTML = output.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    } else {
        $("#errreserve2").show();
    }


}