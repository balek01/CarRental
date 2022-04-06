 <?php



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
} else {
include '../../assets/php/dbconnect.php';


$id = array_keys($_POST);



 $dotaz = $db->prepare("DELETE from reservation WHERE idreservation =?");
 $dotaz->execute([$id[0]]);


}