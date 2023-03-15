<!doctype html>
<html lang="en">
  <head>
    <title>Relateable</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/Relateable/site.css"/>
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
  
  </head>
<?php
    session_start();
    if (!isset($_SESSION['Email'])) {
        header('location: login.php');
        exit;
    }
?>

<nav class="navbar navbar-light" style="background-color: #245148; height: 75px;">
    <span class="navbar-text text-white" style="width:100%;">
        Welcome, <?php echo $_SESSION['Email']; ?>
        <button type="button" class="btn btn-success float-right">Log out</button>
    </span>
</nav>
