<!DOCTYPE html>
<html>
  <head>
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="waterman.css">
    <script src="Dropdown.js"></script>
  </head>

  <body>
    <div class="navbar">
      <button class="logout">Logout</button>
    </div>

    <div class="image-wrapper">
      <div class='Greenspace-image'>
        <a href="/GreenSpace/HomePage.php" >
          <img border="0" alt="User Icon" src="Assets/greenspace-logo.png" width="150" height="150">
        </a>
        <p>Waterman group</p>
      </div>
      <div class='Construction-image'>
        <a href="/GreenSpace/HomePage.php" >
          <img border="0" alt="User Icon" src="Assets/Construction.jpg" width="150" height="150">
        </a>
      </div>
    </div>
    
    <div class="navbar-2">
      <div class="dropdown-wrapper">
        <div class="dropdown">
          <select id="myDropdown1">
            <option value="option1">Bulletin Board</option>
          </select>
        </div>
        <div class="dropdown">
          <select id="myDropdown2">
            <option value="option1">Improvement Tracker</option>
            <option value="option2">Planner</option>
            <option value="option3">Manage Actions</option>
            <option value="option4">Settings</option>
          </select>
        </div>
        <div class="dropdown">
          <select id="myDropdown3">
            <option value="option1">Performance Dashboard</option>
          </select>
        </div>
        <div class="dropdown">
          <select id="myDropdown3">
            <option value="option1">Docs</option>
            <option value="option2">Admin</option>
          </select>
        </div>
      </div>
    </div>
  </body>
</html>
