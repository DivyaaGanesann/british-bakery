<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type  = trim($_POST['type']);
    $name  = trim($_POST['name']);
    $price = trim($_POST['price']);
    $sno   = isset($_POST['sno'])?trim($_POST['sno']) : '';
    if (empty($name)||empty($type)||empty($price)) {
        header("Location: menudashboard.php?msg=empty");
        exit();
    }
    $photo_name = "";
    if (!empty($_FILES["photo"]["name"])) {
        $target_dir = "uploads/";
        $original   = basename($_FILES["photo"]["name"]);
        $photo_name = preg_replace("/\s+/", "_", $original);
        $target_file = $target_dir.$photo_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check === false) {
            header("Location: menudashboard.php?msg=notimage");
            exit();
        }
        if ($_FILES["photo"]["size"]>1000000) {
            header("Location: menudashboard.php?msg=large");
            exit();
        }
        $valid_ext = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $valid_ext)) {
            header("Location: menudashboard.php?msg=typeerror");
            exit();
        }
        if(file_exists($target_file)){
            $photo_name = time() . "_" . $photo_name;
            $target_file = $target_dir . $photo_name;
        }
        if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            header("Location: menudashboard.php?msg=uploadfail");
            exit();
        }
    }
    if ($sno == '') { 
        if (!empty($photo_name)) {
            $sql = "INSERT INTO menu (categories, categories_name, price, photo)
VALUES ('$type', '$name', '$price', '$photo_name')";
        } else {
            $sql = "INSERT INTO menu (categories, categories_name, price)
VALUES ('$type', '$name', '$price')";
        }
    } else {
        if (!empty($photo_name)) {
            $sql = "UPDATE menu 
                    SET categories='$type', categories_name='$name', price='$price', photo='$photo_name'
                    WHERE sno='$sno'";
        } else {
            $sql = "UPDATE menu 
                    SET categories='$type', categories_name='$name', price='$price'
                    WHERE sno='$sno'";
        }
    }
    if ($conn->query($sql) === TRUE) {
        header("Location: menudashboard.php?msg=success");
        exit();
    } else {
        header("Location: menudashboard.php?msg=error");
        exit();
    }
}
?>
