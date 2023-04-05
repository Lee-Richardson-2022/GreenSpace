<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Performance Dashboard</title>
    
    <link rel="stylesheet" href="site.css">

    <!-- Include fusioncharts core library -->
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <!-- Include fusion theme -->
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <!-- Get jquery, hosted by google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="charts.js"></script>

</head>
<body>

<div class="sidebar" id="add-widget-sidebar">
        <div class="sidebar-title">
            <h2>Add Widgets</h2>
        </div>

        <div class="sidebar-footer">
            <a href="javascript:void(0)" class="button button-primary" onclick="closeNav()">Done</a>
        </div>
    </div> 

<?php require("navbar.php");?>
    
<div class="main-container">
    <div class="dashboard-header">
        <h1>My Performance Dashboard</h1>
        <div style="display: flex; flex-direction: row; padding-bottom: 10px;"">
            <a href="#" class="button button-primary current">My Dashboard</a>
            <a href="#" class="button button-primary">Waterman</a> 
        </div>
        <button class="button-secondary" id="edit" onclick="startEdit()">edit widgets</button>

        <div id="editing">
            <button class="button-secondary" onclick="openNav()">add widgets</button>
            <button class="button-secondary" onclick="endEdit()">done</button>
        </div>
    </div>

    <div class="grid">


    </div> 
</div>



    <script src="https://cdn.jsdelivr.net/npm/muuri@0.9.5/dist/muuri.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>

    <script src="widgets.js" defer></script>

    <script>
        drawCharts();

        function drawCharts(grid) {
        const gridDiv = document.querySelector(".grid");
        while (gridDiv.firstChild){
            gridDiv.removeChild(gridDiv.firstChild);
        }

        if (localStorage.getItem("layout") !== null) {
        const charts = JSON.parse(window.localStorage.getItem('layout'));
        for(let i = 0; i < charts.length; i++){
            console.log(charts[i]);
            switch (charts[i]) {
                case "1":
                    chartLegalComplianceBar('compliance-bar')
                    break;
                case "2":
                    chartLegalCompliancePie('compliance-pie')
                    break;
                case "3":
                    chartDueActions('due-actions')
                    break;
                case "4":              
                    chartOutstandingActions('bulb')
                    break;
                }
                
            }
            
        }
        }

        function DeleteClicked(id) {
        console.log("yay!");
        const charts = JSON.parse(window.localStorage.getItem('layout'));
        
        for(let i = 0; i < charts.length; i++){
            if(charts[i] == id){
                charts.splice(id, 1);
            }
        }

        
        window.localStorage.setItem('layout', JSON.stringify(charts));
        drawCharts();

        }
    </script>

</body>
</html>

