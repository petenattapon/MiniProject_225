<?php

session_start();
require_once 'config/db.php';

?>
<!DOCTYPE html>
<html lang="UTF-8">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c699090782.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>tutor-register | Find a tutor</title>
    <link rel="shortcut icon" href="Find.png">

<body>

    <!-- Menu bar -->
    <header class="navbar">
        <div class="logo" id="logo">
            <a href="index.php"><img src="img/Find-removebg-preview.png" alt=""></a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="tutor.php">Tutor</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
        <div class="navbar-btn">
            <a href="signin.php">Login</a>
        </div>
    </header>

    <!-- Banner -->
    <section>
        <div class="section-info">
            <b>
                <h1>สมัครเป็นติวเตอร์ ! 🙋</h1>
            </b>
            <p>เรากำลังตามหาติวเตอร์ที่มาร่วมเป็นติวเตอร์ที่มีคุณภาพ และร่วมพัฒนาการศึกษาให้กับนักเรียนไปพร้อมกัน</p>
            <p>เรามาร่วมสร้างอนาคตทางการศึกษาไปด้วยกัน !✌️</p>
            <a href="signup.php">สมัครติวเตอร์</a>
        </div>
    </section>

    <!-- Register -->
    <header class="container">
        <header1>สมัครติวเตอร์</header1>

        <form action="signup_db.php" method="post" enctype="multipart/form-data">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            <!-- form ส่วนบน -->
            <div class="form first">
                <div class="details personal">
                    <span class="title">ข้อมูลส่วนตัว </span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="tfirstname" class="form-label">ชื่อ *</label>
                            <input type="text" name="tfirstname" aria-describedby="tfirstname" placeholder="ชื่อ (ภาษาไทย)" required>
                        </div>
                        <div class="input-field">
                            <label for="tlastname">นามสกุล *</label>
                            <input type="text" name="tlastname" aria-describedby="lastname" placeholder="นามสกุล (ภาษาไทย)" required>
                        </div>
                        <div class="input-field">
                            <label for="tnickname">ชื่อเล่น *</label>
                            <input type="text" name="tnickname" aria-describedby="tnickname" placeholder="ชื่อเล่น (ภาษาไทย)" required>
                        </div>
                        <div class="input-field">
                            <label for="tphone">เบอร์โทรศัพท์ *</label>
                            <input type="text" name="tphone" aria-describedby="tphone" placeholder="เบอร์โทรศัพท์" required>
                        </div>
                        <div class="input-field">
                            <label for="tlineid">Line *</label>
                            <input type="text" name="tlineid" aria-describedby="tlineid" placeholder="ID Line" required>
                        </div>
                        <div class="input-field">
                            <label for="tbirthday">วัน-เดือน-ปีเกิด *</label>
                            <input type="date" name="tbirthday" aria-describedby="tbirthday" placeholder="กรอกวัน-เดือน-ปีเกิด" required>
                        </div>
                        <div class="input-field">
                            <label for="tid">หมายเลขบัตรประจำตัวประชาชน *</label>
                            <input type="text" name="tid" aria-describedby="tid" placeholder="หมายเลขบัตรประจำตัวประชาชน (13หลัก)" required>
                        </div>
                        <div class="input-field">
                            <label for="tpicprofile">รูปภาพโปรไฟล์ *</label>
                            <input type="file" name="tpicprofile" id="imgInput" aria-describedby="tpicprofile" placeholder="รูปภาพบัตรประจำตัวประชาชน" required>
                        </div>
                        <div class="input-field">
                            <label for="tpicid">รูปภาพบัตรประจำตัวประชาชน *</label>
                            <input type="file" name="tpicid" id="imgInput" aria-describedby="tpicid" placeholder="รูปภาพบัตรประจำตัวประชาชน" required>
                        </div>
                    </div>
                    <b>เพศ</b>
                    <input type="radio" value="ชาย" name="tsex"> ชาย
                    <input type="radio" value="หญิง" name="tsex"> หญิง
                    <input type="radio" value="อื่นๆ" name="tsex" checked> อื่นๆ

                    <span class="title-id">ตัวอย่างการเซ็นสำเนาบัตร
                        <img src="img/IDcard2.png" alt=""></span>
                </div>
            </div>

            <!-- form ส่วนล่าง -->
            <div class="form second">
                <div class="details educational">
                    <!-- <span class="title">Password เข้าสู่ระบบ</span> -->

                    <div class="fields">
                        <div class="input-field">
                            <label for="email">Email *</label>
                            <input type="text" name="email" aria-describedby="email" placeholder="Email">
                        </div>
                        <div class="input-field">
                            <label for="tpassword">Password *</label>
                            <input type="password" placeholder="Password" name="tpassword" required>
                        </div>
                        <div class="input-field">
                            <label for="c_password">Confirm Password *</label>
                            <input type="password" placeholder="Confirm Password" name="c_password" required>
                        </div>
                    </div>
                    <div class="details educational">
                        <span class="title">ข้อมูลเพิ่มเติม</span>
                    </div>
                    <div class="subjectsTaught">
                        <span class="title">วิชาที่ต้องการสอน (1 วิชา) *</span>
                        <input type="radio" name="tsubject" id="Math" value="math">
                        <label for="Math">📏 Math</label>

                        <input type="radio" name="tsubject" id="Science" value="sci">
                        <label for="Science">🧪 Science</label>

                        <input type="radio" name="tsubject" id="English" value="eng">
                        <label for="English">🎄 English</label>

                        <input type="radio" name="tsubject" id="Thai" value="th">
                        <label for="Thai">🙏🏻 Thai</label>

                        <input type="radio" name="tsubject" id="Social" value="social">
                        <label for="Social">👨🏿‍🤝‍👨🏽 Social</label>
                    </div><br>
                    <div class="subjectsTaught">
                        <input type="radio" name="tsubject" id="Art" value="art">
                        <label for="Art">🎨 Art</label>

                        <input type="radio" name="tsubject" id="Enngineer" value="enng">
                        <label for="Enngineer">⚙ Enngineer</label>

                        <input type="radio" name="tsubject" id="Computer" value="comp">
                        <label for="Computer">💻 Computer</label>

                        <input type="radio" name="tsubject" id="O-net" value="onet">
                        <label for="O-net">📗 O-net</label>

                        <input type="radio" name="tsubject" id="GAT/PAT" value="g/p">
                        <label for="GAT/PAT">📘 GAT/PAT</label>
                    </div>
                    <div class="details Address">
                        <!-- ส่วนข้อมูลปัจจุบัน -->
                        <span class="title">ข้อมูลที่อยู่ปัจจุบัน</span>
                        <label>ที่อยู่ปัจจุบัน (ที่สามารถติดต่อได้) *</label>
                        <textarea class="form-control" name="taddress" rows="3" cols="50" placeholder="เช่น (126 ถนนประชาอุทิศ แขวง บางมด เขตทุ่งครุ กรุงเทพมหานคร 10140)" required></textarea>

                        <!-- ส่วนประวัติการศึกษา -->
                        <span class="title">ข้อมูลประวัติการศึกษา</span>
                        <label>ประวัติการศึกษา *</label>
                        <textarea class="form-control" name="teducation" rows="3" cols="50" placeholder="เช่น -กำลังศึกษาอยู่คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ชั้นปีที่4
-จบจากคณะวิทยาศาสตร์ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี
-จบจากคณะคุรุศาสตร์ มหาวิทยาลัยเกษตรศาสตร์" required></textarea>

                        <!-- ส่วนเป้าหมายที่จะสอน -->
                        <span class="title">ข้อมูลเป้าหมายระดับที่สอน</span>
                        <label>ระดับชั้นที่สอน *</label>
                        <textarea class="form-control" name="tlevel" rows="3" cols="50" placeholder="-สอนคณิตศาสตร์ ม.3 โรงเรียนบดินทรเดชา
-สอนคณิตศาสตร์ ม.5 โรงเรียนเตรียมอุดมศึกษา
-สอน SAT math ม.5 โรงเรียนเตรียมอุดมศึกษา" required></textarea>
                    </div>

                    <!-- ส่วนปุ่มส่งข้อมูล -->
                    <div class="buttons">
                        <button type="submit" name="signup" class="submite">ส่งข้อมูล</button>
                    </div>
                </div>
            </div>
        </form>
    </header>

    <!-- Footer -->
    <footer class="footbrand">
        <div class="foottext">
            <p>&copy; Copyright for Mini Project .</p>
        </div>
        <div class="footicon">
            <a href="#"><i class="fa-solid fa-envelope"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-github"></i></a>
        </div>
    </footer>
</body>

</html>