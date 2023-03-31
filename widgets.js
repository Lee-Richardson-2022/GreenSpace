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