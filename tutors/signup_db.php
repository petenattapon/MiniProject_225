<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $tfirstname = $_POST['tfirstname'];
        $tlastname = $_POST['tlastname'];
        $tnickname = $_POST['tnickname'];
        $tsex = $_POST['tsex'];
        $email = $_POST['email'];
        $tlineid = $_POST['tlineid'];
        $tphone = $_POST['tphone'];
        $tbirthday = $_POST['tbirthday'];
        $tid = $_POST['tid'];

        $tpicid = $_FILES['tpicid'];
        $tpicprofile = $_FILES['tpicprofile'];

        $tpassword = $_POST['tpassword'];
        $c_password = $_POST['c_password'];
        $tsubject = $_POST['tsubject'];
        $taddress = $_POST['taddress'];
        $teducation = $_POST['teducation'];
        $tlevel = $_POST['tlevel'];
        $urloe = 'user';

        $allow = array('jpg', 'png', 'gif','jpeg');
        // แยกชื่อกับนาสกุลไฟล์
        $extension1 = explode(".", $tpicprofile['name']);
        $extension2 = explode(".", $tpicid['name']);
        // แปลงนามสกุลไฟล์เป็นพิมเล็ก
        $fileActExt1 = strtolower(end($extension1));
        $fileActExt2 = strtolower(end($extension2));

        $fileNew1 = $tfirstname . "." . $fileActExt1;
        $fileNew2 = $tid."(verify)" . "." . $fileActExt2;
       
        // เอาไฟล์ไปเก็บไว้ไหน
        $filePath1 = "uploads/" . $fileNew1;
        $filePath2 = "uploads/" . $fileNew2;

       
        if (empty($tfirstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: signup.php");
        } else if (empty($tlastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: signup.php");
        } else if (empty($tnickname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อเล่น';
            header("location: signup.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: signup.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: signup.php");
        } else if (empty($tlineid)) {
            $_SESSION['error'] = 'กรุณากรอก id line';
            header("location: signup.php");
        } else if (empty($tbirthday)) {
            $_SESSION['error'] = 'กรุณาเพิ่มวันเกิดของคุณ';
            header("location: signup.php");
        } else if (empty($tid)) {
            $_SESSION['error'] = 'กรุณากรอกเลขบัตรประชาชน';
            header("location: signup.php");
        } else if (strlen($_POST['tid']) > 14 || strlen($_POST['tid']) < 0) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signup.php");
        } else if (empty($tpicid)) {
            $_SESSION['error'] = 'กรุณาเพิ่มรูปยืนยันตัวตน';
            header("location: signup.php");
        } else if (empty($tpassword)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signup.php");
        } else if (strlen($_POST['tpassword']) > 20 || strlen($_POST['tpassword']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signup.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: signup.php");
        } else if ($tpassword != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: signup.php");
        } else if (empty($taddress)) {
            $_SESSION['error'] = 'กรุณากรอกที่อยู่';
            header("location: signup.php");
        } else if (empty($teducation)) {
            $_SESSION['error'] = 'กรุณากรอกระดับการศึกษา';
            header("location: signup.php");
        } else if (empty($tlevel)) {
            $_SESSION['error'] = 'กรุณากรอกรายละเอียดการสอน';
            header("location: signup.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM info WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: signup.php");
                } else if (!isset($_SESSION['error'])) {
                    if (move_uploaded_file($tpicprofile['tmp_name'], $filePath1) && move_uploaded_file($tpicid['tmp_name'], $filePath2)){
                    $passwordHash = password_hash($tpassword, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO info(tfirstname, tlastname, tnickname,tphone, email, tlineid, tbirthday, tid, tpicprofile,tsex,tpicid, tpassword, tsubject,taddress, teducation, tlevel, urloe) 
                                            VALUES(:tfirstname, :tlastname, :tnickname, :tphone,:email, :tlineid, :tbirthday,  :tid, :tpicprofile,:tsex,:tpicid, :tpassword,:tsubject,:taddress, :teducation, :tlevel, :urloe)");
                    $stmt->bindParam(":tfirstname", $tfirstname);
                    $stmt->bindParam(":tlastname", $tlastname);
                    $stmt->bindParam(":tnickname", $tnickname);
                    $stmt->bindParam(":tphone", $tphone);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":tbirthday", $tbirthday);
                    $stmt->bindParam(":tid", $tid);
                    $stmt->bindParam(":tpicprofile", $fileNew1);
                    $stmt->bindParam(":tsex", $tsex);
                    $stmt->bindParam(":tpicid", $fileNew2);
                    $stmt->bindParam(":tpassword", $passwordHash);
                    $stmt->bindParam(":tlineid", $tlineid);
                    $stmt->bindParam(":tsubject", $tsubject);
                    $stmt->bindParam(":taddress", $taddress);
                    $stmt->bindParam(":teducation", $teducation);
                    $stmt->bindParam(":tlevel", $tlevel);
                    $stmt->bindParam(":urloe", $urloe);
                    $stmt->execute();
                    
                    $stmt2 = $conn->prepare("INSERT INTO tutor_mail(tid,tutor_email,tutor_pass) values(:tid,:email,:tpassword)");
                    $stmt2->bindParam(":tid", $tid);
                    $stmt2->bindParam(":email", $email);
                    $stmt2->bindParam(":tpassword", $passwordHash);
                    $stmt2->execute();
                    
                    $stmt3 = $conn->prepare("INSERT INTO subject(tid,subject_name) values(:tid,:tsubject)");
                    $stmt3->bindParam(":tid", $tid);
                    $stmt3->bindParam(":tsubject", $tsubject);
                    $stmt3->execute();
                    $conn = null;

                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: signup.php");
                    }
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: signup.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
