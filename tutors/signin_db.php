<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $tpassword = $_POST['tpassword'];

      
        if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: signin.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: signin.php");
        } else if (empty($tpassword)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signin.php");
        } else if (strlen($_POST['tpassword']) > 20 || strlen($_POST['tpassword']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signin.php");
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM info WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($email == $row['email']) {
                        if (password_verify($tpassword, $row['tpassword'])) {
                            if ($row['urloe'] == 'admin') {
                                $_SESSION['admin_login'] = $row['tid'];
                                header("location: admin.php");
                            } else {
                                $_SESSION['user_login'] = $row['tid'];
                                header("location: userpage.php");
                            }
                        } else {
                            $_SESSION['error'] = 'รหัสผ่านผิด';
                            header("location: signin.php");
                        }
                    } else {
                        $_SESSION['error'] = 'อีเมลผิด';
                        header("location: signin.php");
                    }
                } else {
                    $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                    header("location: signin.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>