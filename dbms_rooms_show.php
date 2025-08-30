<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: แสดงข้อมูลห้องพัก</title>
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
        <li class="nav-item"><a class="nav-link active" href="dbms_rooms_show.php">ห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_roomtypes_show.php">ประเภทห้องพัก</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_services_show.php">บริการเสริม</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
<header>
    <form method="post" action="">
        <div class="container">
            <h2 class="text-center text-dark">จัดการข้อมูลห้องพัก</h2>
            <p class="text-center text-dark">กรุณาเลือกการดำเนินการที่ต้องการ</p>
            <div class="text-center mb-4">
                <a href="dbms_rooms_insert.php" class="btn btn-primary">เพิ่มข้อมูลห้องพัก</a>
                <a href="dbms_rooms_update.php" class="btn btn-secondary">แก้ไขข้อมูลห้องพัก</a>
                <a href="dbms_rooms_delete.php" class="btn btn-danger">ลบข้อมูลห้องพัก</a>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <input class="form-control w-75 text-center" type="text" name="search" id="search" placeholder="ค้นหาข้อมูลห้องพัก">
            </div>
            <div class="col-12 text-center mb-4">
                <input type="hidden" name="chk" id="chk" value="ค้นหา">
                <button type="submit" class="btn btn-success">ค้นหา</button>
            </div>
        </div>
    </form>
</header>

<?php
    include 'conn.php';
    $sql = "SELECT * FROM rooms";
    $sql.= " INNER JOIN roomtypes ON rooms.type_id = roomtypes.type_id";

    $search = isset($_POST['search']) ? $_POST['search'] : '';
    if($search <> ''){
        $sql.= " WHERE rooms.room_number LIKE '%".$search."%' OR roomtypes.type_name LIKE '%".$search."%' OR rooms.status LIKE '%".$search."%'";
    }
    $sql.= " ORDER BY rooms.room_number ASC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table width='95%' border='0' align='center'>";
        echo "<tr bgcolor='green'>";
        echo "<td width='30%'><center>หมายเลขห้องพัก</center></td>";
        echo "<td width='35%'><center>ประเภทห้องพัก</center></td>";
        echo "<td width='30%'><center>สถานะห้องพัก</center></td>";
        echo "</tr>";

    while($result_array = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><center>".$result_array['room_number']."</center></td>";
        echo "<td><center>".$result_array['type_name']."</center></td>";
        echo "<td><center>".$result_array['status']."</center></td>";
        echo  "</tr>";
    }
        echo "</table>";
    }else{
        echo "<center>ไม่พบข้อมูล</center>";
    }

    $conn->close();
?>
</body>
</html>