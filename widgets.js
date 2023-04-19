// Muuri
var editMode;
var grid;
var widgetsToAdd = [];

initGrid(); //Initialises the grid, and recreates the stored layout

function initGrid() {
  grid = new Muuri('.grid', {
    dragEnabled: true,
    dragStartPredicate: function () {    
      return editMode;
    },
    layoutOnInit: false
  }).on('move', function () {
    saveLayout(grid);
  });

  var layout = getLayout(false);
  
  if (layout) {
    loadLayout(grid, layout);
    var charts = JSON.parse(layout);
    addCharts(charts);
  } else {
    grid.layout(true);
  }



  
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

function drawCharts(grid) { //Refreshes and re-draws the charts into their containers
      
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

        
function addCharts(charts){ //Adds charts to the grid, takes array of charts, represented by data-id

  for(let i = 0; i < charts.length; i++){
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

  saveLayout(grid);
  drawCharts(grid);
}


function DeleteClicked(dataId) { //When an items delete button is clicked, remove the item

  const charts = JSON.parse(serializeLayout(grid));
  
  for(let i = 0; i < charts.length; i++){
    if(charts[i] == dataId){      
      grid.remove(grid.getItems(i), { removeElements: true });
    }
  }
  saveLayout(grid);
  drawCharts(grid);
}

// Sidebar

// Sidebar Opened
function openNav() {
  document.getElementById("add-widget-sidebar").style.visibility = "visible";
}

// Sidebar Closed
function SidebarAddWidgets() {
  document.getElementById("add-widget-sidebar").style.visibility = "hidden";

  addCharts(widgetsToAdd);
  widgetsToAdd = [];

  const delbtns = document.getElementsByClassName("delete-button");
  for (let i = 0; i < delbtns.length; i++) {
    delbtns[i].style.visibility = "visible";
  }

  const sidebarwidgets = document.getElementsByClassName("sidebar-widget");
  for (let i = 0; i < sidebarwidgets.length; i++) {
    sidebarwidgets[i].classList.remove("selected");
  }
}

function SelectToggle(id) {

  const widget = document.getElementById(id);
  if (widget.classList.contains("selected")) {
    widget.classList.remove("selected");
    for( var i = 0; i < widgetsToAdd.length; i++) { 
      if ( widgetsToAdd[i] === String(id)) { 
        widgetsToAdd.splice(i, 1);
      }
    }
  }
  else {
    widget.classList.add("selected");
    widgetsToAdd.push(String(id))
  }

  console.log(widgetsToAdd);
}

//On Edit button pressed
function startEdit() {
  document.getElementById("edit").style.display = "none";
  document.getElementById("editing").style.display = "block";
  editMode = true;

  const delbtns = document.getElementsByClassName("delete-button");
  for (let i = 0; i < delbtns.length; i++) {
    delbtns[i].style.visibility = "visible";
  }
}

// On done button pressed
function endEdit() {
  document.getElementById("edit").style.display = "block";
  document.getElementById("editing").style.display = "none";
  document.getElementById("add-widget-sidebar").style.visibility = "hidden";
  editMode = false;

  const delbtns = document.getElementsByClassName("delete-button");
  for (let i = 0; i < delbtns.length; i++) {
    delbtns[i].style.visibility = "hidden";
  }
}
