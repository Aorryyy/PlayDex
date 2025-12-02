<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Playdex</title>

  <style>
    /* ==== GLOBAL ==== */
    * { box-sizing: border-box; }
    body {
      background: linear-gradient(to bottom, #000000 0%, #2a2a2a 100%);
      color: #ffffff;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    /* ==== NAVBAR ==== */
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      height: 70px;
      background-color: #000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 28px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.5);
      z-index: 100;
    }

    .navbar .logo {
      color: #fff;
      font-size: 22px;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .nav-right {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .nav-links {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .nav-links li a {
      text-decoration: none;
      background: transparent;
      border: 1px solid #fff;
      border-radius: 999px;
      padding: 7px 16px;
      color: #fff;
      cursor: pointer;
      transition: 0.25s ease;
      font-size: 14px;
      display: inline-block;
    }

    .nav-links li a:hover {
      background: #fff;
      color: #000;
      transform: translateY(-1px);
    }

    .search-bar {
      background-color: #1a1a1a;
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 999px;
      padding: 7px 14px;
      color: #fff;
      outline: none;
      width: 160px;
      transition: 0.25s ease;
    }

    .search-bar:focus {
      width: 220px;
      background-color: #2a2a2a;
      border-color: rgba(0,234,255,0.35);
      box-shadow: 0 0 0 3px rgba(0,234,255,0.15);
    }

    /* ==== LOGIN CARD ==== */
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 22px;
    }

    .login-form {
      margin-top: 80px;
      background: rgba(255,255,255,0.06);
      padding: 34px 30px;
      width: 360px;
      border-radius: 18px;
      backdrop-filter: blur(18px);
      box-shadow: 0 10px 40px rgba(0,0,0,0.6);
      animation: fadeIn 0.5s ease;
      border: 1px solid rgba(255,255,255,0.08);
    }

    .login-form h2 {
      text-align: center;
      margin: 0 0 18px;
      color: #00eaff;
      text-shadow: 0 0 10px #00eaff;
      font-size: 22px;
    }

    .form-group {
      margin-bottom: 14px;
    }

    .form-group label {
      font-size: 13px;
      margin-bottom: 6px;
      display: block;
      opacity: 0.9;
    }

    .form-group input {
      width: 100%;
      padding: 11px 12px;
      border-radius: 10px;
      border: 1px solid rgba(255,255,255,0.08);
      background: #0f0f0f;
      color: #fff;
      outline: none;
      transition: 0.2s ease;
    }

    .form-group input:focus {
      border-color: rgba(0,234,255,0.45);
      box-shadow: 0 0 0 3px rgba(0,234,255,0.12);
    }

    .btn {
      width: 100%;
      padding: 11px;
      background: #00eaff;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      color: #000;
      font-weight: 800;
      margin-top: 6px;
      transition: 0.25s ease;
    }

    .btn:hover {
      box-shadow: 0 0 12px rgba(0,234,255,0.9);
      transform: translateY(-1px);
    }

    .register-link {
      text-align: center;
      margin-top: 14px;
      font-size: 14px;
      opacity: 0.95;
    }

    .register-link a {
      color: #00eaff;
      text-decoration: none;
      font-weight: 700;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    /* ==== MODAL ==== */
    .modal {
      display: none;
      position: fixed;
      inset: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.7);
      backdrop-filter: blur(3px);
      padding: 20px;
      z-index: 999;
    }

    .modal-content {
      background: #141414;
      max-width: 380px;
      width: 100%;
      padding: 22px;
      margin: 90px auto 0;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(0,0,0,0.55);
      animation: fadeIn 0.35s ease;
      border: 1px solid rgba(255,255,255,0.08);
    }

    .modal-content h2 {
      margin: 0 0 14px;
      color: #00eaff;
      text-shadow: 0 0 10px rgba(0,234,255,0.65);
      font-size: 20px;
    }

    .close-modal {
      float: right;
      font-size: 24px;
      cursor: pointer;
      line-height: 1;
      opacity: 0.9;
    }

    .close-modal:hover { color: #00eaff; }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ==== RESPONSIVE ==== */
    @media (max-width: 480px) {
      .navbar { padding: 0 16px; }
      .search-bar { display: none; }
      .login-form { width: 100%; }
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="logo">★ playdex</div>
    <div class="nav-right">
      <ul class="nav-links">
        <li><a href="profil.php">Profil</a></li>
      </ul>
      <input type="text" placeholder="search..." class="search-bar" />
    </div>
  </nav>

  <!-- Login -->
  <section class="login-container">
    <div class="login-form">
      <h2>Masuk ke GameHub</h2>

      <form action="creater.php" method="POST" autocomplete="off">
        <div class="form-group">
          <label for="username">Username</label>
          <input id="username" type="text" name="username" placeholder="Masukkan username" required />
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" placeholder="Masukkan password" required />
        </div>

        <button type="submit" class="btn">Masuk</button>
      </form>

      <div class="register-link">
        <p>Belum punya akun? <a href="#" onclick="showRegister(event)">Daftar di sini</a></p>
      </div>
    </div>
  </section>

  <!-- Modal Register -->
  <div id="registerModal" class="modal" onclick="outsideClose(event)">
    <div class="modal-content">
      <span class="close-modal" onclick="closeRegister()">&times;</span>
      <h2>Daftar Akun Baru</h2>

      <form action="register.php" method="POST" autocomplete="off">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="name" placeholder="Nama kamu" required />
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="email@gmail.com" required />
        </div>

        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" placeholder="Buat username" required />
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" placeholder="Buat password" required />
        </div>

        <button type="submit" class="btn">Daftar</button>
      </form>
    </div>
  </div>

  <script>
    function showRegister(e) {
      if (e) e.preventDefault();
      document.getElementById('registerModal').style.display = 'block';
    }
    function closeRegister() {
      document.getElementById('registerModal').style.display = 'none';
    }
    function outsideClose(e) {
      if (e.target.id === 'registerModal') closeRegister();
    }
  </script>
</body>
</html>