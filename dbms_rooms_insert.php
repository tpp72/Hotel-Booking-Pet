<?php
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: เพิ่มข้อมูลห้องพัก</title>
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
        <li class="nav-item"><a class="nav-link" href="dbms_users_show.php">ผู้ใช้</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_bookings_show.php">การจอง</a></li>
        <li class="nav-item"><a class="nav-link active" href="dbms_rooms_show.php">ห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_roomtypes_show.php">ประเภทห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_services_show.php">บริการเสริม</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container mt-3">
    <form class="row g-3" name="dbms_rooms_insert" id="dbms_rooms_insert" method="post" action="dbms_exec.php" enctype="multipart/form-data">
        <h2 class="text-center mb-4">เพิ่มข้อมูลห้องพัก</h2>
        <div>
            <label class="form-label">หมายเลขห้องพัก</label>
            <input class="form-control" type="number" name="room_number" id="room_number" placeholder="หมายเลขห้องพัก" required>
        </div>
        <div>
            <label class="form-label">ประเภทห้องพัก</label>
            <select class="form-select" name="type_id" id="type_id">
                <?php
                    $result = $conn->query("SELECT type_id, type_name FROM roomtypes");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['type_id']}'>Room {$row['type_name']}</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label class="form-label">สถานะห้องพัก</label>
            <select class="form-select" name="status" id="status">
                <option>Available</option>
                <option>Booked</option>
                <option>Maintenance</option>
            </select>
        </div>
        <div class="col-12 text-center">
            <input type="hidden" name="rooms_chk" id="rooms_chk" value="insert">
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
  </div>
</body>
</html>