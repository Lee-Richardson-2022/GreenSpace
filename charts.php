<!-- Include fusioncharts core library -->
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<!-- Include fusion theme -->
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

<?php

    $db = new SQLite3('Data/Greenspace.db');

    function fetchData($query) {
        global $db;
        $statement = $db->prepare($query);
        $result = $statement->execute();

        $data = $result->fetchArray(SQLITE3_NUM);
        return $data;
    }
?>

<script>
    function renderChart(chartConfig) { //Draws the chart
        FusionCharts.ready(function(){
        var fusioncharts = new FusionCharts(chartConfig);
        fusioncharts.render();
        });
    }
</script>


<?php
function chartLegalCompliance($location) { //Configures chartConfig, then sends it to be rendered
    $data = fetchData('SELECT ComplianceRed, ComplianceAmber, ComplianceGreen FROM tblLegalRegister WHERE ClientID = 1');
    ?><script>
        var chartConfig = {
        type: 'column2d', //Chart type, a list of chart types is listed of fusionchart's website:
        renderAt: <?php echo json_encode($location); ?>, //The id of the element where the chart is drawn
        width: '100%',
        height: '100%',
        dataFormat: 'json',
        dataSource: {
                    "chart": {
                        "caption": "Legal Register Compliance",
                        "subCaption": "In Malcompliance Likelyhood",
                        "xAxisName": "Malcompliance Likelyhood",
                        "yAxisName": "Count",
                        "theme": "fusion"
                        },

                    "data": [
                        {
                            "label": "Highly Likely",
                            "value": <?php echo json_encode($data[0]); ?>,
                            "color": "#FF0000"    
                        } , {
                            "label": "Possible",
                            "value": <?php echo json_encode($data[1]); ?>,
                            "color": "#FFBF00" 
                        } , {
                            "label": "Safe",
                            "value": <?php echo json_encode($data[2]); ?>,
                            "color": "#00CC00"      
                        }
                    ]
                }


    };
    renderChart(chartConfig);
    </script><?php

}


function chartOutstandingActions($location) { //Configures chartConfig, then sends it to be rendered
    ?><script>
        var chartConfig = {
        type: 'angulargauge',
        renderAt: <?php echo json_encode($location); ?>,
        width: '100%',
        height: '100%',
        dataFormat: 'json',
        dataSource: {
                    "chart": {
                        "caption": "Outstanding Actions",
                        "subcaption": "Counted",
                        "lowerLimit": "0",
                        "upperLimit": "20",
                        "theme": "fusion"
                    },
                    "colorRange": {
                        "color": [{
                        "minValue": "0",
                        "maxValue": "10",
                        "code": "#e44a00"
                        }, {
                        "minValue": "10",
                        "maxValue": "15",
                        "code": "#f8bd19"
                        }, {
                        "minValue": "15",
                        "maxValue": "20",
                        "code": "#6baa01"
                        }]
                    },
                    "dials": {
                        "dial": [{
                        "value": "13"
                        }]
                    }
                }
            }
    renderChart(chartConfig);
    </script><?php

}
?>