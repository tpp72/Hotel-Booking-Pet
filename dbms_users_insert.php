<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CS Hotel :: เพิ่มข้อมูลผู้ใช้</title>
  <link rel="icon" type="image/png" href="./img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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