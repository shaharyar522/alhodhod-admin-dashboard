<style>
  .profile-dropdown {
    position: absolute;
    right: 0;
    top: 100%;
    background-color: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 6px;
    min-width: 180px;
    z-index: 999;
    padding: 10px;
    display: none;
  }

  .dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px;
    color: #333;
    text-decoration: none;
  }

  .dropdown-item:hover {
    background-color: #f0f0f0;
    border-radius: 4px;
  }

  .dropdown-logout {
    color: red;
  }

  .profile {
    position: relative;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
  }
</style>

<header class="main-header">
  <div class="header-left">
    <h1 class="page-title">Dashboard</h1>
    <div class="breadcrumb">
      <i class="fa-solid fa-kaaba"></i>
      <span>/ Dashboard</span>
    </div>
  </div>

  <div class="header-right">
    <div class="header-search">
      <i class="fa-solid fa-search"></i>
      <input type="text" placeholder="Search dreams..." />
    </div>

    <!-- ✅ Profile Dropdown Section -->

    <div class="profile" id="profileContainer">
      <div class="profile-info" id="profileToggle">
        <span class="welcome">Welcome back,</span>
        <span class="name">{{ Auth::user()->name }}</span>
      </div>
      <img
        src="https://i.pravatar.cc/40?img=12"
        alt="Profile Avatar" class="avatar" width="40" height="40" style="border-radius: 50%; object-fit: cover;"
        data-bs-toggle="modal" data-bs-target="#profileImageModal">



      

      <!-- ✅ DROPDOWN -->
      <div class="profile-dropdown" id="profileDropdown">
        <a href="{{ route('profile.edit') }}" class="dropdown-item" data-bs-toggle="modal"
          data-bs-target="#profileImageModal">
          <i class="fas fa-user"></i>
          <span>My Profile</span>
        </a>

        <a href="#" class="dropdown-item">
          <i class="fas fa-key"></i>
          <span>Reset Password</span>
        </a>

        <!-- ✅ Logout Link -->
        <a href="#" class="dropdown-item dropdown-logout"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>

        <!-- ✅ Hidden Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </div>


  </div>
</header>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("profileToggle");
    const dropdown = document.getElementById("profileDropdown");

    // Toggle dropdown when profile clicked
    toggle.addEventListener("click", function (e) {
      e.stopPropagation();
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function () {
      dropdown.style.display = "none";
    });

    // Prevent closing dropdown when clicking inside it
    dropdown.addEventListener("click", function (e) {
      e.stopPropagation();
    });
  });
</script>