<?php


if (!empty($_POST["filtername"])) {
    

   
$cenaod = $_POST["cenaod"]=="" ? 0: $_POST["cenaod"];
$cenado = $_POST["cenado"]=="" ? 0:$_POST["cenado"];

 
if (!preg_match("^\d$^", $cenaod)) {
    $errprice["od"] = true;
}else {
    $errprice["od"]=false;
}

if (!preg_match("^\d$^", $cenado)) {
    $errprice["do"] = true;
}else {
    $errprice["do"]=false;
}


echo (json_encode($errprice));

}else {
 
    header("Location: /vozovy_park", true, 301);
  
}