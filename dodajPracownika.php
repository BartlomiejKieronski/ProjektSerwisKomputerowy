<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
    header("Location:login.php");
  }
  else if (isset($_SESSION['typUzytkownika'])){
    if ($_SESSION['typUzytkownika']!='Administrator'){
        header("Location:devices.php");
  }
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
  background-color: lightgray;
}
#borders{
 border-width: 1px
 

}
    </Style>
</head>
<body>
 


<div >
      <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#"><img src='Projekt_ks.png' alt="" width="30" height="30" class="d-inline-block align-text-top"></a>
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
                <a class="nav-link active text-white" href="Userinfo.php">Moje naprawy</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div>
      
        <div >
        <div class="mx-auto" style="width: 1000px;">
            <div class="mt-5">
            <form action ="dodajPracownika.inc.php"  method="post" enctype="multipart/form-data">
                
                <input type="Text" class="form-control" id="Imie" name="Imie" placeholder="Imie pracownika"><br>
                <input type="Text" class="form-control" id="Nazwisko" name="Nazwisko" placeholder="Nazwisko pracownika"><br>
                <input type="Text" class="form-control" id="Email" name="Email" placeholder="E-mail pracownika"><br>
                <input type="number" class="form-control" id="number" name="number" placeholder="Numer telefonu pracownika"><br>
                <input type="password" class="form-control" id="password" name="password" placeholder="Hasło dla pracownika"><br>
                <input type="password" class="form-control" id="password" name="password" placeholder="Potwierdź hasło"><br>
                <button type="submit" class="form-control" id="submit" >Zarejestruj</button>
            </form>
            

            </div>
          </div>

        </div>
      
</body>
</html>