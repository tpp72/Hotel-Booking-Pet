<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: เพิ่มข้อมูลผู้ใช้</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="dbms.php">จัดการ</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">หน้าแรก</a></li>
        <li class="nav-item"><a class="nav-link active" href="dbms_users_show.php">ผู้ใช้</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_bookings_show.php">การจอง</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_rooms_show.php">ห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_roomtypes_show.php">ประเภทห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_services_show.php">บริการเสริม</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container mt-3">
    <form class="row g-3" name="dbms_users_insert" id="dbms_users_insert" method="post" action="dbms_exec.php" enctype="multipart/form-data">
        <h2 class="text-center mb-4">เพิ่มข้อมูลผู้ใช้</h2>
        <div>
            <label class="form-label">ชื่อจริง</label>
            <input class="form-control" type="text" name="first_name" id="first_name" placeholder="ชื่อจริง" required>
        </div>
        <div>
            <label class="form-label">นามสกุล</label>
            <input class="form-control" type="text" name="last_name" id="last_name" placeholder="นามสกุล" required>
        </div>
        <div>
            <label class="form-label">อีเมล</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="อีเมล" required>
        </div>
        <div>
            <label class="form-label">รหัสผ่าน</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="รหัสผ่าน" required>
        </div>
        <div>
            <label class="form-label">เบอรโทรศัพท์</label>
            <input class="form-control" type="number" name="phone" id="phone" placeholder="เบอรโทรศัพท์" required>
        </div>
        <div class="col-12 text-center">
            <input type="hidden" name="users_chk" id="users_chk" value="insert">
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
  </div>
</body>
</html>