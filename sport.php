<html>
   <head>  
      <title>Sportsimo</title>  
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">        
      <link rel = "stylesheet"  
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">  
      <link rel = "stylesheet" href = "css/materialize.css">          
      <script src = "js/materialize.min.js"></script>   
	  <style>
body {font-family: "Lato", sans-serif;}

.sidebar {
  height: 100%;
  width: 60px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:  #1565C0;
  overflow-x: hidden;
  padding-top: 16px;
}

.main {
  margin-left: 60px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.pagination a {
  color: blue;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}

.pagination a.active {
  background-color: dodgerblue;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

	  </style>  
   </head>  
   
   <body>
<?php
   	$sort = isset($_GET['desc']) ? $_GET['desc'] : 0;
	$pocet_riadkov = isset($_GET['riadky']) ? $_GET['riadky'] : 5;
	$strana_aktualna = isset($_GET['strana']) ? $_GET['strana'] : 1;
?>
 <!-- menu nalavo -->
 <div class="sidebar">
	 <div class="blue darken-3">
		 <span class="white-text"> <a href="#"><i class="material-icons">menu</i></a></span></br></br>
		 <span class="white-text"> <a href="#"><i class="material-icons">dashboard</i></a></span></br></br>
		 <span class="white-text"> <a href="#"><i class="material-icons">group</i> </a></span></br></br>
		 <span class="white-text"> <a href="#"><i class="material-icons">warning</i> </a></span></br></br>
		 <span class="white-text"> <a href="#"><i <i class="material-icons">local_offer</i> </a></span>
	 </div> 
</div> 

<!-- zbytok obrazovky -->
<div class="main">
	<div class="blue darken-3">
		<span class="white-text"><i class="right"><a href="#home"><h6>Odhlásiť(admin)</h6></a></i> <h4>SRP</h4></span>
	</div>
	<div class="row">
		<div class="col s12 blue">
			<span class="white-text"><i class="material-icons medium left">arrow_back</i> <h5>Značky</h5></span>
		</div>
	</div>
	
	<a href="nova_znacka.php">
		<button class="btn blue" >+ Pridať značku</button>
	</a> 
<!-- tabulka s datami -->
	<table border="1">
      <thead>
		<p class="z-depth-5">
			<tr>
				<th>Názov<a href="sport.php?desc=0&riadky=<?php echo $pocet_riadkov; ?>&strana=<?php echo $strana_aktualna; ?>"><i class="material-icons">arrow_upward</i></a><a href="sport.php?desc=1&riadky=<?php echo $pocet_riadkov; ?>&strana=<?php echo $strana_aktualna; ?>"><i class="material-icons">arrow_downward</i></a></th>
				<th><i class="right">Akcia</i></th>
			</tr>
		</p>
      </thead>
<?php
   $con = mysqli_connect("localhost", "pouzivatel", "cibula")
	or die("K databázovému serveru sa nepodarilo pripojiť: ". mysqli_error());
   $con_db = mysqli_select_db($con,"databaze_pro_web")or die ("neda sa pripojit k databaze"); ;
   if ( $sort == 1) {
	   $dotaz = "SELECT * FROM `znacka` WHERE 1 ORDER BY `nazov` DESC;";
   }
   else {
		$dotaz = "SELECT * FROM `znacka` WHERE 1 ORDER BY `nazov`;";
   }
   $dot = mysqli_query($con,$dotaz);
   $num_rows = mysqli_num_rows($dot);
// vypocitam si pocet stran, riadkov atd.
   $h=$num_rows/$pocet_riadkov;
   $strany_mozne = (int)$h;
   $zvysok=(($num_rows%$pocet_riadkov)>0)?1:0;
   $strany_mozne=$strany_mozne+$zvysok;
   $riadok_prvy=($strana_aktualna-1)*$pocet_riadkov+1;
   $riadok_posledny=$strana_aktualna*$pocet_riadkov;
   $pocit=1;
   while ($zoznam = mysqli_fetch_array($dot)) {
		if (($pocit>=$riadok_prvy)&&($pocit<=$riadok_posledny)) {
			echo "<tr><td>".$zoznam["nazov"]."</td>\n";
			echo "<td class=\"right\" ><a href=\"vymaz.php?vstup=".$zoznam["znacka_id"]."\">Zmazať</a></td>\n";
			echo "<td class=\"right\" ><a href=\"edit_znacka.php?vstup=".$zoznam["znacka_id"]."\">Editovať</a></td>\n";
		}
		$pocit=$pocit+1;
   };
   mysqli_close($con);
?>
	</table>
<!-- pocet zaznamov na stranku -->	
	<ul class="pagination left">
		<a <?php if ($pocet_riadkov==5) echo "class=\"active\""; ?> href="sport.php?desc=<?php echo $sort; ?>&strana=1&riadky=5"> 5 </a>
		<a <?php if ($pocet_riadkov==10) echo "class=\"active\""; ?> href="sport.php?desc=<?php echo $sort; ?>&strana=1&riadky=10">10</a>
		<a <?php if ($pocet_riadkov==15) echo "class=\"active\""; ?> href="sport.php?desc=<?php echo $sort; ?>&strana=1&riadky=15"> 15 </a>
		<a <?php if ($pocet_riadkov==20) echo "class=\"active\""; ?> href="sport.php?desc=<?php echo $sort; ?>&strana=1&riadky=20"> 20 </a>
	</ul>
<!-- strany -->
	<ul class="pagination right">
<?php
	if ($strana_aktualna==1) {
		echo "<a class=\"disabled\" href=\"sport.php?desc=".$sort."&strana=1&riadky=".$pocet_riadkov."\"><i class=\"material-icons\">chevron_left</i></a>";
	}
	else {
		$tmp=$strana_aktualna-1;
		echo "<a href=\"sport.php?desc=".$sort."&strana=".$tmp."&riadky=".$pocet_riadkov."\"><i class=\"material-icons\">chevron_left</i></a>";
	}
	
	for ($ii = 1; $ii <= $strany_mozne ; $ii++) {
		if ($strana_aktualna == $ii ) {
			echo "<a class=\"active\" href=\"sport.php?desc=".$sort."&strana=".$ii."&riadky=".$pocet_riadkov."\">".$ii."</a>";
		}
		else {
			echo "<a href=\"sport.php?desc=".$sort."&strana=".$ii."&riadky=".$pocet_riadkov."\">".$ii."</a>";
		}
	}
	
	if ($strana_aktualna >= $strany_mozne) {
		echo "<a class=\"disabled\" href=\"sport.php?desc=".$sort."&strana=".$strany_mozne."&riadky=".$pocet_riadkov."\"><i class=\"material-icons\">chevron_right</i></a>";
	}
	else {
		$tmp=$strana_aktualna+1;
		echo "<a href=\"sport.php?desc=".$sort."&strana=".$tmp."&riadky=".$pocet_riadkov."\"><i class=\"material-icons\">chevron_right</i></a>";
	}
?>
  </ul>

	</div>
	</body>
</html>