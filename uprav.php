<?php
// nacitam hodnoty do tabulky
$znacka_id  = $_GET["vstup"];
$znacka_nazov  = $_POST["znacka_nazov"];
$logo = $_POST["logo"];
$url = "sport.php";
$url2 = "edit_znacka.php";

 if (($znacka_nazov=="")|| ($znacka_nazov==NULL)){
    echo "Nie je zadaný názov značky";
	echo "<br>";
	echo "<a href='$url2'>Naspäť</a>"; 
	return;
}

//pripojim sa k DB
$con = mysqli_connect("localhost", "pouzivatel", "cibula")
   or die("K databázovému serveru sa nepodarilo pripojiť: ". mysqli_error());
//   print ("Pripojenie bolo úspešné");
echo "<br>";
$con_db = mysqli_select_db($con,"databaze_pro_web")or die ("Nedá sa pripojiť k databáze"); ;
$sql = "UPDATE `znacka` SET nazov = '$znacka_nazov', logo = '$logo' WHERE znacka_id = '$znacka_id'";
if ($con->query($sql) === TRUE) {
  echo "Značka bola úspešne aktualizovaná";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con);
echo "<br>";

echo "<a href='$url'>Naspäť</a>"; 
?>

