<header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="">
        <a href="Homepage.php" class="navbar-brand"><img src="img/sph logo.png" alt="logo" width="50" height="50" /> SWEET
          PETS HAVEN
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuItems"
        aria-controls="menuItems" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuItems">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="Homepage.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Our Animals
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="animals.php">Pet Gallery</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="Announcements.php" class="nav-link">Announcements</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Support Us
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="donate.php">Donate</a></li>
              <li><a class="dropdown-item" href="volunteer.php">Volunteer</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              About
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="AboutUs.php">About Us</a></li>
              <li><a class="dropdown-item" href="ContactUs.php">Contact Us</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown <?php echo isset($_SESSION['user']) ? '' : 'd-none' ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="myforms.php">My Forms</a></li>  
            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
            <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown <?php echo isset($_SESSION['admin']) ? '' : 'd-none' ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Manage
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="animals_admin.php">Animals</a></li>  
            <li><a class="dropdown-item" href="Announcements_admin.php">Announcements</a></li>
            <li><a class="dropdown-item" href="admin_manage_volunteer.php">Volunteers</a></li>
            <li><a class="dropdown-item" href="manage-adoption-appointment.php">Adoption</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <a class="text-decoration-none <?php echo isset($_SESSION['user']) ? 'd-none' : '' ?>" href='Signup.php'><button>Sign Up</button></a>
      <a class="text-decoration-none <?php echo isset($_SESSION['user']) ? 'd-none' : '' ?>" href='Login.php'><button>Log In</button></a>
      <a class="text-decoration-none <?php echo isset($_SESSION['user']) ? '' : 'd-none' ?>" href='Logout.php'><button>Log Out</button></a>
    </nav>
  </header>