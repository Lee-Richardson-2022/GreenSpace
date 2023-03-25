  const draggables = document.querySelectorAll('.draggable')
  const containers = document.querySelectorAll('.container')

draggables.forEach(draggable => {
  draggable.addEventListener('dragstart', () => {
    draggable.classList.add('dragging')
  })

  draggable.addEventListener('dragend', () => {
    draggable.classList.remove('dragging')
  })
})

containers.forEach(container => { 
  container.addEventListener('dragover', e => {
    e.preventDefault()
    const afterElement = getDragAfterElement(container, e.clientY)
    const draggable = document.querySelector('.dragging')
    if (afterElement == null) {
      container.appendChild(draggable)
    } else {
      container.insertBefore(draggable, afterElement)

      // Adds delete button to new widgets after drag
      const delButtons = document
        .getElementById('main')
        .getElementsByClassName("delete-button");

      for (let i = 0; i < delButtons.length; i++) {
        delButtons[i].style.visibility = "visible";
      }


    }
  })
})

function getDragAfterElement(container, y) {
  const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')]

  return draggableElements.reduce((closest, child) => {
    const box = child.getBoundingClientRect()
    const offset = y - box.top - box.height / 2
    if (offset < 0 && offset > closest.offset) {
      return { offset: offset, element: child }
    } else {
      return closest
    }
  }, { offset: Number.NEGATIVE_INFINITY }).element
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


  // Shows delete buttons on dashboard widgets 
  const delButtons = document
  .getElementById('main')
  .getElementsByClassName("delete-button");

  for (let i = 0; i < delButtons.length; i++) {
    delButtons[i].style.visibility = "visible";
  }

  // Sets widgets to draggable once edit mode enabled
  const draggables = document
  .getElementsByClassName("draggable")

  for (let i = 0; i < draggables.length; i++) {
    draggables[i].setAttribute("draggable", "true")
  }

}

// On done button pressed
function endEdit() {
  document.getElementById("edit").style.display = "block";
  document.getElementById("editing").style.display = "none";
  document.getElementById("add-widget-sidebar").style.visibility = "hidden";

  // Hides delete buttons
  const widgets = document
  .getElementById('main')
  .getElementsByClassName("delete-button");

  for (let i = 0; i < widgets.length; i++) {
    widgets[i].style.visibility = "hidden";
  }

  // Sets widgets to static(none draggable)
  const draggables = document
  .getElementsByClassName("draggable")

  for (let i = 0; i < draggables.length; i++) {
    draggables[i].setAttribute("draggable", "false")
  }
  
  
  
}