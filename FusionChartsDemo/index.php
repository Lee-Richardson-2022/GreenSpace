<!DOCTYPE html>
<html>

<head>
    <title>FusionCharts</title>
    <?php include "charts.php"; ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
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


        $chartArray[] = new chart('chart0','chartLegalCompliance'); // Add new chart
        $chartArray[] = new chart('chart1','chartLegalCompliance');
        $chartArray[] = new chart('chart2','chartLegalCompliance');
    

        //store chart id and chart type as object, store objects in array, loop through array,
        //call drawChart for each object
        //generate chart, display
    ?>

    <div>
        <?php
        for ($i = 0, $size = count($chartArray); $i < $size; $i++) {
            $id = "chart" . $i;
            $container = '<div class="chartContainer" id="' . $id . '"></div>';
            echo "$container";
            $chartArray[$i]->drawChart();
        }        
        ?>
    </div>


</body>
</html>