<!DOCTYPE HTML>  
<html>
<head>
     <title>Sportsimo</title>  
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">        
      <link rel = "stylesheet"  
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">  
      <link rel = "stylesheet" href = "css/materialize.css">     
      <script src = "js/materialize.min.js"></script>   
</head>
<body>  

<?php
$znacka_id  = $_GET["vstup"];
$con = mysqli_connect("localhost", "pouzivatel", "cibula")
   or die("K databázovému serveru sa nepodarilo pripojiť: ". mysqli_error());
//   print ("Pripojenie bolo úspešné");
echo "<br>";
$con_db = mysqli_select_db($con,"databaze_pro_web")or die ("Nedá sa pripojiť k databáze"); ;
$sql = "SELECT * FROM `znacka` WHERE znacka_id=".$znacka_id.";";
$dot = mysqli_query($con,$sql);
while ($zoznam = mysqli_fetch_array($dot)) {
	   $znacka_naz=$zoznam["nazov"];
	   $logo=$zoznam["logo"];
};
mysqli_close($con);  
 ?>

	<div class="blue darken-3 col s12 m12 l12">
		<span class="white-text"> <h4>Upraviť značku</h4></span>
	</div>


	<div class="row">
		<form method="POST" action="uprav.php?vstup=<?php echo $znacka_id; ?>"> 
		  <i class="col s12">
			<div class="row">
			  <div class="input-field col s6">
				<input id="first_name" type="text" class="validate" name="znacka_nazov" value="<?php echo $znacka_naz ?>">
				<label for="first_name">Názov značky</label>
			  </div>
			  <div class="input-field col s6">
				<input id="last_name" type="text" name="logo" value="<?php echo $logo ?>">
				<label for="last_name">Logo</label>
			  </div>
			</div>
		  </i>
		  <i class="col s2">
			<button class="btn waves-effect waves-light" type="submit" name="action">Zmeniť
				<i class="mdi-content-send right"></i>
			</button>
				  
		  </i>
		 </form>
		 <i class="col s3">
			<a href='sport.php'>
			  <button class="btn waves-effect waves-light" >Naspäť
				<i class="mdi-content-send right"></i>
			  </button>
			</a>
		 </i>
	</div>

</body>
</html>