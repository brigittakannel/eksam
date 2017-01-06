<?php
	require_once("../../../config.php");
	
	$database = "if16_brigitta";
		$mysqli = new mysqli("serverHost", "serverUsername","serverPassword", "database");
	
	
	function updateNote($id, $note, $color){
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE colorNotes SET note=?, color=? WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("ssi",$note, $color, $id);
		
		// kas ?nnestus salvestada
		if($stmt->execute()){
			// ?nnestus
			echo "saving success!";
		}
		
		$stmt->close();
		$mysqli->close();
		
	}
	
	
	
?>