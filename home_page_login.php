<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ccss/home_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container d-flex">
        <!-- Logo -->
        <a class="navbar-brand me-auto" href="#">
            <img src="Asset/logo.png" alt="Aiva Care Logo" style="width: 60px;">
        </a>

        <!-- Navbar toggle button (for mobile view) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#About-us">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#documentation">Documentation</a></li>
                <li class="nav-item"><a class="nav-link" href="#Menu">Menu</a></li>
            </ul>
        </div>

        <!-- Login button -->
        <div class="ms-auto">
            
            <a class="nav-link" href="profile.php"> <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M16 9a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-2 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0"/><path d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1M3 12c0 2.09.713 4.014 1.908 5.542A8.99 8.99 0 0 1 12.065 14a8.98 8.98 0 0 1 7.092 3.458A9 9 0 1 0 3 12m9 9a8.96 8.96 0 0 1-5.672-2.012A6.99 6.99 0 0 1 12.065 16a6.99 6.99 0 0 1 5.689 2.92A8.96 8.96 0 0 1 12 21"/></g></svg></a>

        </div>
    </div>
</nav>


<!-- Hero Section -->
<section id = "hero" class="hero bg-light ">
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

<!-- About US Section -->
<section id="About-us" class="about-us bg-light py-4 ">
    <div class="container mt-4 ">
        <div class="card shadow">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">About Us</h1>
            <p class="card-text text-justify">
            Selamat datang di Aiva Care, platform donasi terpercaya yang didedikasikan untuk mendukung sesama dan memberikan dampak positif kepada masyarakat. Kami hadir sebagai jembatan antara para dermawan dengan mereka yang membutuhkan, menciptakan ruang untuk berbagi kepedulian dan harapan.
            </p>
            <p class="card-text text-justify">
            Di Aiva Care, kami percaya bahwa setiap kebaikan, sekecil apa pun, memiliki kekuatan untuk mengubah dunia. Dengan semangat inklusivitas dan transparansi, kami memfasilitasi berbagai kegiatan donasi dan penggalangan dana dalam berbagai kategori, mulai dari bantuan kemanusiaan, pendidikan, kesehatan, hingga pengembangan komunitas.
            </p>
            <p class="card-text text-justify">
            Kami berkomitmen untuk menjaga kepercayaan Anda dengan menghadirkan sistem yang transparan, di mana setiap donasi yang Anda berikan akan disalurkan dengan tepat. Bersama, mari kita ciptakan dunia yang lebih baik dengan berbagi kepedulian melalui Aiva Care.
            </p>
        </div>
        </div>
    </div>
</section>

<section id="documentation" class="mb-5">
<div class="container my-5">
        <!-- Judul di atas Carousel -->
        <div class="carousel-title">
            Bukti kegiatan yang telah dilakukan
        </div>

        <!-- Carousel -->
        <div id="activityCarousel" class="carousel  carousel-dark slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#activityCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#activityCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#activityCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="Asset/bukti1.png" class="d-block w-100" alt="Activity 1">
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="Asset/bukti2.png" class="d-block w-100" alt="Activity 2">
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="Asset/bukti1.png" class="d-block w-100" alt="Activity 2">
                </div>
                
            <!-- Navigation Arrows -->
            <button class="carousel-control-prev" type="button" data-bs-target="#activityCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#activityCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

</section>


<!-- Menu Section-->
<section id="Menu" class="menu-section p-5">
<h1 class="mx-auto text-center mb-4">Menu Utama</h1>
    <div class="container">
        <div class="row text-center">
            <!-- Menu Item 1 -->
            <div class="col-md-4 mb-4">
                <a href="Galang-Dana.php">
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
                <a href="Login-Berdonasi.php">
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
 <section id="footer">
 <div class="container ">
    <div class="footer-content">
      <div class="footer-left">
        <p class="brand-name ds-5">AIVACARE</p>
        <p class="copyright fs-5">© 2024 AIVA - Platform Donasi. Semua hak dilindungi.</p>
      </div>
      <div class="footer-right">
        <p class="fs-5">Social Media</p>
        <div class="social-icons">
          <a href="#" class="social-icon instagram"><i class="fab fa-instagram"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3"/></svg> </i></a>
          <a href="#" class="social-icon twitter"><i class="fab fa-x"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 251 256"><path d="M149.079 108.399L242.33 0h-22.098l-80.97 94.12L74.59 0H0l97.796 142.328L0 256h22.1l85.507-99.395L175.905 256h74.59L149.073 108.399zM118.81 143.58l-9.909-14.172l-78.84-112.773h33.943l63.625 91.011l9.909 14.173l82.705 118.3H186.3l-67.49-96.533z"/></svg></i></a>
          <a href="#" class="social-icon tiktok"><i class="fab fa-tiktok"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M19 10.56a6.57 6.57 0 0 1-3.838-1.229v5.588a5.082 5.082 0 1 1-4.38-5.035v2.81a2.33 2.33 0 1 0 1.63 2.225V4h2.75q-.002.35.06.694A3.82 3.82 0 0 0 16.906 7.2c.621.41 1.35.629 2.094.628z"/></svg></i></a>
        </div>
      </div>
    </div>
  </div>
 </section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>