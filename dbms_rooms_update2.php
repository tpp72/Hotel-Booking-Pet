<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: แก้ไขข้อมูลห้องพัก</title>
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

<?php
    include 'conn.php';
    $val = $_GET['val'];
    $sql = "SELECT * FROM rooms";
    $sql.= " WHERE md5(room_id) = '".$val."'";
    $result = $conn->query($sql);
    while($result_array = $result->fetch_assoc()) {
        $room_id       = $result_array['room_id'] ?? '';
        $room_number   = $result_array['room_number'] ?? '';
        $type_id       = $result_array['type_id'] ?? '';
        $status        = $result_array['status'] ?? '';
    }
?>

  <div class="container mt-3">
    <form class="row g-3" name="cms_rooms_update" id="cms_rooms_update" method="get" action="dbms_exec.php" enctype="multipart/form-data">
        <h2 class="text-center mb-4">แก้ไขข้อมูลห้องพัก</h2>
        <div>
            <input type="hidden" name="room_id" id="room_id" value="<?php echo $room_id;?>">
            <input class="form-control" type="text" name="room_id_hidden" id="room_id_hidden" value="<?php echo $room_id;?>" disabled>
        </div>
        <div>
            <label class="form-label">หมายเลขห้องพัก</label>
            <input class="form-control" type="number" name="room_number" id="room_number" value="<?php echo $room_number;?>" required>
        </div>
        <div>
            <label class="form-label">ประเภทห้องพัก</label>
            <select class="form-select" name="type_id" id="type_id" required>
              <?php
                  $result = $conn->query("SELECT type_id, type_name FROM roomtypes");
                  while ($row = $result->fetch_assoc()) {
                      $selected = ($row['type_id'] == $type_id) ? "selected" : "";
                      echo "<option value='{$row['type_id']}' $selected>Room {$row['type_name']}</option>";
                  }
              ?>
          </select>
        </div>
        <div>
            <label class="form-label">สถานะห้องพัก</label>
            <select class="form-select" name="status" id="status">
                <option value="Available"   <?php if($status=="available") echo "selected"; ?>>Available</option>
                <option value="Booked"      <?php if($status=="booked") echo "selected"; ?>>Booked</option>
                <option value="Maintenance" <?php if($status=="maintenance") echo "selected"; ?>>Maintenance</option>
            </select>
        </div>
        <div class="col-12 text-center mt-4">
            <input type="hidden" name="rooms_chk" id="rooms_chk" value="update">
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
</div>
</body>
</html>