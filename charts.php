<!-- Include fusioncharts core library -->
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<!-- Include fusion theme -->
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

<script>
var colourRed = "#ff5d5e"
var colourAmber = "#fac515"
var colourGreen = "#34d399"
</script>

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
function chartLegalComplianceBar($location) { //Configures chartConfig, then sends it to be rendered
    $data = fetchData('SELECT RedCompliance, AmberCompliance, GreenCompliance FROM LegalRegister WHERE ClientID = 1');
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
                            "color": colourRed  
                        } , {
                            "label": "Possible",
                            "value": <?php echo json_encode($data[1]); ?>,
                            "color": colourAmber
                        } , {
                            "label": "Safe",
                            "value": <?php echo json_encode($data[2]); ?>,
                            "color": colourGreen     
                        }
                    ]
                }


    };
    renderChart(chartConfig);
    </script><?php

}


function chartLegalCompliancePie($location) { //Configures chartConfig, then sends it to be rendered
    $data = fetchData('SELECT RedCompliance, AmberCompliance, GreenCompliance FROM LegalRegister WHERE ClientID = 1');
    ?><script>
        var chartConfig = {
        type: 'pie2d', //Chart type, a list of chart types is listed of fusionchart's website:
        renderAt: <?php echo json_encode($location); ?>, //The id of the element where the chart is drawn
        width: '100%',
        height: '100%',
        dataFormat: 'json',
        dataSource: {
                    "chart": {
                        "caption": "Legal Register Compliance",
                        "subCaption": "Distribution Of Malcompliance Likelyhood",
                        "showlegend": "0",
                        "showpercentvalues": "0",
                        "startingAngle": "90",
                        "enableSmartLabels": "0",
                        "showLabels": "0",
                        "showValues": "0",
                        "theme": "fusion"
                        },

                    "data": [
                        {
                            "label": "Highly Likely",
                            "value": <?php echo json_encode($data[0]); ?>,
                            "color": colourRed  
                        } , {
                            "label": "Possible",
                            "value": <?php echo json_encode($data[1]); ?>,
                            "color": colourAmber
                        } , {
                            "label": "Safe",
                            "value": <?php echo json_encode($data[2]); ?>,
                            "color": colourGreen     
                        }
                    ]
                }


    };
    renderChart(chartConfig);
    </script><?php

}


function chartDueActions($location) { //Configures chartConfig, then sends it to be rendered
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
                        "code": colourGreen
                        }, {
                        "minValue": "10",
                        "maxValue": "15",
                        "code": colourAmber
                        }, {
                        "minValue": "15",
                        "maxValue": "20",
                        "code": colourRed
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

function chartOutstandingActions($location) { //Configures chartConfig, then sends it to be rendered
    ?><script>
        var chartConfig = {
        type: 'bulb',
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
                        "placevaluesinside": "1",
                        "valuefontsize": "20",
                        "valueFontColor": "#FFFFFF",
                        "theme": "fusion"
                    },
                    "colorRange": {
                        "color": [{
                        "minValue": "0",
                        "maxValue": "0",
                        "code": colourGreen
                        }, {
                        "minValue": "1",
                        "maxValue": "1",
                        "code": colourAmber
                        }, {
                        "minValue": "1",
                        "maxValue": "20",
                        "code": colourRed
                        }]
                    },
                    value: "0"
                }
            }
    renderChart(chartConfig);
    </script><?php

}
?>