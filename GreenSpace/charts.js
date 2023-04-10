var colourRed = "#ff5d5e"
var colourAmber = "#fac515"
var colourGreen = "#34d399"
var result;

/* Chart list, with locations

Pass the location to generateContainer('location') to make the container for the chart

-Name-                      -Location-
chartLegalComplianceBar(),  compliance-bar
chartLegalCompliancePie(),  compliance-pie
chartDueActions()        ,  due-actions
chartOutstandingActions(),  outstanding-actions

*/

function generateContainer(id, dataId, dimensions) {
    const itemDiv = document.createElement('div');
    itemDiv.classList.add('item');

    const deleteButton = document.createElement('button');
    deleteButton.classList.add('delete-button');
    deleteButton.onclick = function() {DeleteClicked(dataId)};

    if(dimensions !== '') {
        itemDiv.classList.add(dimensions);
    }


    itemDiv.setAttribute('data-id', dataId)

    const contentDiv = document.createElement('div');
    contentDiv.classList.add('item-content');
    contentDiv.id = id;

    itemDiv.appendChild(deleteButton);
    itemDiv.appendChild(contentDiv);
    return itemDiv
}

function renderChart(chartConfig) { //Draws the chart
    FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts(chartConfig);
    fusioncharts.render();
    });
}

function fetchData(query){

    $.ajax({
        type: "POST",
        url: 'fetchData.php',
        async: false,
        data: {query: query},
        dataType: "json",
        success: function(data) {
            result = data;
            return data;
        },
        error: function() {
            alert('Error occured');
        }
    });
    return result
    
}


function chartLegalComplianceBar() { //Configures chartConfig, then sends it to be rendered    
    const data = fetchData('SELECT RedCompliance, AmberCompliance, GreenCompliance FROM LegalRegister WHERE ClientID = 1');
    var chartConfig = {
    type: 'column2d', //Chart type, a list of chart types is listed of fusionchart's website:
    renderAt: 'compliance-bar', //The id of the element where the chart is drawn, hardcode this
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
                        "value": data[0],
                        "color": colourRed  
                    } , {
                        "label": "Possible",
                        "value": data[1],
                        "color": colourAmber
                    } , {
                        "label": "Safe",
                        "value": data[2],
                        "color": colourGreen     
                    }
                ]
            }


    }
    renderChart(chartConfig)
}


function chartLegalCompliancePie() { //Configures chartConfig, then sends it to be rendered
    const data = fetchData('SELECT RedCompliance, AmberCompliance, GreenCompliance FROM LegalRegister WHERE ClientID = 1');
        var chartConfig = {
        type: 'pie2d', //Chart type, a list of chart types is listed of fusionchart's website:
        renderAt: 'compliance-pie', //The id of the element where the chart is drawn
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
                        "enableSlicing": "0",
                        "enableRotation": "0",
                        "theme": "fusion"
                        },

                    "data": [
                        {
                            "label": "Highly Likely",
                            "value": data[0],
                            "color": colourRed  
                        } , {
                            "label": "Possible",
                            "value": data[1],
                            "color": colourAmber
                        } , {
                            "label": "Safe",
                            "value": data[2],
                            "color": colourGreen     
                        }
                    ]
                }


    };
    renderChart(chartConfig)
}


function chartDueActions() { //Configures chartConfig, then sends it to be rendered
    const data = fetchData('SELECT COUNT(*) FROM ClientTask WHERE ClientID = 1 AND Status = "Due"')
        var chartConfig = {
        type: 'angulargauge',
        renderAt: 'due-actions',
        width: '100%',
        height: '100%',
        dataFormat: 'json',
        dataSource: {
                    "chart": {
                        "caption": "Due Actions",
                        "subcaption": "Counted",
                        "lowerLimit": "0",
                        "upperLimit": "20",
                        "showTooltip": "0",
                        "showValue": "1",
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
                        "value": data[0]
                        }]
                    }
                }
            }
    renderChart(chartConfig)

}

function chartOutstandingActions() { //Configures chartConfig, then sends it to be rendered
    const data = fetchData('SELECT COUNT(*) FROM ClientTask WHERE ClientID = 1 AND Status = "Outstanding"');
        var chartConfig = {
        type: 'bulb',
        renderAt: 'outstanding-actions',
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
                        "showToolTip": "0",
                        "showHoverEffect" : "0",
                        "theme": "fusion"
                    },
                    "colorRange": {
                        "color": [{
                        "minValue": "0",
                        "maxValue": "0",
                        "code": colourGreen
                        },{
                        "minValue": "1",
                        "maxValue": "20",
                        "code": colourRed
                        }]
                    },
                    value: data[0]                    
                }
            }
    renderChart(chartConfig)
}
