var dropdown = document.getElementById("myDropdown");

dropdown.addEventListener("change", function() {
  var selectedOption = dropdown.value;

  switch (selectedOption) {
    case "option1":
      window.location.href = "page1.php";
      break;
    case "option2":
      window.location.href = "page2.php";
      break;
    case "option3":
      window.location.href = "page3.php";
      break;
    default:
      break;
  }
});