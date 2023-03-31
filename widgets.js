// Muuri
var grid = new Muuri('.grid', {
  dragEnabled: true,
  dragStartPredicate: function (item, event) {
    if (grid.getItems().indexOf(item) === 0) {
      return false;
    }
    return Muuri.ItemDrag.defaultStartPredicate(item, event);
  }
});


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
}

// On done button pressed
function endEdit() {
  document.getElementById("edit").style.display = "block";
  document.getElementById("editing").style.display = "none";
  document.getElementById("add-widget-sidebar").style.visibility = "hidden";
}