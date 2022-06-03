<?php
session_start();

$idpracownika = $_POST["Pracownik"];
$idurzadzenia = $_POST["iduz"];

$polaczenie=mysqli_connect('localhost','root','','serwiskomputerowy');
if($polaczenie->connect_error !=0){
    echo 'błąd połączenia';
}
else{
    $sql = "UPDATE urzadzenie SET PrzypisanyPracownik='$idpracownika' WHERE idUrzadzenia = $idurzadzenia;";
    if($polaczenie->query($sql)){
        
    header("Location:deviceinfo.php?id=$idurzadzenia");
}}

?>