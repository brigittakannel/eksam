<?php

	require("functions.php");

?>

<h1>MOVIES</h1>
<p>Welcome <?=$_SESSION["userEmail"];?>!
<br><br>
</p>

<h1>insert movie</h1>
<form method="POST">
	
			<label>movie</label><br>
			<input name="title" type="text">
			
			<br><br>
			<input name="actors" type="text">
			<br><br>
			<input name="synopsis" type="text">
			<br><br>
			<input name="rating" type="text">
			<br><br>
					
			<input type="submit" value="Save">
	</form>
	
<h2>archive</h2>

<?php
foreach($result as $item) {

		echo '<div style="display:flex;width:33%;margin-bottom:5px;"><div style="background-color:rgba
		('.rand(0,255).','.rand(0,255).','.rand(0,255).',0.5'.rand(0,1).')
		;float:left;display:flex;justify-content:flex-end;word-wrap:break-word; position: relative">';
	
	
?>
