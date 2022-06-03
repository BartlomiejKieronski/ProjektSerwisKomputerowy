<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
  header("Location:login.php");
}
else{
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <Style>
        body {
 
}.kolor{
  background-color: rgb(3,3,64);
}
.kolory{
  background-color:rgb(3,3,64);
 
}

    </Style>
</head>
<body>
 

    <div >
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
    <div>
        
    <div>
        
        <div style="padding-top: 100px">
        <div class="container-fluid " style="width: 70%; pading:left" >
        
          <div class='container' style='width:70%'>
        <h5>
        <?php
        $idurzytkownika= $_SESSION['iduzytkownika'];
          $conn = @new mysqli('localhost','root','','serwiskomputerowy');
          if($conn->connect_error !=0){
            echo "wystąpił błąd połączenia".$conn->connect_error;
        }
        else{
          $sql = "SELECT * FROM owner WHERE Id='$idurzytkownika'";
          $result=$conn->query($sql);

          
          if($result!=null){
            while($row = $result->fetch_assoc()){
            echo "
            <div class='row m-1 ' style=''>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1' width=''>ID użytkownika: </div>
              <div class='col-6  border border-dark border-1'>$row[Id]</div>
            </div>
             
            <div class='row m-1 '>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Imię właściciela:</div>
              <div class='col-6  border border-dark border-1'>$row[Imie]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Nazwisko właściciela:</div>
              <div class='col-6 border border-dark border-1'>$row[Nazwisko]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Adres E-mail właściciela:</div>
              <div class='col-6 border border-dark border-1'>$row[AdresEmail]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Numer telefonu właściciela:</div>
              <div class='col-6 border border-dark border-1'>$row[NumerTelefonu]</div>
            </div>
            ";
            }
          }
        
      }
      echo"<div class='d-flex justify-content-start mt-2'>
        
        <a href='EdytujDaneUzytkownika.php?id=$idurzytkownika'>
        
        <button class='btn 'style='background-color:lightgray;' type='button'>Edytuj dane</button>
        </div>" ;
        ?>
        
        </a>
       </h5>
          </div>
          <div class="col-xs-6">
      </div>
      </div>
        </div>
    </div>
      </div>
</div>
</body>
</html>