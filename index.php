<?php
  include 'conn.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: ระบบโรงแรมฝากสัตว์เลี้ยง</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">🐾 Pet Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">หน้าแรก</a></li>
        <li class="nav-item"><a class="nav-link" href="#rooms">ห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="#booking">การจอง</a></li>
        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/jll.fsh_/" target="_blank">ติดต่อเรา</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="dbms.php">จัดการ</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">ออกจากระบบ</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">เข้าสู่ระบบ</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">สมัครสมาชิก</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<header class="text-cener">
  <img src="./img/pet-hotel.jpg" class="img-fluid w-100" alt="Hotel Image" style="hight: 80vh; object-fit: cover;">
  <div class="position-absolute top-50 start-50 translate-middle">
    <h1 class="display-5 fw-bold">ยินดีต้อนรับสู่โรงแรมฝากสัตว์เลี้ยง</h1>
    <p class="lead">บริการห้องพักและดูแลสัตว์เลี้ยงอย่างครบวงจร</p>
    <a href="#booking" class="btn btn-success btn-lg">จองห้องพัก</a>
  </div>
</header>

<!-- Section: Available Rooms -->
<div class="container my-5" id="rooms">
  <h2 class="mb-4">ห้องพักที่พร้อมให้บริการ</h2>
  <div class="row">
    <!-- Room 1 -->
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card h-100">
          <img src="./img/standard.png" class="card-img-top " alt="Standard Room">
          <div class="card-body">
            <h5 class="card-title">ห้อง Standard</h5>
            <p class="card-text">ราคา 500 บาท/วัน</p>
            <a href="#booking" class="btn btn-success">จองเลย</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Room 2 -->
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card h-100">
          <img src="./img/deluxe.png" class="card-img-top h-100" alt="Deluxe Room">
          <div class="card-body">
            <h5 class="card-title">ห้อง Deluxe</h5>
            <p class="card-text">ราคา 800 บาท/วัน</p>
            <a href="#booking" class="btn btn-success">จองเลย</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Room 3 -->
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card h-100">
          <img src="./img/vip.png" class="card-img-top h-100" alt="VIP Room">
          <div class="card-body">
            <h5 class="card-title">ห้อง VIP</h5>
            <p class="card-text">ราคา 1200 บาท/วัน</p>
            <a href="#booking" class="btn btn-success">จองเลย</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Services Section -->
<section id="services" class="bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-4">Our Services</h2>
    <div class="row text-center g-4">
      <div class="col-md-3 col-6"><h5>✂️ อาบน้ำตัดขน</h5><p>฿300</p></div>
      <div class="col-md-3 col-6"><h5>🧑‍🦯 พาสัตว์เลี้ยงเดินเล่น</h5><p>฿150</p></div>
      <div class="col-md-3 col-6"><h5>🏥 ตรวจสุขภาพโดยสัตวแพทย์</h5><p>฿500</p></div>
      <div class="col-md-3 col-6"><h5>🥘 อาหารพิเศษตามสั่ง</h5><p>฿200</p></div>
    </div>
  </div>
</section>

<!-- Booking Form -->
<section id="booking" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Book a Room</h2>
    <form class="row g-3" name="booking" id="booking" method="post" action="hotel_exec.php" enctype="multipart/form-data">
      
      <div class="col-md-6">
        <label class="form-label">ชื่อ</label>
        <input class="form-control" type="text" name="first_name" id="first_name" 
               value="<?php echo isset ($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?>" placeholder="ชื่อจริง" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">นามสกุล</label>
        <input class="form-control" type="text" name="last_name" id="last_name" 
               value="<?php echo isset ($_SESSION['last_name']) ? $_SESSION['last_name'] : ''; ?>" placeholder="นามสกุล" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">อีเมล</label>
        <input class="form-control" type="email" name="email" id="email" 
               value="<?php echo isset ($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" placeholder="อีเมล" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">เบอร์โทร</label>
        <input class="form-control" type="tel" name="phone" id="phone" 
               value="<?php echo isset ($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>" placeholder="เบอร์โทรศัพท์" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">ชื่อสัตว์เลี้ยง</label>
        <input class="form-control" type="text" name="pet_name" id="pet_name" placeholder="ชื่อสัตว์เลี้ยง" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">ประเภทสัตว์เลี้ยง</label>
        <input class="form-control" type="text" name="pet_type" id="pet_type" placeholder="ประเภทสัตว์เลี้ยง" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">สายพันธุ์สัตว์เลี้ยง</label>
        <input class="form-control" type="text" name="pet_breed" id="pet_breed" placeholder="สายพันธุ์สัตว์เลี้ยง" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">อายุสัตว์เลี้ยง</label>
        <input class="form-control" type="number" name="pet_age" id="pet_age" step="any" placeholder="อายุสัตว์เลี้ยง" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">น้ำหนักสัตว์เลี้ยง</label>
        <input class="form-control" type="number" name="pet_weight" id="pet_weight" step="any" placeholder="น้ำหนักสัตว์เลี้ยง" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">โน๊ตสัตว์เลี้ยง</label>
        <input class="form-control" type="text" name="pet_notes" id="pet_notes" placeholder="โน๊ตสัตว์เลี้ยง (เช่นแพ้อาหาร)">
      </div>

      <div class="col-md-6">
        <label class="form-label">Check-in</label>
        <input class="form-control" type="date" name="check_in" id="check_in" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Check-out</label>
        <input class="form-control" type="date" name="check_out" id="check_out" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Room Type</label>
        <select class="form-select" name="room_type" required>
          <option value="Standard">Standard</option>
          <option value="Deluxe">Deluxe</option>
          <option value="VIP">VIP</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Services</label>
        <select multiple class="form-select" name="services[]">
          <?php
            $sql = "SELECT service_id, service_name FROM services";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['service_id']}'>{$row['service_name']}</option>";
                }
            }
          ?>
        </select>
      </div>

      <div class="col-12 text-center">
        <input type="hidden" name="chk" id="chk" value="booking">
        <button type="submit" class="btn btn-success">จองห้องพัก</button>
      </div>

    </form>
  </div>
</section>
</body>

<!-- Footer -->
<footer id="contact" class="bg-dark text-white text-center py-4">
  <div class="container">
    <p class="mb-0">&copy; 2025 🐾 Pet Hotel. All rights reserved.</p>
  </div>
</footer>
</html>
