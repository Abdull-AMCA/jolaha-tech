<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Jolaha Tech - Accounting & Auditing Services</title>
<meta name="description" content="" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="resources/css/style.css" />
<!-- Bootstrap CSS (load first so our style.css can override) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Your custom CSS -->
<link rel="stylesheet" href="resources/css/style.css" />
<script src="resources/js/main.js" defer></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  // Target only submenu toggles
  document.querySelectorAll(".dropdown-submenu > .dropdown-toggle").forEach(function (el) {
    el.addEventListener("click", function (e) {
      e.preventDefault();  // stop link navigation
      e.stopPropagation(); // stop Bootstrap from closing parent

      // close any other open submenus inside the same parent
      let parentMenu = this.closest(".dropdown-menu");
      parentMenu.querySelectorAll(".dropdown-menu.show").forEach(function (submenu) {
        if (submenu !== el.nextElementSibling) {
          submenu.classList.remove("show");
        }
      });

      // toggle the submenu
      let submenu = this.nextElementSibling;
      if (submenu) {
        submenu.classList.toggle("show");
      }
    });
  });

  // Close submenus when main dropdown closes
  document.querySelectorAll(".dropdown").forEach(function (dd) {
    dd.addEventListener("hide.bs.dropdown", function () {
      this.querySelectorAll(".dropdown-menu.show").forEach(function (submenu) {
        submenu.classList.remove("show");
      });
    });
  });
});
</script>

</head>