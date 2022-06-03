<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <Style>
        body {
  background-color: lightgray;
}
#borders{
 border-width: 1px
 

}
    </Style>
</head>
<body>
<script>

 </script>


<div >
      <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
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
              
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div>
        <?php
        $iduzytkownika = $_SESSION['iduzytkownika'];
    $conn = @new mysqli('localhost','root', '','serwiskomputerowy');
            if($conn->connect_error !=0){
                echo "Wystąpił błąd połączenia";
               }
               else{
                $data = "SELECT * FROM owner where Id='$iduzytkownika'";
                $result = $conn->query($data);
                if($result!=null){
                    while($row = $result->fetch_assoc()){

              echo " 
        
        <div class='d-flex container justify-content-center'>
        <div class='justify-content-center' style='width:50%' >
        <div class='mx-auto' style=''>
            <div class='mt-5'>
            <form action ='EdytujDaneUzytkownika.inc.php'  method='post' enctype='multipart/form-data'>
                
                <input type='Text' class='form-control' id='Imie' name='Imie' value='$row[Imie]' placeholder='Imię' required><br>
                <input type='Text' class='form-control' id='Nazwisko' name='Nazwisko' value='$row[Nazwisko]' placeholder='Nazwisko' required><br>
                <input type='Text' class='form-control' id='Email' name='Email' value='$row[AdresEmail]' placeholder='E-mail' required><br>
                <input type='number' class='form-control' id='number' name='number' value='$row[NumerTelefonu]' placeholder='Numer Telefonu' required><br>
                
                <button type='submit' class='form-control' id='submit' >Zarejestruj</button>
            </form>
            </div></div>
          </div>
";
                    }}}?>
        </div>
      
</body>
</html>