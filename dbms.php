<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Hotel :: จัดการโรงแรมฝากสัตว์เลี้ยง</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="dbms.php">ADMIN</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_users_show.php">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_bookings_show.php">Bookings</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_rooms_show.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_roomtypes_show.php">Roomtypes</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_services_show.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="dbms_bookings_services_show.php">Booking Services</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
<header>
    <form method="post" action="">
        <div class="container">
            <h2 class="text-center text-dark">Database Management System</h2>
            <p class="text-center text-dark">ระบบการจัดการฐานข้อมูลเว็บไซต์ </p>
            <select class="form-select mb-3" name="options" id="options">
                <option>ข้อมูลผู้ใช้</option>
                <option>ข้อมูลการจองห้องพัก</option>
                <option>ข้อมูลห้องพัก</option>
                <option>ข้อมูลประเภทห้องพัก</option>
                <option>ข้อมูลบริการ</option>
                <option>ข้อมูลการจองบริการ</option>
            </select>
        <div class="col-12 text-center">
            <input type="hidden" name="chk" id="chk" value="confirm">
            <button type="submit" class="btn btn-success">ยืนยัน</button>
        </div>
        </div>
    </form>
</header>

<?php 
    if (isset($_POST['chk']) && $_POST['chk'] == 'confirm') {
        $search = $_POST['options'] ?? '';
        if ($search == 'ข้อมูลผู้ใช้') {
            header("Location: dbms_users_show.php");
        } elseif ($search == 'ข้อมูลการจองห้องพัก') {
            header("Location: dbms_bookings_show.php");
        } elseif ($search == 'ข้อมูลห้องพัก') {
            header("Location: dbms_rooms_show.php");
        } elseif ($search == 'ข้อมูลประเภทห้องพัก') {
            header("Location: dbms_roomtypes_show.php");
        } elseif ($search == 'ข้อมูลบริการ') {
            header("Location: dbms_services_show.php");
        }elseif ($search == 'ข้อมูลบริการ') {
            header("Location: dbms_bookings_services_show.php");
        }
    }
?>
</body>
</html>