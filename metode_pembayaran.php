<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIVACARE - Platform Donasi</title>
    <link rel="stylesheet" href="ccss/metode_pembayaran.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JQuery/metode_pembayaran.js" defer></script>
    <!-- FontAwesome untuk ikon sosial -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
  <!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid d-flex">
            <!-- Logo -->
            <a class="navbar-brand me-auto" href="home_page_login.php">
                <img src="Asset/logo.png" alt="Aiva Care Logo" style="width: 60px;">
            </a>

            <!-- Navbar toggle button (for mobile view) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar items -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="home_page_login.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="home_page_login.php#About-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php#documentation">Documentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php#Menu">Menu</a></li>
                </ul>
            </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="tab">
            <button class="active" data-tab="bank" onclick="switchTab('bank')">Via Bank</button>
            <button data-tab="ewallet" onclick="switchTab('ewallet')">E-Wallet</button>
        </div>

        <div id="bank" class="content active">
            <h3>Donasi Via Bank</h3>
            <form>
                <div class="form-group">
                    <label for="bank">Pilih Bank</label>
                    <select id="bank" name="bank">
                        <option value="bca">Bank BCA</option>
                        <option value="bri">Bank BRI</option>
                        <option value="mandiri">Bank Mandiri</option>
                        <option value="syariah">Bank Syariah Indonesia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pemilik Rekening</label>
                    <input type="text" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="rekening">Nomor Rekening</label>
                    <input type="text" id="rekening" name="rekening">
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal Donasi</label>
                    <input type="number" id="nominal" name="nominal">
                </div>
                <button type="submit" class="btn">Kirim Donasi</button>
            </form>
        </div>

        <div id="ewallet" class="content">
            <h3>Donasi Via E-Wallet</h3>
            <form>
                <div class="form-group">
                    <label for="ewallet">Pilih E-Wallet</label>
                    <select id="ewallet" name="ewallet">
                        <option value="gopay">Gopay</option>
                        <option value="dana">Dana</option>
                        <option value="ovo">OVO</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ewallet-number">Nomor E-Wallet</label>
                    <input type="text" id="ewallet-number" name="ewallet-number">
                </div>
                <div class="form-group">
                    <label for="ewallet-nominal">Nominal Donasi</label>
                    <input type="number" id="ewallet-nominal" name="ewallet-nominal">
                </div>
                <button type="submit" class="btn">Kirim Donasi</button>
            </form>
        </div>
    </div>

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
          <a href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3"/></svg> </i></a>
          <a href="#" > <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 251 256"><path d="M149.079 108.399L242.33 0h-22.098l-80.97 94.12L74.59 0H0l97.796 142.328L0 256h22.1l85.507-99.395L175.905 256h74.59L149.073 108.399zM118.81 143.58l-9.909-14.172l-78.84-112.773h33.943l63.625 91.011l9.909 14.173l82.705 118.3H186.3l-67.49-96.533z"/></svg></i></a>
          <a href="#" > <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M19 10.56a6.57 6.57 0 0 1-3.838-1.229v5.588a5.082 5.082 0 1 1-4.38-5.035v2.81a2.33 2.33 0 1 0 1.63 2.225V4h2.75q-.002.35.06.694A3.82 3.82 0 0 0 16.906 7.2c.621.41 1.35.629 2.094.628z"/></svg></i></a>
        </div>
      </div>
    </div>
  </div>
 </section>
 <!-- Bootstrap JS (termasuk Popper untuk fungsi dropdown dan toggle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
