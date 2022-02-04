<?php
// nacitam ID zaznamu, ktory treba zmazat
$znacka_id  = $_GET["vstup"];
$url = "sport.php";

// pripojim sa k DB
$con = mysqli_connect("localhost", "pouzivatel", "cibula")
   or die("K databázovému serveru sa nepodarilo pripojiť: ". mysqli_error());
//   print ("Pripojenie bolo úspešné");
echo "<br>";
$con_db = mysqli_select_db($con,"databaze_pro_web")or die ("Nedá sa pripojiť k databáze"); ;
$sql = "DELETE FROM `znacka` WHERE znacka_id = '$znacka_id'";
if ($con->query($sql) === TRUE) {
  echo "Značka bola vymazaná";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con);
echo "<br>";

  echo "<a href='$url'>Naspäť</a>"; 
?>

