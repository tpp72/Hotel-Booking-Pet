<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: เข้าสู่ระบบ</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">🐾 Pet Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">หน้าแรก</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#rooms">ห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#booking">การจอง</a></li>
        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/jll.fsh_/" target="_blank">ติดต่อเรา</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="dbms.php">จัดการ</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">ออกจากระบบ</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link active" href="login.php">เข้าสู่ระบบ</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">สมัครสมาชิก</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container mt-3">
    <form class="row g-3" name="login" id="login" method="post" action="hotel_exec.php" enctype="multipart/form-data">
        <h2 class="text-center mb-4">Login</h2>
        <div>
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="username" id="username" placeholder="กรุณากรอกชื่อผู้ใช้" required>
        </div>
        <div>
            <label class="form-label">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="กรุณากรอกรหัสผ่าน" required>
        </div>
        <div class="col-12 text-center">
            <input type="hidden" name="chk" id="chk" value="login">
            <button type="submit" name="submit" id="submit" class="btn btn-success">เข้าสู่ระบบ</button>
        </div>
    </form>
  </div>
</body>
</html>