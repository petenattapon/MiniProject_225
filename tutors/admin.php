<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM info WHERE tid = $delete_id");
    $deletestmt->execute();

    $deletestmt2 = $conn->query("DELETE FROM subject WHERE tid = $delete_id");
    $deletestmt2->execute();

    $deletestmt3 = $conn->query("DELETE FROM tutor_mail WHERE tid  = $delete_id");
    $deletestmt3->execute();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        thead th {
            text-align: center;
            justify-content: center;
        }
        tr th{
            text-align: center;
            justify-content: center;
        }
        tr td{
            text-align: center;
            justify-content: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php

        if (isset($_SESSION['admin_login'])) {
            $admin_id = $_SESSION['admin_login'];
            $stmt = $conn->query("SELECT * FROM info WHERE tid = $admin_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>
        <h3 class="mt-4 text-primary d-flex justify-content-center">Admin Page. </h3>
        <h5 class="d-flex justify-content-center">Welcome :  <?php echo $row['tnickname']?></h5>
        <div class="btn-log" style="display: flex; align-items:center; justify-content:center;">
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
        <hr>
    </div>



    <div class="container mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <th>C_ID</th>
                <th>Name</th>
                <th>Nickname</th>
                <th>Phonenumber</th>
                <th>email</th>
                <th>Status</th>
                <th>Verify</th>
                <th>View</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM info");
                $stmt->execute();
                $users = $stmt->fetchAll();

                if (!$users) {
                    echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                } else {
                    foreach ($users as $user) {
                ?>
                        <tr>
                            <th scope="row"><?= $user['tid']; ?></th>
                            <td><?= $user['tfirstname'] . ' ' . $user['tlastname']; ?></td>
                            <td><?= $user['tnickname']; ?></td>
                            <td><?= $user['tphone']; ?></td>
                            <td><a href="https://mail.google.com/"><?= $user['email']; ?></a></td>
                            <td><?= $user['urloe']; ?></td>
                            <td>
                                <?php
                                if ($user['tverify'] == '1') {
                                    echo '<p><a href="verify.php?tid=' . $user['tid'] . 
                                    '&tverify=0" class="btn btn-success btn-sm">Enable</a></p>';
                                } elseif ($user['tverify'] == '0') {
                                    echo '<p><a href="verify.php?tid=' . $user['tid'] . 
                                    '&tverify=1" class="btn btn-secondary btn-sm">Disnable</a></p>';
                                } else{
                                   echo '<p><a href="admin.php?tcardid=' . $user['tid'] . 
                                    '&tverify=2" class="btn btn-warning btn-sm">Admin</a></p>';
                                }

                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $user['tid']; ?>"><i class="fa fa-eye"></i></button>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $user['tid']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $user['tid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Profile Tutors</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>ID Card :</b> <?= $user['tid']; ?></p>
                                        <p><b>Name :</b> <?= $user['tfirstname'] . ' ' . $user['tlastname']; ?></p>
                                        <p><b>Nickname :</b> <?= $user['tnickname'] ?></p>
                                        <p><b>Phone number:</b> <?= $user['tphone'] ?></p>
                                        <p><b>Line id :</b> <?= $user['tlineid'] ?></p>
                                        <p><b>Email :</b> <?= $user['email'] ?></p>
                                        <p><b>Birthday :</b> <?= $user['tbirthday'] ?></p>
                                        <p><b>Address :</b> <?= $user['taddress'] ?></p>
                                        <p><b>Educated :</b> <?= $user['teducation'] ?></p>
                                        <p><b>Planed :</b> <?= $user['tlevel'] ?></p>
                                        <p><b>Status :</b> <?= $user['urloe'] ?></p>
                                        <p><b>Image card id :</b> <img width="80%" src="uploads/<?= $user['tpicid']; ?>" class="rounded" alt=""></p>
                                        <p><b>Image profile tutors :</b> <img width="80%" src="uploads/<?= $user['tpicprofile']; ?>" class="rounded" alt=""></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    </div>
<?php

                    }
                } ?>

</tbody>
</table>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    let imgInput = document.getElementById('imgInput');
    let previewImg = document.getElementById('previewImg');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
            previewImg.src = URL.createObjectURL(file)
        }
    }
</script>
</body>

</html>