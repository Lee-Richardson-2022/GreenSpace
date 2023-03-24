<!DOCTYPE html>
<html>

<head>
    <title>FusionCharts</title>
    <?php include "charts.php"; ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php //test
        $chartArray = [];

        class chart {
            public $id;
            public $type;

            function __construct($id, $type) {
                $this->id = $id;
                $this->type = $type;
            }

            function drawChart() {
                $type = $this->type;
                $type($this->id); //Variable function, calls the name stored in the variable as a function
            }

        }


        $jsonFile = file_get_contents('dashboard.json'); //import the user's dashboard
        $storedCharts = json_decode($jsonFile, true); //Store the dashboard in an array

        foreach($storedCharts as $chart) { //For each stored chart
            $chartArray[] = new chart($chart['id'],$chart['type']); //Add it to chartArray as a chart object
        }

        //store chart id and chart type as object, store objects in array, loop through array,
        //call drawChart for each object
        //generate chart, display
    ?>

    <div>
        <?php
        for ($i = 0, $size = count($chartArray); $i < $size; $i++) { //For each chart
            $id = "chart" . $i; //generate the container's number
            $container = '<div class="chartContainer" id="' . $id . '"></div>'; //Generate the containers Id
            echo "$container"; //Prints the container
            $chartArray[$i]->drawChart(); //Puts a chart in the container
        }        
        ?>
    </div>


</body>
</html>