<?php
	session_start();
	if (!isset($_SESSION['Email'])) {
		header('location: login.php');
		exit;
	}
	
	// Connect to the database
	$database = new SQLite3('C:\xampp\htdocs\Relateable\RelateableDB.db');
	
	if (isset($_POST['submit'])) {
		$text = $_POST['text'];
		
		// Check if an image was uploaded
		if (!empty($_FILES['image']['name'])) {
			// Define the upload directory and the file name
			$target_dir = 'C:\xampp\htdocs\Relateable\Photo\\';
			$target_file = $target_dir . basename($_FILES['image']['name']);
			
			// Move the uploaded file to the upload directory
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
				$image_path = $target_file;
        $image = $_FILES['image']['name'];
			} else {
				echo "Sorry, there was an error uploading your file.";
				exit;
			}
		} else {
			$image_path = '';
		}
		
		$timestamp = date('Y-m-d H:i:s');
		
		// Insert the post into the database
		$stmt = $database->prepare('INSERT INTO Posts (text, image, image_path, timestamp) VALUES (:text, :image, :image_path, :timestamp)');
		$stmt->bindValue(':text', $text);
    	$stmt->bindValue(':image', $image);
		$stmt->bindValue(':image_path', $image_path);
		$stmt->bindValue(':timestamp', $timestamp);
		$stmt->execute();
	}
	
	header('location: confirmation.php');
	exit;
?>