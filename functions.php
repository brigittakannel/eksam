<?php
	require("../../../config.php");
	session_start();

	$database = "if16_brigitta";

	
	function signup($email, $password) {
			
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO m_user (email, password) VALUES(?,?)");
		
		echo $mysqli->error;
		
		$stmt->bind_param("ss", $email, $password);
		
		if ($stmt->execute() ) {
			
			echo "saving success";
		} else {
			
			echo "ERROR ".$stmt->error;
		}
		
		
	}
	
	function login($email, $password) {
		
		$notice = "";
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, email, password FROM m_user WHERE email=? ");
		
		$stmt->bind_param("s", $email);
	
		
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb);
		
		$stmt->execute();
	
		if ($stmt->fetch()) {
		
			
			$hash = hash("sha512", $password);
			if ($hash == $passwordFromDb) {
			
				echo "user ".$id." logged in";
				
				$_SESSION["userId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				
				header("Location: movies.php");
				
			} else {
				$notce = "wrong password";
			}
				
			
			
		} else {
	
			$notice = "there's no user with that email!";
			
		}
		return $notice;
	}
		
function saveMovie($title, $actors, $synopsis, $rating) {
			
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO m_movies (m_title, m_actors, m_synopsis, m_rating) VALUES(?,?,?,?)");
		
		echo $mysqli->error;
		
		$stmt->bind_param("sssi", $title, $actors, $synopsis, $rating);
		
		if ($stmt->execute() ) {
			
			echo "saving success";
		} else {
			
			echo "ERROR ".$stmt->error;
		}
		
		
	}
	
function getAllMovies() 	{
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT m_title, m_actors, M_synopsis, m_rating FROM m_movies");
		
		$stmt->bind_result($title, $actors, $synopsis, $rating);
		$stmt->execute();
		
		$result = array();
	
		while($stmt->fetch()) {
		
			$object = new StdClass();
			$object->title = $title;
			$object->actors = $actors;
			$object->synopsis = $synopsis;
			$object->rating = $rating;
			
			
			array_push($result, $object);
		}
		return $result;
		
	}

function cleanInput ($input) {
	
	$input = trim($input);
	
	$input = stripslashes($input);
	
	$input =  htmlspecialchars($input);
	
	return $input;
}
?>