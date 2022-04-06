<?php




$jmeno = $_POST["jmeno"] ?? null;
$prijmeni = $_POST["prijmeni"] ?? null;
$datum = $_POST["datum"] ?? null;
$email = $_POST["email"] ?? null;
$tel = $_POST["tel"] ?? null;

$ulice = $_POST["ulice"] ?? null;
$cp = $_POST["cp"] ?? null;
$obec = $_POST["obec"] ?? null;
$psc = $_POST["psc"] ?? null;
$checkbox = $_POST["checkbox"] ?? null;

$btn = $_POST["submit"] ?? null;
$errorarray = [];



if (isset($btn)) {
    

if ($jmeno == null || $prijmeni == null || $email == null || $tel == null || $ulice == null || $cp == null || $psc == null || $datum == null) {

    $errorarray["err0"] = true;
}else{

    if (!preg_match("/^(([a-ž]|[A-Ž])[ ]*)+$/", $jmeno)) {
        $errorarray["err1"] = true;
    }
    if (!preg_match("/^(([a-ž]|[A-Ž])[ ]*)+$/", $prijmeni)) {
        $errorarray["err2"] = true;
    }

    if (!preg_match("/^[0-9]{4}-(0*[1-9]|1[0-2])-(0*[1-9]|[1-2][0-9]|3[0-1])$/", $datum)) {
        $errorarray["err3"] = true;
    }else{

        $datum = strtotime($datum);
        
        $min = strtotime('+18 years', $datum);
        $max = strtotime('+120 years', $datum);
        
        if(time() < $min)  {
           $errorarray["err14"] = true;
        }

        if(time() > $max)  {
            $errorarray["err3"] = true;
         }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorarray["err4"] = true;
    }else{
        $dotaz = $db->prepare("SELECT iduser FROM user WHERE email=(?)");
        $dotaz->execute([$email]);
        $dbemail = $dotaz->fetch(PDO::FETCH_ASSOC);
        $dbemail = $dbemail["iduser"];
      

        if (isset($dbemail) && $dbemail!=$user["iduser"]) {
            $errorarray["err13"] = true;
        }
    }
    if (!preg_match("/^[0-9]{3}[ ]*[0-9]{3}[ ]*[0-9]{3}$/", $tel)) {
        $errorarray["err5"] = true;
    }else{
        $dotaz = $db->prepare("SELECT iduser FROM user WHERE phonenumber=(?)");
        $dotaz->execute([$tel]);
        $dbtel = $dotaz->fetch(PDO::FETCH_ASSOC);
        $dbtel = $dbtel["iduser"];

        if (isset($dbtel) && $dbtel!=$user["iduser"]) {
            $errorarray["err15"] = true;
        }
    }


    if (!preg_match("/^[0-9]*$/",$cp)) {
        $errorarray["err9"] = true;
    }

    if (!preg_match("/^(([a-ž]+|[A-Ž])+[ ]*)+$/", $obec)) {
        $errorarray["err10"] = true;
    }
    if (!preg_match("/^[0-9]{5}$/", $psc) && !preg_match("/^[0-9]{3}[ ]{1}[0-9]{2}$/", $psc)) {
        $errorarray["err11"] = true;
    }

    if (!isset($_POST["checkbox"])) {
        $errorarray["err12"] = true;
    }
 
}

if (empty($errorarray)) {
    $validovano = true;
    include 'updateuser.php';
}


}


