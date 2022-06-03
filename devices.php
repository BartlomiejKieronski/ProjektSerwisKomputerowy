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
  background-color: lightgray;
}

    </Style>
</head>
<body>
 
<!-- navbar -->
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
    <?php
    $conn = @new mysqli('localhost','root','','serwiskomputerowy');
    if($conn->connect_error !=0){
      echo "Wystąpił błąd połączenia";
     }
    else{
      $data = "SELECT * FROM urzadzenie";
      $result = $conn->query($data);
    
      if($result!=null){
        while($row = $result->fetch_assoc() ){
          echo "<div class='row border-bottom border-dark mt-3' id='devices'>
          <a type='submit' href='deviceinfo.php?id=$row[idUrzadzenia]'>
          <div class='col'> $row[typUrzadzenia] $row[idUrzadzenia] $row[Stan]<img src='PC.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img></div>
          </a></div> ";
      }
    }
  }
    ?>


</script>
            </div>
        </div>
        <!-- paginator -->
    <?php

$number = "SELECT max(idUrzadzenia) as max FROM urzadzenie;";
$result1 = $conn->query($number);
if($result1!=null){
  while($row1 = $result1->fetch_assoc()){
    
    $x = "$row1[max]";  

  }
}
$y = (int)($x/10);
$z = $x%10;
if($z>0){
  $a = $y+1;
}
$i=1;
  echo "<div class=' justify-content-center '>
    <ul class='pagination justify-content-center '>
    <li class='page-item'><a class='page-link' href='#'>Previous</a></li>";
  while($a>0){

    echo "<li class='page-item'><a class='page-link' href='#'>$i</a></li>";
    $a = $a-1;
    $i = $i+1;
  } 

echo "<li class='page-item'><a class='page-link' href='#'>Next</a></li>
</ul>
</nav>
</div>;"

?>
    </div>

    
    
  
  </div>
  <div class="fixed-bottom sticky-bottom" >
        <div class="moje bg-dark text-white" style="" height="100px">
      <footer>
      test
</footer>
</div>
</div>
</body>
</html>