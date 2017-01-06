<?php
	require("/home/brigkann/config.php");
	
	include "functions.php";
	
	$database = "if16_brigitta";
	$id = "";
	if(isset($_GET["id"])){
	$id=($_GET["id"]);}
	
	if(isset($_POST["synopsis"]) &&
		isset($_POST["actors"])){
	updateMovie($id, cleanInput($_POST["synopsis"]), cleanInput($_POST["actors"]));
	}
	//header("Location: edit.php?id=".$id."&success=true");
	//exit();	
	

$synopsis="";
$actors="";
?>
<br><br>
<a href="movies.php"> back </a>

<h2>Edit info</h2>
  <form method="post" >
	 
  	<label for="synopsis" >synopsis</label><br>
	<textarea  id="synopsis" name="synopsis"><?php echo $synopsis;?></textarea><br>
  	<label for="actors" >actors</label><br>
	<input id="actors" name="actors" type="text" value="<?=$actors;?>"><br><br>
  	
	<input type="submit" name="update" value="Save">
  </form>

<br><br>