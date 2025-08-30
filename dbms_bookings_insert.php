<?php
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: เพิ่มข้อมูลการจองห้องพัก</title>
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
        <li class="nav-item"><a class="nav-link active" href="dbms_bookings_show.php">การจอง</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_rooms_show.php">ห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_roomtypes_show.php">ประเภทห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_services_show.php">บริการเสริม</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container mt-3">
    <form class="row g-3" name="dbms_bookings_insert" id="dbms_bookings_insert" method="post" action="dbms_exec.php" enctype="multipart/form-data">
        <h2 class="text-center mb-4">เพิ่มข้อมูลการจองห้องพัก</h2>
        <div>
            <select class="form-select" name="room_id" id="room_id">
                <?php
                    $result = $conn->query("SELECT room_id, room_number FROM rooms WHERE status='available'");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['room_id']}'>Room {$row['room_number']}</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label class="form-label">ชื่อสัตว์เลี้ยง</label>
            <input class="form-control" type="text" name="pet_name" id="pet_name" placeholder="ชื่อสัตว์เลี้ยง" required>
        </div>
        <div>
            <label class="form-label">ประเภทสัตว์เลี้ยง</label>
            <input class="form-control" type="text" name="pet_type" id="pet_type" placeholder="ประเภทสัตว์เลี้ยง" required>
        </div>
        <div>
            <label class="form-label">สายพันธุ์สัตว์เลี้ยง</label>
            <input class="form-control" type="text" name="pet_breed" id="pet_breed" placeholder="สายพันธุ์สัตว์เลี้ยง" required>
        </div>
        <div>
            <label class="form-label">อายุสัตว์เลี้ยง</label>
            <input class="form-control" type="number" name="pet_age" id="pet_age" step="any" placeholder="อายุสัตว์เลี้ยง" required>
        </div>
        <div>
            <label class="form-label">น้ำหนักสัตว์เลี้ยง</label>
            <input class="form-control" type="number" name="pet_weight" id="pet_weight" step="any" placeholder="น้ำหนักสัตว์เลี้ยง" required>
        </div>
        <div>
            <label class="form-label">สถานะห้องพัก</label>
            <select class="form-select" name="status" id="status">
                <option>Booked</option>
                <option>Maintenance</option>
            </select>
        </div>
        <div>
            <label class="form-label">วันที่เช็คเข้าพัก</label>
            <input class="form-control" type="date" name="check_in" id="check_in" required>
        </div>
        <div>
            <label class="form-label">วันที่เช็คออก</label>
            <input class="form-control" type="date" name="check_out" id="check_out" required>
        </div>
        <div>
            <label class="form-label">โน๊ตเพิ่มเติม</label>
            <input class="form-control" type="text" name="pet_notes" id="pet_notes" placeholder="โน๊ตเพิ่มเติม">
        </div>
        <div class="col-12 text-center">
            <input type="hidden" name="bookings_chk" id="bookings_chk" value="insert">
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
  </div>
</body>
</html>