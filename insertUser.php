<?php

// both these functions do the same job one is for staff one is for customers
// Both these  functions inserrt rows of information into their respective fields 

function createUser($Email, $Password, $Fname, $Lname, $description, $profilePicture) {
    $created = false;
    $db = new SQLite3('C:\xampp\htdocs\Relateable\RelateableDB.db');

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
        $image = '';
    }

    // Insert into user table
    $userID = uniqid(); // Generate a unique user ID
    $sql = "INSERT INTO User (userID, image, image_path, Fname, Lname, Description) 
            VALUES (:userID, :image, :image_path, :Fname, :Lname, :Description)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userID', $userID, SQLITE3_TEXT);
    $stmt->bindParam(':Fname', $Fname, SQLITE3_TEXT);
    $stmt->bindParam(':Lname', $Lname, SQLITE3_TEXT);
    $stmt->bindParam(':description', $description, SQLITE3_TEXT);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':image_path', $image_path);
    $stmt->execute();

    // Insert into customer table
    $sql = "INSERT INTO Authorisation (userID, Email, Password) 
            VALUES (:userID, :Email, :Password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userID', $userID, SQLITE3_TEXT);
    $stmt->bindParam(':Email', $Email, SQLITE3_TEXT);
    $stmt->bindParam(':Password', $Password, SQLITE3_TEXT);
    $stmt->execute();

    // Check if the rows were inserted successfully
    if($stmt) {
        $created = true;
    }

    return $created;
}




function createStaff(){

    $created = false;
    $db = new SQLite3('C:\xampp\htdocs\Relateable\RelateableDB.db'); 
    $sql = "INSERT INTO staff(id, fname, lname, email, postcode, password, admin) VALUES (:id, :fname, :lname, :email, :postcode, :password, :admin)";
    $stmt = $db->prepare($sql); 

    $stmt->bindParam(':id', $_POST['id'], SQLITE3_TEXT);
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':postcode', $_POST['postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    $stmt->bindParam(':admin',$_POST['admin'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();

    //the logic
    if($stmt){
        $created = true;
    }

    return $created;

    
}