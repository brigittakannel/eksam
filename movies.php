<?php

	require("functions.php");
	if(isset($_POST['title']) && 
		!empty($_POST['title']) &&
		(isset($_POST['actors'])) &&
		!empty($_POST['actors']) &&
		(isset($_POST['synopsis'])) && 
		!empty($_POST['synopsis']) &&
		(isset($_POST['rating'])) &&
		!empty($_POST['rating'])) {
			
		
	$movies = saveMovie($_POST['title'],$_POST['actors'],$_POST['synopsis'],$_POST['rating'] );
	
	}
?>

<h1>MOVIES</h1>
<p>Welcome <?=$_SESSION["userId"];?>!
<br><br>
</p>

<h1>insert movie</h1>
<form method="POST">
	
			<label>movie</label><br>
			<input name="title" type="text">
			
			<br><br>
			<label>actors</label><br>
			<input name="actors" type="text">
			<br><br>
			<label>synopsis</label><br>
			<input name="synopsis" type="text">
			<br><br>
			<label>imdb rating (i.e 9,0)</label><br>
			<input name="rating" type="text">
			<br><br>
					
			<input type="submit" value="Save">
	</form>
	
<h2>archive</h2>

<?php

$result = getAllMovies();
//var_dump($result);
foreach($result as $item) {

		echo '<div style="display:flex;width:33%;margin-bottom:5px;"><div style="background-color:rgba
		('.rand(0,255).','.rand(0,255).','.rand(0,255).',0.5'.rand(0,1).')
		;float:left;display:flex;justify-content:flex-end;word-wrap:break-word; position: relative">';
		echo $item->title;
		echo "<br>";
		echo $item->actors;
		echo "<br>";
		echo $item->synopsis;
		echo "<br>";
		echo $item->rating;
	
echo "<a href='edit.php?id=".$item->id."'>edit</a>";
}
?>