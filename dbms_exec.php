<?php
    include 'conn.php';

#############################################################################################
#                                 CMS USER EXECUTION SCRIPT                                 #
#############################################################################################

    // cms_users_insert.php
    if (isset($_POST['users_chk']) && $_POST['users_chk'] == "insert"){
        $first_name   = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $last_name    = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $email        = isset($_POST['email']) ? $_POST['email'] : '';
        $password     = isset($_POST['password']) ? $_POST['password'] : '';
        $phone        = isset($_POST['phone']) ? $_POST['phone'] : '';

    $sql = "INSERT INTO users(first_name , last_name , email , password , phone)";
    $sql.= " VALUES('$first_name','$last_name','$email','$password','$phone')";

    if($conn->query($sql) === TRUE){
        echo "<br><center>เพิ่มข้อมูลเรียบร้อย</center>";
        echo "<br><center>กรุณารอสักครู่...</center>";
        echo "<meta http-equiv='refresh' content='1;url=dbms_users_show.php'>";
    }else{
        echo "<br><center><h3>เพิ่มข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_users_insert.php'>";
    }

    $conn->close();
    }

    // cms_users_delete.php
    if (isset($_GET['users_chk']) && $_GET['users_chk'] == "delete"){
        $val = $_GET['val'];
        $sql = "DELETE FROM users WHERE md5(user_id)='$val'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>ลบข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_users_delete.php'>";
    }else{
        echo "<br><center><h3>ลบข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_users_delete.php'>";
    }

    $conn->close();
    }

    // cms_users_update.php
    if (isset($_GET['users_chk']) && $_GET['users_chk'] == "update"){
        $user_id    = isset($_GET['user_id']) ? $_GET['user_id'] : '';
        $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : '';
        $last_name  = isset($_GET['last_name']) ? $_GET['last_name'] : '';
        $email      = isset($_GET['email']) ? $_GET['email'] : '';
        $password   = isset($_GET['password']) ? $_GET['password'] : '';
        $phone      = isset($_GET['phone']) ? $_GET['phone'] : '';

        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password', phone = '$phone'";
        $sql.= " WHERE user_id = '$user_id'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>แก้ไขข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_users_update.php'>";
    }else{
        echo "<br><center><h3>เเก้ไขข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_users_update2.php'>";
    }

    $conn->close();
    }

#############################################################################################
#                               CMS BOOKINGS EXECUTION SCRIPT                               #
#############################################################################################

    session_start();
    // cms_bookings_insert.php
    if (isset($_POST['bookings_chk']) && $_POST['bookings_chk'] == "insert"){
        $user_id     = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        $room_id     = isset($_POST['room_id']) ? $_POST['room_id'] : '';
        $pet_name    = isset($_POST['pet_name']) ? $_POST['pet_name'] : '';
        $pet_type    = isset($_POST['pet_type']) ? $_POST['pet_type'] : '';
        $pet_breed   = isset($_POST['pet_breed']) ? $_POST['pet_breed'] : '';
        $pet_age     = isset($_POST['pet_age']) ? $_POST['pet_age'] : '';
        $pet_weight  = isset($_POST['pet_weight']) ? $_POST['pet_weight'] : '';
        $status      = isset($_POST['status']) ? $_POST['status'] : '';
        $check_in    = isset($_POST['check_in']) ? $_POST['check_in'] : '';
        $check_out   = isset($_POST['check_out']) ? $_POST['check_out'] : '';
        $pet_notes   = isset($_POST['pet_notes']) ? $_POST['pet_notes'] : '';

    $sql = "INSERT INTO bookings(user_id , room_id , pet_name , pet_type , pet_breed , pet_age , pet_weight , status , check_in , check_out , pet_notes)";
    $sql.= " VALUES('$user_id','$room_id','$pet_name','$pet_type','$pet_breed','$pet_age','pet_weight','$status','$check_in','$check_out','$pet_notes')";

    if($conn->query($sql) === TRUE){
        echo "<br><center>เพิ่มข้อมูลเรียบร้อย</center>";
        echo "<br><center>กรุณารอสักครู่...</center>";
        echo "<meta http-equiv='refresh' content='1;url=dbms_bookings_show.php'>";
    }else{
        echo "<br><center><h3>เพิ่มข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_bookings_insert.php'>";
    }

    $conn->close();
    }

    // cms_bookings_delete.php
    if (isset($_GET['bookings_chk']) && $_GET['bookings_chk'] == "delete"){
        $val = $_GET['val'];
        $sql = "DELETE FROM bookings WHERE md5(booking_id)='$val'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>ลบข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_bookings_delete.php'>";
    }else{
        echo "<br><center><h3>ลบข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_bookings_delete.php'>";
    }

    $conn->close();
    }

    // cms_bookings_update.php
    if (isset($_GET['bookings_chk']) && $_GET['bookings_chk'] == "update"){
        $booking_id  = isset($_GET['booking_id']) ? $_GET['booking_id'] : '';
        $room_id     = isset($_GET['room_id']) ? $_GET['room_id'] : '';
        $pet_name    = isset($_GET['pet_name']) ? $_GET['pet_name'] : '';
        $pet_type    = isset($_GET['pet_type']) ? $_GET['pet_type'] : '';
        $pet_breed   = isset($_GET['pet_breed']) ? $_GET['pet_breed'] : '';
        $pet_age     = isset($_GET['pet_age']) ? $_GET['pet_age'] : '';
        $pet_weight  = isset($_GET['pet_weight']) ? $_GET['pet_weight'] : '';
        $status      = isset($_GET['status']) ? $_GET['status'] : '';
        $check_in    = isset($_GET['check_in']) ? $_GET['check_in'] : '';
        $check_out   = isset($_GET['check_out']) ? $_GET['check_out'] : '';
        $pet_notes   = isset($_GET['pet_notes']) ? $_GET['pet_notes'] : '';

        $sql = "UPDATE bookings SET room_id = '$room_id', pet_name = '$pet_name', pet_type = '$pet_type', pet_breed = '$pet_breed', pet_age = '$pet_age', pet_weight = '$pet_weight', status = '$status', check_in = '$check_in', check_out = '$check_out', pet_notes = '$pet_notes'";
        $sql.= " WHERE booking_id = '$booking_id'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>แก้ไขข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_bookings_update.php'>";
    }else{
        echo "<br><center><h3>เเก้ไขข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_bookings_update2.php'>";
    }

    $conn->close();
    }

#############################################################################################
#                                 CMS ROOM EXECUTION SCRIPT                                 #
#############################################################################################

    // cms_rooms_insert.php
    if (isset($_POST['rooms_chk']) && $_POST['rooms_chk'] == "insert"){
        $room_number = isset($_POST['room_number']) ? $_POST['room_number'] : '';
        $type_id     = isset($_POST['type_id']) ? $_POST['type_id'] : '';
        $status      = isset($_POST['status']) ? $_POST['status'] : '';

    $sql = "INSERT INTO rooms(room_number , type_id , status)";
    $sql.= " VALUES('$room_number','$type_id','$status')";

    if($conn->query($sql) === TRUE){
        echo "<br><center>เพิ่มข้อมูลเรียบร้อย</center>";
        echo "<br><center>กรุณารอสักครู่...</center>";
        echo "<meta http-equiv='refresh' content='5;url=dbms_rooms_show.php'>";
    }else{
        echo "<br><center><h3>เพิ่มข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_rooms_insert.php'>";
    }

    $conn->close();
    }

    // cms_rooms_delete.php
    if (isset($_GET['rooms_chk']) && $_GET['rooms_chk'] == "delete"){
        $val = $_GET['val'];
        $sql = "DELETE FROM rooms WHERE md5(room_id)='$val'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>ลบข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_rooms_delete.php'>";
    }else{
        echo "<br><center><h3>ลบข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_rooms_delete.php'>";
    }

    $conn->close();
    }

    // cms_rooms_update.php
    if (isset($_GET['rooms_chk']) && $_GET['rooms_chk'] == "update"){
        $room_id     = isset($_GET['room_id']) ? $_GET['room_id'] : '';
        $room_number = isset($_GET['room_number']) ? $_GET['room_number'] : '';
        $type_id     = isset($_GET['type_id']) ? $_GET['type_id'] : '';
        $status      = isset($_GET['status']) ? $_GET['status'] : '';

        $sql = "UPDATE rooms SET room_number = '$room_number', type_id = '$type_id', status = '$status'";
        $sql.= " WHERE room_id = '$room_id'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>แก้ไขข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_rooms_update.php'>";
    }else{
        echo "<br><center><h3>เเก้ไขข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_rooms_update2.php'>";
    }

    $conn->close();
    }

#############################################################################################
#                               CMS ROOMTYPE EXECUTION SCRIPT                               #
#############################################################################################

    // cms_roomtypes_insert.php
    if (isset($_POST['roomtypes_chk']) && $_POST['roomtypes_chk'] == "insert"){
        $type_name       = isset($_POST['type_name']) ? $_POST['type_name'] : '';
        $description     = isset($_POST['description']) ? $_POST['description'] : '';
        $price_per_night = isset($_POST['price_per_night']) ? $_POST['price_per_night'] : '';


    $sql = "INSERT INTO roomtypes(type_name , description , price_per_night)";
    $sql.= " VALUES('$type_name','$description','$price_per_night')";

    if($conn->query($sql) === TRUE){
        echo "<br><center>เพิ่มข้อมูลเรียบร้อย</center>";
        echo "<br><center>กรุณารอสักครู่...</center>";
        echo "<meta http-equiv='refresh' content='1;url=dbms_roomtypes_show.php'>";
    }else{
        echo "<br><center><h3>เพิ่มข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_roomtypes_insert.php'>";
    }

    $conn->close();
    }

    // cms_roomtypes_delete.php
    if (isset($_GET['roomtypes_chk']) && $_GET['roomtypes_chk'] == "delete"){
        $val = $_GET['val'];
        $sql = "DELETE FROM roomtypes WHERE md5(type_id)='$val'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>ลบข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_roomtypes_delete.php'>";
    }else{
        echo "<br><center><h3>ลบข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_roomtypes_delete.php'>";
    }

    $conn->close();
    }

    // cms_roomtypes_update.php
    if (isset($_GET['roomtypes_chk']) && $_GET['roomtypes_chk'] == "update"){
        $type_id         = isset($_GET['type_id']) ? $_GET['type_id'] : '';
        $type_name       = isset($_GET['type_name']) ? $_GET['type_name'] : '';
        $description     = isset($_GET['description']) ? $_GET['description'] : '';
        $price_per_night = isset($_GET['price_per_night']) ? $_GET['price_per_night'] : '';

        $sql = "UPDATE roomtypes SET type_name = '$type_name', description = '$description', price_per_night = '$price_per_night'";
        $sql.= " WHERE type_id = '$type_id'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>แก้ไขข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_roomtypes_update.php'>";
    }else{
        echo "<br><center><h3>เเก้ไขข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_roomtypes_update2.php'>";
    }

    $conn->close();
    }
    
#############################################################################################
#                               CMS SERVICES EXECUTION SCRIPT                               #
#############################################################################################

    // cms_services_insert.php
    if (isset($_POST['services_chk']) && $_POST['services_chk'] == "insert"){
        $service_name   = isset($_POST['service_name']) ? $_POST['service_name'] : '';
        $description    = isset($_POST['description']) ? $_POST['description'] : '';
        $price          = isset($_POST['price']) ? $_POST['price'] : '';


    $sql = "INSERT INTO services(service_name  , price)";
    $sql.= " VALUES('$service_name','$price')";

    if($conn->query($sql) === TRUE){
        echo "<br><center>เพิ่มข้อมูลเรียบร้อย</center>";
        echo "<br><center>กรุณารอสักครู่...</center>";
        echo "<meta http-equiv='refresh' content='1;url=dbms_services_show.php'>";
    }else{
        echo "<br><center><h3>เพิ่มข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_services_insert.php'>";
    }

    $conn->close();
    }

    // cms_services_delete.php
    if (isset($_GET['services_chk']) && $_GET['services_chk'] == "delete"){
        $val = $_GET['val'];
        $sql = "DELETE FROM services WHERE md5(service_id)='$val'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>ลบข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_services_delete.php'>";
    }else{
        echo "<br><center><h3>ลบข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_services_delete.php'>";
    }

    $conn->close();
    }

    // cms_services_update.php
    if (isset($_GET['services_chk']) && $_GET['services_chk'] == "update"){
        $service_id     = isset($_GET['service_id']) ? $_GET['service_id'] : '';
        $service_name   = isset($_GET['service_name']) ? $_GET['service_name'] : '';
        $price          = isset($_GET['price']) ? $_GET['price'] : '';

        $sql = "UPDATE services SET service_name = '$service_name',  price = '$price'";
        $sql.= " WHERE service_id = '$service_id'";

    if($conn->query($sql) === TRUE){
            echo "<br><center>แก้ไขข้อมูลเรียบร้อย;</center>";
            echo "<br><center>กรุณารอสักครู่...</center>";
            echo "<meta http-equiv='refresh' content='1;url=dbms_services_update.php'>";
    }else{
        echo "<br><center><h3>เเก้ไขข้อมูลไม่สำเร็จ</h3></center>";
        echo "<center><h3>กรุณาลองใหม่อีกครั้ง...</h3></center>";
        echo "<meta http-equiv='refresh' content='2;url=dbms_services_update2.php'>";
    }

    $conn->close();
    }

?>