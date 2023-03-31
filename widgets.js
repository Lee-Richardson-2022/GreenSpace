// Muuri
var editMode

var grid = new Muuri('.grid', {
  dragEnabled: true,
  dragStartPredicate: function () {    
    return editMode;
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
  editMode = true;
}

// On done button pressed
function endEdit() {
  document.getElementById("edit").style.display = "block";
  document.getElementById("editing").style.display = "none";
  document.getElementById("add-widget-sidebar").style.visibility = "hidden";
  editMode = false;
}