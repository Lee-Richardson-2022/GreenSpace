<?php 
require("NavBar.php");
?>

<head>
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="site.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>


<div>
  <a class="nav-link text-dark" href="/GreenSpace/HomePage.php" style="margin-top: 75px; margin-left: 75px;">
    <img border="0" alt="User Icon" src="Logo.png" width="150" height="150">
  </a>
  <p style="margin-left: 100px; margin-top: 10px;">Waterman group</p>
  <div class="float-right" style="margin-top: 10px; margin-right:200px;">
    <button type="button" class="btn btn-custom">Home</button>
    <button type="button" class="btn btn-custom">Climatespace</button>
    <button type="button" class="btn btn-custom">Environmental</button>
    <button type="button" class="btn btn-custom">H&S</button>
  </div>
</div>
<br>
<br>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #35967c;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav mx-auto justify-content-center"> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Bulletin board
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Planner</a></li>
            <li><a class="dropdown-item" href="#">Manage actions</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="ImprovementTracker.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Improvement tracker
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Planner</a></li>
            <li><a class="dropdown-item" href="#">Manage actions</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="PerformanceDashboard.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Performance dashboard
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="PerformanceDashboard.php">Dashboard</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Docs
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Admin</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
