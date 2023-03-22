<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Dashboard</title>
    
    <link rel="stylesheet" href="site.css">

</head>
<body>

<div class="sidebar" id="add-widget-sidebar">
        <div class="sidebar-title">
            <h2>Add Widgets</h2>
            <p>Drag and Drop Widgets onto your Dashboard</p>
        </div>

        <div class="sidebar-scroll">
            <p class="draggable" draggable="true">Widget 3</p>
            <p class="draggable" draggable="true">Widget 4</p>
            <p class="draggable" draggable="true">Widget 4</p>
            <p class="draggable" draggable="true">Widget 4</p>
            <p class="draggable" draggable="true">Widget 4</p>
            <p class="draggable" draggable="true">Widget 4</p>
            <p class="draggable" draggable="true">Widget 4</p>
        </div>

        <div class="sidebar-footer">
            <a href="javascript:void(0)" class="button button-primary" onclick="closeNav()">Done</a>
        </div>
    </div>

<?php //require("navbar.php"); // adding the navbar

?>
    
<div class="main-container">
    <h1>My Performance Dashboard</h1>
    <div style="display: flex; flex-direction: row; padding-bottom: 10px;"">
        <a href="#" class="button button-primary current">My Dashboard</a>
        <a href="#" class="button button-primary">Waterman</a> 
    </div>
    <button class="button-secondary" onclick="openNav()">edit widgets</button>
    <div style="display: flex;">
    </div>

    <div class="container">
        <p class="draggable" draggable="true">Widget 1</p>
        <p class="draggable wide" draggable="true">Widget 2</p>
        <p class="draggable" draggable="true">Widget 4</p>
        <p class="draggable" draggable="true">Widget 4</p>
        <p class="draggable" draggable="true">Widget 4</p>
        <p class="draggable" draggable="true">Widget 4</p>
    </div>
</div>




</body>
    <script src="widgets.js"></script>
</html>

