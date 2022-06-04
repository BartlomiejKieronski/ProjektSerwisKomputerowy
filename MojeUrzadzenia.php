<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
  header("Location:login.php");
}
else{
}
if(isset($_GET['id'])){
  $strona=$_GET['id'];
}
else{
  $strona = 1;
}
$następna = $strona+1;
$poprzednia = $strona-1;
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <Style>
        body {
  background-color: ;
}
.kolor{
  background-color: rgb(3,3,64);
}
.kolory{
  background-color:rgb(3,3,64);
 
}
    </Style>
</head>
<body>
 
<!-- navbar -->
    <div class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-light kolor text-white">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">Serwis Komputerowy</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Strona główna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">O Nas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Kontakt</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" href="#">Mój profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" href="#">Moje naprawy</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- Ciało -->
    <div class="container">
    <div style="padding: 100px">
    <div class="container padding-left" >
    <div class='row border-bottom border-dark mt-3' id='devices'>
    <h5>Urządzenia do naprawy przypisane do ciebie:</h5>
                    <div class='col'> <div class='row'> <div class='col'>ID:</div> <div class='col'>Typ urządzenia:</div> <div class='col'>Stan:</div> <div class='col'>Imie przypisanego pracownika:</div> <div class='col'>Nazwisko przypisanego pracownika:</div><div class='col'></div></div></div>
                    </div>
    <?php
    $test=$_SESSION['typUzytkownika'];
    
    $h=10;
    $offset = ($strona-1) *$h;
    
    $idu = $_SESSION['iduzytkownika'];

    $conn = @new mysqli('localhost','root','','serwiskomputerowy');
    if($conn->connect_error !=0){
      echo "Wystąpił błąd połączenia";
     }
    else{
        if(isset($_SESSION['typUzytkownika'])){
            if($_SESSION['typUzytkownika']=='Uzytkownik'){
                $uzytkownik = "SELECT * FROM owner WHERE Id = $idu";
                $urzadzenie = "SELECT * FROM urzadzenie WHERE Stan !='Odebrane'";
                $result2 = $conn->query($urzadzenie);
                $result = $conn->query($uzytkownik);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                       
                         
                         if($result2->num_rows>0){
                             while ($row2 = $result2->fetch_assoc()){
                                 if($row['Imie']==$row2['imieWlasciciela'] && $row['Nazwisko']==$row2['nazwiskoWlasciciela'] && $row['NumerTelefonu']==$row2['numerTelefonuWlasciciela'] && $row['AdresEmail']==$row2['adresEmailWlasiciela']){
                                     #echo "$row[Imie]";

                                     echo "<div class='row border-bottom border-dark mt-3' id='devices'>
                                     <a type='submit' href='deviceinfo.php?id=$row2[idUrzadzenia]'>
                                     <div class='col'> $row2[idUrzadzenia] $row2[typUrzadzenia] $row2[Stan] <img src='PC.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img></div>
                                     </a></div> ";

                                 }
                             }
                         } 
                    }
                }    
            }
            else if(($_SESSION['typUzytkownika']!="Uzytkownik") ){
               #echo "cos";
               $idpracownika = $_SESSION['iduzytkownika'];
               $urzadzeniaNaprawiane = "SELECT * FROM urzadzenie WHERE PrzypisanyPracownik = $idpracownika && Stan != 'Odebrane' && Stan != 'Niemożliwe do naprawy' && Stan != 'Do odbioru' && Stan != 'Zrealizowane' && Stan != 'Niemożliwe do naprawy' ";
               $result3 = $conn->query($urzadzeniaNaprawiane);
               if($result3 ->num_rows>0){
                   while($row3=$result3->fetch_assoc()){
                    $data1 = "SELECT Imie,Nazwisko FROM owner WHERE Id='$row3[PrzypisanyPracownik]'";
                    $wynik = $conn->query($data1);
                    echo "<div class='row border-bottom border-dark mt-3' id='devices'>
                    <a type='submit' href='deviceinfo.php?id=$row3[idUrzadzenia]'>
                    <div class='col'> <div class='row'> <div class='col'>$row3[idUrzadzenia]</div> <div class='col'>$row3[typUrzadzenia]</div> <div class='col'>$row3[Stan]</div> "; while($row5=$wynik->fetch_assoc()){echo "<div class='col'>$row5[Imie]</div> <div class='col'>$row5[Nazwisko]</div> ";} echo"<div class='col'><img src='PC.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img></div></div></div>
                    </a></div> ";
                   }
               }
            }
        }
    }
    ?>
            </div>
        </div>
        <!-- paginator -->
 
    </div>
  </div>
  
</div>
</body>
</html>