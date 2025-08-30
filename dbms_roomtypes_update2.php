<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: แก้ไขข้อมูลประเภทห้องพัก</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="dbms.php">จัดการ</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_users_show.php">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_bookings_show.php">Bookings</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_rooms_show.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_roomtypes_show.php">Roomtypes</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_services_show.php">Services</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>

<?php
    include 'conn.php';
    $val = $_GET['val'];
    $sql = "SELECT * FROM roomtypes";
    $sql.= " WHERE md5(type_id) = '".$val."'";
    $result = $conn->query($sql);
    while($result_array    = $result->fetch_assoc()) {
        $type_id           = $result_array['type_id'] ?? '';
        $type_name         = $result_array['type_name'] ?? '';
        $description       = $result_array['description'] ?? '';
        $price_per_night   = $result_array['price_per_night'] ?? '';
    }
?>

  <div class="container mt-3">
    <form class="row g-3" name="dbms_roomtypes_update" id="dbms_roomtypes_update" method="get" action="dbms_exec.php" enctype="multipart/form-data">
        <h2 class="text-center mb-4">แก้ไขข้อมูลประเภทห้องพัก</h2>
        <div>
            <input type="hidden" name="type_id" id="type_id" value="<?php echo $type_id;?>">
            <input class="form-control" type="text" name="type_id_hidden" id="type_id_hidden" value="<?php echo $type_id;?>" disabled>
        </div>
        <div>
            <label class="form-label">ชื่อบริการเสริม</label>
            <input class="form-control" type="text" name="type_name" id="type_name" value="<?php echo $type_name;?>" placeholder="ชื่อประเภทห้องพัก" required>
        </div>
        <div>
            <label class="form-label">คำอธิบายการบริการเสริม</label>
            <input class="form-control" type="text" name="description" id="description" value="<?php echo $description;?>" placeholder="คำอธิบายห้องพัก" required>
        </div>
        <div>
            <label class="form-label">ราคา</label>
            <input class="form-control" type="number" name="price_per_night" id="price_per_night" value="<?php echo $price_per_night;?>" placeholder="price_per_night" required>
        </div>
        <div class="col-12 text-center mt-4">
            <input type="hidden" name="roomtypes_chk" id="roomtypes_chk" value="update">
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
  </div>
</body>
</html>
