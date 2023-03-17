<!-- Include fusioncharts core library -->
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<!-- Include fusion theme -->
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

<!-- Chart -->
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
                            "value": "5",
                            "color": "#FF0000"    
                        } , {
                            "label": "Possible",
                            "value": "3",
                            "color": "#FFBF00" 
                        } , {
                            "label": "Safe",
                            "value": "16",
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