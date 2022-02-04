<?php
// nacitaj udaje do tabulky
$znacka_nazov  = $_POST["znacka_nazov"];
$logo = $_POST["logo"];
$url = "sport.php";
$url2 = "nova_znacka.php";

 if (($znacka_nazov=="")|| ($znacka_nazov==NULL)){
    echo "Nie je zadaný názov značky";
	echo "<br>";
	echo "<a href='$url2'>Naspäť</a>"; 
	return;
}
 
$con = mysqli_connect("localhost", "pouzivatel", "cibula")
   or die("K databázovému serveru sa nepodarilo pripojiť: ". mysqli_error());
 // print ("Pripojenie bolo úspešné");
echo "<br>";
$con_db = mysqli_select_db($con,"databaze_pro_web")or die ("Nedá sa pripojiť k databáze"); ;
if (($logo=="")||($logo==NULL))
	$sql = "INSERT INTO `znacka` (`znacka_id`, `nazov`, `logo`) VALUES (NULL, '$znacka_nazov', NULL);";
else
	$sql = "INSERT INTO `znacka` (`znacka_id`, `nazov`, `logo`) VALUES (NULL, '$znacka_nazov', '$logo');";

if ($con->query($sql) === TRUE) {
  echo "Nová značka bola úspešne pridaná";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con);
echo "<br>";
echo "<a href='$url'>Naspäť</a>"; 
?>

