<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ccss/home_page.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex">
        <!-- Logo -->
        <a class="navbar-brand me-auto" href="#">
            <img src="Asset/logo.jpg" alt="Aiva Care Logo" style="width: 60px;">
        </a>

        <!-- Navbar toggle button (for mobile view) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            </ul>
        </div>

        <!-- Login button -->
        <div class="ms-auto">
            
            <a class="nav-link" href="login.php"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M12 21v-2h7V5h-7V3h7q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm-2-4l-1.375-1.45l2.55-2.55H3v-2h8.175l-2.55-2.55L10 7l5 5z"/></svg>Login</a>

        </div>
    </div>
</nav>


<!-- Hero Section -->
<section class="hero bg-light py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6">
                <img src="Asset/hero.png" alt="Hero Image" class="img-fluid rounded mb-4">
                <h2 class="display-4 fw-bold">Welcome to Aiva Care</h2>
                <h4 class="lead text-muted">
                Small Acts, Big Impact
                </h4>
            </div>
        </div>
    </div>
</section>


<!-- Menu Section-->
<section class="menu-section py-5">
    <div class="container">
        <div class="row text-center">
            <!-- Menu Item 1 -->
            <div class="col-md-4 mb-4">
                <a href="login.php">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-wrapper bg-danger rounded-circle d-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                        <img src="Asset/galangDonasi.png" alt="Buat Galang Dana" style="width: 50%; filter: invert(100%);">
                    </div>
                    <p class="mt-3 fw-bold">Buat Galang Dana</p>
                </div>
                </a>
            </div>

            <!-- Menu Item 2 -->
            <div class="col-md-4 mb-4">
                <a href="login.php">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-wrapper bg-danger rounded-circle d-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                        <img src="Asset/donasi.png" alt="Berdonasi" style="width: 50%; filter: invert(100%);">
                    </div>
                    <p class="mt-3 fw-bold">Berdonasi</p>
                </div>
                </a>
            </div>

            <!-- Menu Item 3 -->
            <div class="col-md-4 mb-4">
                <a href="login.php">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-wrapper bg-danger rounded-circle d-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                        <img src="Asset/history.png" alt="History" style="width: 50%; filter: invert(100%);">
                    </div>
                    <p class="mt-3 fw-bold">History</p>
                </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- footer Section -->
<footer class="bg-light text-center py-4">
        <p>&copy; 2024 AIVA - Platform Donasi. Semua hak dilindungi.</p>
 </footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>