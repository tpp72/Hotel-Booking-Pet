<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CS Hotel :: แสดงข้อมูลการจองห้องพัก</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header>
    <form method="post" action="">
        <div class="container">
            <h2 class="text-center text-dark">จัดการข้อมูลการจองห้องพัก</h2>
            <p class="text-center text-dark">กรุณาเลือกการดำเนินการที่ต้องการ</p>
            <div class="text-center mb-4">
                <a href="dbms_bookings_insert.php" class="btn btn-primary">เพิ่มข้อมูลการจองห้องพัก</a>
                <a href="dbms_bookings_update.php" class="btn btn-secondary">แก้ไขข้อมูลการจองห้องพัก</a>
                <a href="dbms_bookings_delete.php" class="btn btn-danger">ลบข้อมูลการจองห้องพัก</a>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <input class="form-control w-75 text-center" type="text" name="search" id="search" placeholder="ค้นหาข้อมูลการจองห้องพัก">
            </div>
            <div class="col-12 text-center">
                <input type="hidden" name="chk" id="chk" value="ค้นหา">
                <button type="submit" class="btn btn-success mb-4">ค้นหา</button>
            </div>
        </div>
    </form>
</header>

<?php
    include 'conn.php';
    $sql = "SELECT * FROM bookings";

    $search = isset($_POST['search']) ? $_POST['search'] : '';
    if($search <> ''){
        $sql.= " WHERE booking_id LIKE '%".$search."%' OR user_id LIKE '%".$search."%' OR room_id LIKE '%".$search."%' OR check_in LIKE '%".$search."%' OR check_out LIKE '%".$search."%' OR pet_name LIKE '%".$search."%' OR pet_type LIKE '%".$search."%' OR pet_breed LIKE '%".$search."%' OR pet_age LIKE '%".$search."%' OR pet_weight LIKE '%".$search."%'";
    }
    $sql.= " ORDER BY booking_id ASC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table width='95%' border='0' align='center'>";
        echo "<tr bgcolor='green'>";
        echo "<td width='7%'><center>ชื่อสัตว์เลี้ยง</center></td>";
        echo "<td width='4%'><center>ประเภท</center></td>";
        echo "<td width='6%'><center>สายพันธุ์</center></td>";
        echo "<td width='3%'><center>อายุ</center></td>";
        echo "<td width='5%'><center>น้ำหนัก</center></td>";
        echo "<td width='9%'><center>โน๊ตเพิ่มเติม</center></td>";
        echo "<td width='5%'><center>วันที่เช็คอิน</center></td>";
        echo "<td width='5%'><center>วันที่เช็คเอาท์</center></td>";
        echo "<td width='8%'><center>Status</center></td>";
        echo "<td width='5%'><center>แก้ไข</center></td>";
        echo "</tr>";

    while($result_array = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><center>".$result_array['pet_name']."</center></td>";
        echo "<td><center>".$result_array['pet_type']."</center></td>";
        echo "<td><center>".$result_array['pet_breed']."</center></td>";
        echo "<td><center>".$result_array['pet_age']."</center></td>";
        echo "<td><center>".$result_array['pet_weight']."</center></td>";
        echo "<td><center>".$result_array['pet_notes']."</center></td>";
        echo "<td><center>".$result_array['check_in']."</center></td>";
        echo "<td><center>".$result_array['check_out']."</center></td>";
        echo "<td><center>".$result_array['status']."</center></td>";
        echo "<td><center><a href='dbms_bookings_update2.php?val=".md5($result_array['booking_id'])."'target='_self' role='button' class='btn btn-secondary'>แก้ไข</a></center></td>";
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