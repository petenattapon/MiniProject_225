<?php
session_start();
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c699090782.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .users {
            text-align: center;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .containers{
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h1>Enngineer Tutors</h1>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $stmt = $conn->query("SELECT * FROM info where urloe = 'user' and tsubject = 'enng'");
            $stmt->execute();
            $users = $stmt->fetchAll();

            if (!$users) {
                echo "<h2 style='color:red;'><td colspan='6' class='text-center'>No tutor for this course.</td></h2>";
            } else {
                foreach ($users as $user) {
            ?>
                    <div class="users col-lg-4">
                        <img class="rounded-circle" src="uploads/<?= $user['tpicprofile']; ?>" width="155" height="150">
                        <h2><?= $user['tfirstname'] . ' ' . $user['tlastname']; ?> </h2>
                        <?php
                                if ($user['tverify'] == '1') {
                                    echo 'ยืนยันตัวตนเรียบร้อย <i class="fa-solid fa-circle-check" style="color: #15F312;"></i>';
                                } else {
                                    echo 'ยังไม่ยืนยันตัวตน <i class="fa-solid fa-circle-xmark" style="color: #E51616;"></i>';
                                }

                                ?>
                        <p><?= $user['teducation'] ?> <br><?= $user['tlevel']; ?></p>
                        <p><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $user['tid']; ?>">Read more.</button></p>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $user['tid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Profile Tutors</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p><b>ชื่อ :</b> <?= $user['tfirstname'] . ' ' . $user['tlastname']; ?></p>
                                    <p><b>ชื่อเล่น :</b> <?= $user['tnickname'] ?></p>
                                    <p><b>เบอร์โทรศัพท์:</b> <?= $user['tphone'] ?></p>
                                    <p><b>Line id :</b> <?= $user['tlineid'] ?></p>
                                    <p><b>Email :</b> <?= $user['email'] ?></p>
                                    <p><b>วันเกิด :</b> <?= $user['tbirthday'] ?></p>
                                    <p><b>ที่อยู๋ :</b> <?= $user['taddress'] ?></p>
                                    <p><b>การศึกษา :</b> <?= $user['teducation'] ?></p>
                                    <p><b>วิชาที่รับสอน :</b> <?= $user['tlevel'] ?></p>
                                    <p><b>สถานะ :</b>
                                        <?php
                                             if ($user['tverify'] == '1') {
                                                echo 'ยืนยันตัวตนเรียบร้อย <i class="fa-solid fa-circle-check" style="color: #15F312;"></i>';
                                            } else {
                                                echo 'ยังไม่ยืนยันตัวตน <i class="fa-solid fa-circle-xmark" style="color: #E51616;"></i>';
                                            }
                                        ?>
                                    </p>
                                    <p><b>รูปภาพโปรไฟล์ :</b> <img width="80%" src="uploads/<?= $user['tpicprofile']; ?>" class="rounded" alt=""></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <hr>

        <div class="containers">
            <tr>
                <td><a href="index.php" class="btn btn-warning">More tutors</a></td>
                <td><a href="tutor.php" class="btn btn-dark">Go Back</a></td>

            </tr>
        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>