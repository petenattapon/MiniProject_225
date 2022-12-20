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
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c699090782.js" crossorigin="anonymous"></script>
    <title>Home | Find my Tutor</title>
    <link rel = "shortcut icon" href="Find.png">
</head>
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
            <a href="signup.php">For tutor click.</a>
        </div>
    </header>

    <!-- Banner -->
    <section>
        <div class="section-info">
            <b><h1>Do you find tutor 🤷🏻‍♂️</h1></b>
            <p>เว็บไซต์ F.A.TFindATutor.com ได้เปิดรับสมัครติวเตอร์ หรือรับสมัครครูสอนพิเศษ ที่ต้องการมีรายได้เสริมในระหว่างเรียนหรือระหว่างการทำงาน เป็นจำนวนมาก ทางทีมงานหวังเป็นอย่างยิ่งว่า ติวเตอร์ทุกๆ ท่าน จะสอนพิเศษให้กับน้องๆ นักเรียนอย่างสุดความสามรถ มีความเอาใจใส่กับน้องๆ ทุกๆ คน เสมือนว่าเราเป็นพี่เป็นน้องกัน ขอให้มีความรับผิดชอบ มีความตรงต่อเวลา เพราะพวกคุณคือส่วนหนึ่งของสังคมไทย ที่จะช่วยพัฒนาอนาคตของชาติ ให้เติบโตเป็นผู้ใหญ่ที่ดีในวันข้างหน้าอย่างมีประสิทธิภาพ</p>
            <a href="tutor.php">Find a tutor</a>
        </div>
    </section>

    <!-- subject class -->
    <header class="subjectclass">
        <div class="subject">
            <a href="math_tutor.php">📏 Math</a>
        </div>
        <div class="subject">
            <a href="science_tutor.php">🧪 Science</a>
        </div>
        <div class="subject">
            <a href="eng_tutor.php">🎄 English</a>
        </div>
        <div class="subject">
            <a href="thai_tutor.php">🙏🏻 Thai</a>
        </div>
        <div class="subject">
            <a href="social_tutor.php">👨🏿‍🤝‍👨🏽 Social</a>
        </div>
        <div class="subject">
            <a href="art_tutor.php">🎨 Art</a>
        </div>
        <div class="subject">
            <a href="engineer_tutor.php">⚙ Enngineer</a>
        </div>
        <div class="subject">
            <a href="computer_tutor.php">💻 Computer</a>
        </div>
        <div class="subject">
            <a href="onet_tutor.php">📗 O-net</a>
        </div>
        <div class="subject">
            <a href="gatpat_tutor.php">📘 GAT/PAT</a>
        </div>
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