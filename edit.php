<?php
	require("/home/brigkann/config.php");
	
	$database = "if16_brigitta";
	
	if(isset($_POST["update"])){
	
	updateMovie(cleanInput($_POST["synopsis"]), cleanInput($_POST["actors"]));
	
	header("Location: edit.php?id=".$_POST["id"]."&success=true");
	exit();	
	
}

$c = getSingleMovieData($_GET["id"]);
	var_dump($c);
	
?>
<br><br>
<a href="movies.php"> back </a>

<h2>Edit info</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
	<input type="hidden" name="id" value="<?=$_GET["id"];?>" > 
  	<label for="note" >synopsis</label><br>
	<textarea  id="synopsis" name="synopsis"><?php echo $c->synopsis;?></textarea><br>
  	<label for="actors" >actors</label><br>
	<input id="actors" name="actors" type="text" value="<?=$c->actors;?>"><br><br>
  	
	<input type="submit" name="update" value="Save">
  </form>

<br><br>
<a href="?id=<?=$_GET["id"];?>&delete=true">delete</a>