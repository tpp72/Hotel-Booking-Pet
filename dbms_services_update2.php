<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: แก้ไขข้อมูลบริการเสริม</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <li class="nav-item"><a class="nav-link" href="dbms_rooms_show.php">ห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_roomtypes_show.php">ประเภทห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link active" href="dbms_services_show.php">บริการเสริม</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>

<?php
    include 'conn.php';
    $val = $_GET['val'];
    $sql = "SELECT * FROM services";
    $sql.= " WHERE md5(service_id) = '".$val."'";
    $result = $conn->query($sql);
    while($result_array    = $result->fetch_assoc()) {
        $service_id        = $result_array['service_id'] ?? '';
        $service_name      = $result_array['service_name'] ?? '';
        $price             = $result_array['price'] ?? '';
    }
?>

  <div class="container mt-3">
    <form class="row g-3" name="cms_services_update" id="cms_services_update" method="get" action="dbms_exec.php" enctype="multipart/form-data">
        <h2 class="text-center mb-4">แก้ไขข้อมูลบริการเสริม</h2>
        <div>
            <input type="hidden" name="service_id" id="services_id" value="<?php echo $service_id;?>">
            <input class="form-control" type="text" name="service_id_hidden" id="service_id_hidden" value="<?php echo $service_id;?>" disabled>
        </div>
        <div>
            <label class="form-label">ชื่อบริการเสริม</label>
            <input class="form-control" type="text" name="service_name" id="service_name" value="<?php echo $service_name;?>" placeholder="ชื่อบริการเสริม" required>
        </div>
        <div>
            <label class="form-label">ราคา</label>
            <input class="form-control" type="number" name="price" id="price" value="<?php echo $price;?>" placeholder="ราคา" required>
        </div>
        <div class="col-12 text-center mt-4">
            <input type="hidden" name="services_chk" id="services_chk" value="update">
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
  </div>
</body>
</html>
