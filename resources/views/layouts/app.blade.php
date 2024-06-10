<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{ asset('assets/logo11.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <style>
    /* New styles for the sidebar toggle button */
    .sidebar-toggle {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 1000;
      width: 60px;
      height: 60px;
      background-color: #202020;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    .sidebar-toggle i {
      font-size: 24px;
      color: #fff;
    }

    /* Updated styles for the sidebar */
    .sidebar {
      width: 240px;
      height: 100%;
      background-color: #202020;
      position: fixed;
      top: 0;
      left: -240px;
      overflow-x: hidden;
      transition: left 0.3s ease;
      z-index: 1000;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .sidebar ul li {
      padding: 10px 20px;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .sidebar ul li:hover {
      background-color: #303030;
    }

    /* Updated styles for the main content */
    .main-content {
      margin-top: 60px; /* Adjusted to accommodate the sidebar toggle button */
      padding: 20px;
    }

    /* Adjusted styles for the profile details */
    .profile-details {
      position: absolute;
      top: 20px;
      right: 20px;
    }

    .profile-details .admin_name {
      color: #fff;
      font-weight: bold;
    }

    .sidebar-open .sidebar {
      left: 0;
    }

    /* Updated styles for Game Portal and logo */
    .game-portal {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      padding: 10px;
      background-color: #202020;
      color: #fff;
      font-weight: bold;
    }

    .game-portal img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="sidebar-toggle" onclick="toggleSidebar()">
    <i class="bi bi-list text-white"></i>
  </div>

  <section class="home-section">
  <div class="game-portal">
              ssasa. Game Portal
          <img src="{{ asset('assets/logo12.png') }}" alt="Logo"> <!-- Tambahkan elemen gambar di sini -->
        </div>
        <div class="sidebar-toggle" onclick="toggleSidebar()">
    <i class="bi bi-list text-white"></i>
  </div>
  <div class="sidebar-toggle" onclick="toggleSidebar()">
    <i class="bi bi-list text-white"></i>
  </div>

    <div class="sidebar" id="sidebar">
      <ul class="sidebar-list">
        <li><a href="/home"><i class="bi bi-house-door"></i> Home</a></li>
        <li><a href="/pemain"><i class="bi bi-joystick"></i> Data Pemain</a></li>
        <li><a href="/game"><i class="bi bi-controller"></i> Data Game</a></li>
        <li><a href="/about"><i class="bi bi-info-circle"></i> About</a></li>
        <li><a href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
      </ul>
    </div> 

    <nav>
      <div class="profile-details">
        <span class="admin_name">Pemain</span>
      </div>
    </nav>

    <div class="main-content">
      @yield('content')
    </div>
  </section>

  <!-- JavaScript untuk membuka dan menutup sidebar -->  
  <script>
  function showDetails(nama_game, nama_pemain, tanggal, platform) {
         let ulasan = event.target.getAttribute('data-ulasan');
         alert(`nama_game: ${nama_game}\nnama_pemain: ${nama_pemain}\ntanggal: ${tanggal}\nplatform: ${platform}\nulasan: ${ulasan}`);
      }
      
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var menuIcon = document.getElementById('menuIcon');
        if (sidebar.style.left === '-240px') {
            sidebar.style.left = '0';
        } else {
            sidebar.style.left = '-240px';
        }
    }
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementsByClassName("main-content")[0].style.marginLeft = "250px";
        document.getElementById("menuIcon").style.display = "none";
        document.getElementById("myOverlay").classList.add("show");
    }
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementsByClassName("main-content")[0].style.marginLeft = "0";
        document.getElementById("menuIcon").style.display = "block";
        document.getElementById("myOverlay").classList.remove("show");
    }
  </script>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!-- Data Tables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
  </script>
</body>

</html>
