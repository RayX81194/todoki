<style>
  /* Navigation bar styles */
  nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 2rem 0;
  }

  nav a, nav img {
    width: 40px;
    height: 40px;
  }

  /* Dropdown button styles */
  .dropbtn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    outline: none;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown menu styles */
  .dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  opacity: 0;
  transition: opacity 0.05s ease;
  
}

/* Show dropdown (open state) */
.dropdown-content.show {
  display: block;
  opacity: 1;
}

/* Close animation state */
.dropdown-content.closing {
  opacity: 0;
}
  
  .dropdown-item{
    background-color: #181717;
    min-width: 200px;
    border: 1px solid #2D2D2D;
    border-radius: 7px;
    z-index: 1; 
    padding: 8px 8px;
  }

  .dropdown-item p {
    width: 100%;
    padding: 12px 12px;
    font-size: 16px;
    color: #948888;
    border-color: #948888;
    border-bottom: 1px solid #948888;
  }

  .dropdown-item a {
    width: 100%;
    display: block;
    margin: 3px 0;
    padding: 12px 12px;
    text-decoration: none;
    color: #948888;
    font-size: 14px;
    border-radius: 7px;
    border-color: #948888;
    transition: background-color 0.3s, color 0.3s;
  }

  .dropdown-item a:last-child {
    border-bottom: none;
  }

  .dropdown-item a:hover  {
    background-color: rgb(58, 57, 57);
    color: white;
  }

  .left-nav {
    display: flex;
    align-items: center;
    gap: 2rem;
  }

  input{
    width: 100%;
    padding: 1rem 7rem 1rem 1rem;
    border-radius: 29px;
    background-color: #232020;
    border: none;
    color: white;
    outline: none;
}


</style>
<?php
$name = $_SESSION['name'];
?>

<nav>
    <div class="left-nav">
        <a href="home.php"><img src="assets/logo.svg" alt="Logo"></a>
        <form method="get" action="search.php">
            <input type="text" name="search" placeholder="Search">
        </form>
    </div>
  <div class="dropdown">
    <button onclick="toggleDropdown()" class="dropbtn">
      <img src="assets/acc.svg" alt="User">
    </button>
    <div id="myDropdown" class="dropdown-content">
    <div class="dropdown-item">
      <p>Hey, <?php echo $name; ?></p>
      <a href="logout.php">Logout</a>
    </div>
    </div>
  </div>
</nav>

<script>
let isAnimating = false;

function toggleDropdown() {
  const dropdown = document.getElementById("myDropdown");

  if (dropdown.classList.contains("show")) {
    // Add closing animation
    dropdown.classList.add("closing");
    isAnimating = true;

    // Remove classes after animation completes
    setTimeout(() => {
      dropdown.classList.remove("show", "closing");
      isAnimating = false;
    }, 50); // Match the duration of the CSS transition
  } else if (!isAnimating) {
    dropdown.classList.add("show");
  }
}

window.onclick = function (event) {
  if (!event.target.closest('.dropdown')) {
    const dropdown = document.getElementById("myDropdown");

    if (dropdown.classList.contains("show") && !isAnimating) {
      toggleDropdown();
    }
  }
};

</script>
