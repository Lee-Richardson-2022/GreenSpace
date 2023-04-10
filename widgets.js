// Muuri
var editMode

initGrid();

function initGrid() {
  var grid = new Muuri('.grid', {
    dragEnabled: true,
    dragStartPredicate: function () {    
      return editMode;
    },
    layoutOnInit: false
  }).on('move', function () {
    saveLayout(grid);
  });

  var layout = window.localStorage.getItem('layout');
  if (layout) {
    loadLayout(grid, layout);
  } else {
    grid.layout(true);
  }


  var charts = JSON.parse(layout);

  for(let i = 0; i < layout.length; i++){
    switch (charts[i]) {
      case "1":
        grid.add(generateContainer('compliance-bar', 1, 'wide'));
        break;
      case "2":
        grid.add(generateContainer('compliance-pie', 2, ''));
        break;
      case "3":
        grid.add(generateContainer('due-actions', 3, ''));
        break;
      case "4":              
        grid.add(generateContainer('outstanding-actions', 4, ''));
        break;
      }
  }



/*
  grid.add(generateContainer('compliance-pie', 2, ''));
  grid.add(generateContainer('due-actions', 3, ''));
  chartLegalCompliancePie();
  chartDueActions();
*/
  saveLayout(grid);
  drawCharts(grid);
}

function serializeLayout(grid) {
  var itemIds = grid.getItems().map(function (item) {
    return item.getElement().getAttribute('data-id');
  });
  return JSON.stringify(itemIds);
}

function saveLayout(grid) {
  var layout = serializeLayout(grid);
  window.localStorage.setItem('layout', layout);
}

function getLayout(asArray) { //Fetches the layout from local storage, in either an array or JSON format
  if (asArray) {
    return JSON.parse(window.localStorage.getItem('layout'));
  }
  return window.localStorage.getItem('layout');
}

function loadLayout(grid, serializedLayout) {
  var layout = JSON.parse(serializedLayout);
  var currentItems = grid.getItems();
  var currentItemIds = currentItems.map(function (item) {
    return item.getElement().getAttribute('data-id')
  });
  var newItems = [];
  var itemId;
  var itemIndex;

  for (var i = 0; i < layout.length; i++) {
    itemId = layout[i];
    itemIndex = currentItemIds.indexOf(itemId);
    if (itemIndex > -1) {
      newItems.push(currentItems[itemIndex])
    }
  }

  grid.sort(newItems, {layout: 'instant'});
}

// Sidebar

// Sidebar Opened
function openNav() {
  document.getElementById("add-widget-sidebar").style.visibility = "visible";
}

// Sidebar Closed
function closeNav() {
  document.getElementById("add-widget-sidebar").style.visibility = "hidden";
}

//On Edit button pressed
function startEdit() {
  document.getElementById("edit").style.display = "none";
  document.getElementById("editing").style.display = "block";
  editMode = true;
}

// On done button pressed
function endEdit() {
  document.getElementById("edit").style.display = "block";
  document.getElementById("editing").style.display = "none";
  document.getElementById("add-widget-sidebar").style.visibility = "hidden";
  editMode = false;
}


//drawCharts();

function drawCharts(grid) {
      
  const charts = JSON.parse(serializeLayout(grid));
  
  for(let i = 0; i < charts.length; i++){
    switch (charts[i]) {
      case "1":
        chartLegalComplianceBar()
        break;
      case "2":
        chartLegalCompliancePie()
        break;
      case "3":
        chartDueActions()
        break;
      case "4":              
        chartOutstandingActions()
        break;
    }
                
  }
            
}
        

function DeleteClicked(dataId) {

  const charts = getLayout(true)
        
  for(let i = 0; i < charts.length; i++){
    if(charts[i] == id){
      charts.splice(id, 1);
    }
  }

        
  window.localStorage.setItem('layout', JSON.stringify(charts));
  drawCharts();

}

