<?php

session_start();

require_once "config/db.php";

if (isset($_POST['update'])) {
    $tid = $_POST['tid'];
    $tfirstname = $_POST['tfirstname'];
    $tlastname = $_POST['tlastname'];
    $tnickname = $_POST['tnickname'];
    $tphone = $_POST['tphone'];
    $tbirthday = $_POST['tbirthday'];
    $tlineid = $_POST['tlineid'];
    $taddress = $_POST['taddress'];
    $teducation = $_POST['teducation'];
    $tlevel = $_POST['tlevel'];
    $img = $_FILES['img'];
    $img2 = $_POST['img2'];
    $upload = $_FILES['img']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'uploads/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                move_uploaded_file($img['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $img2;
    }
    $sql = $conn->prepare("UPDATE info SET tfirstname = :tfirstname, tlastname = :tlastname, tnickname = :tnickname, tphone = :tphone, 
    tbirthday = :tbirthday, tlineid = :tlineid, taddress = :taddress, teducation = :teducation, tlevel = :tlevel, tpicprofile = :tpicprofile WHERE tid = :tid");
    $sql->bindParam(":tid", $tid);
    $sql->bindParam(":tfirstname", $tfirstname);
    $sql->bindParam(":tlastname", $tlastname);
    $sql->bindParam(":tnickname", $tnickname);
    $sql->bindParam(":tbirthday", $tbirthday);
    $sql->bindParam(":tphone", $tphone);
    $sql->bindParam(":tlineid", $tlineid);
    $sql->bindParam(":taddress", $taddress);
    $sql->bindParam(":teducation", $teducation);
    $sql->bindParam(":tlevel", $tlevel);
    $sql->bindParam(":tpicprofile", $fileNew);
    $sql->execute();

    // if ($sql) {
    //     $_SESSION['success'] = "Data has been updated successfully";
    //     header("location: userpage.php");
    // } else {
    //     $_SESSION['error'] = "Data has not been updated successfully";
    //     header("location: userpage.php");
    // }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Edit Profile</h1>
        <hr>
        <form action="editTutor.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $stmt = $conn->query("SELECT * FROM info WHERE tid = $id");
                $stmt->execute();
                $data = $stmt->fetch();
            }
            ?>
            <div class="row g-3">
                <div class="col-sm-11">
                    <label for="tid" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $data['tid']; ?>" required class="form-control" name="tid">
                </div>
                <div class="col-sm-1">
                    <label for="urloe" class="col-form-label">Status :</label>
                    <input type="text" readonly value="<?php echo $data['urloe']; ?>" required class="form-control" name="urloe">
                </div>
                <div class="col-sm-12">
                    <label for="email" class="col-form-label">Email :</label>
                    <input type="text" readonly value="<?php echo $data['email']; ?>" required class="form-control" name="email">
                </div>

                <div class="col-sm-6">
                    <label for="firstname" class="col-form-label">First Name:</label>
                    <input type="text" value="<?php echo $data['tfirstname']; ?>" required class="form-control" name="tfirstname">
                </div>
                <div class="col-sm-6">
                    <label for="tlastname" class="col-form-label">Last name:</label>
                    <input type="text" value="<?php echo $data['tlastname']; ?>" required class="form-control" name="tlastname">

                </div>
                <div class="col-sm-3">
                    <label for="tnickname" class="col-form-label">Nickname:</label>
                    <input type="text" value="<?php echo $data['tnickname']; ?>" required class="form-control" name="tnickname">

                </div>
                <div class="col-sm-3">
                    <label for="tphone" class="col-form-label">Phone numnber:</label>
                    <input type="text" value="<?php echo $data['tphone']; ?>" required class="form-control" name="tphone">

                </div>
                <div class="col-sm-3">
                    <label for="tbirthday" class="col-form-label">Birthday:</label>
                    <input type="date" value="<?php echo $data['tbirthday']; ?>" required class="form-control" name="tbirthday">

                </div>
                <div class="col-sm-3">
                    <label for="tlineid" class="col-form-label">Line id:</label>
                    <input type="text" value="<?php echo $data['tlineid']; ?>" required class="form-control" name="tlineid">

                </div>
                <div class="col-sm-12">
                    <label for="taddress" class="col-form-label">Address:</label>
                    <input type="text" value="<?php echo $data['taddress']; ?>" required class="form-control" name="taddress">

                </div>
                <div class="col-sm-12">
                    <label for="teducation" class="col-form-label">Education :</label>
                    <input type="text" value="<?php echo $data['teducation']; ?>" required class="form-control" name="teducation">

                </div>
                <div class="col-sm-12">
                    <label for="tlevel" class="col-form-label">Planned:</label>
                    <input type="text" value="<?php echo $data['tlevel']; ?>" required class="form-control" name="tlevel">

                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">Image:</label>
                    <input type="file" class="form-control" id="imgInput" name="img">
                    <img class="mt-2"width="350px"  src="uploads/<?php echo $data['tpicprofile']; ?>" id="previewImg" alt="">
                </div>
            </div>
            <hr>
            <a href="userpage.php" class="btn btn-dark">Go Back</a>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>

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