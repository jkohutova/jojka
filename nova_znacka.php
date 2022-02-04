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

	<div class="blue darken-3 col s12 m12 l12">
		<span class="white-text"> <h4>Nová značka</h4></span>
	</div>

	<div class="row">
		<form method="post" action="pridaj.php"> 
		  <i class="col s12">
			<div class="row">
			  <div class="input-field col s6">
				<input id="first_name" type="text" class="validate" name="znacka_nazov" >
				<label for="first_name">Názov značky</label>
			  </div>
			  <div class="input-field col s6">
				<input id="last_name" type="text" name="logo" >
				<label for="last_name">Logo</label>
			  </div>
			</div>
		  </i>
		  <i class="col s2">
			  <button class="btn waves-effect waves-light" type="submit" name="action">Pridať
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