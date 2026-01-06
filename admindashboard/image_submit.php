<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $category = $_POST['category'];
    $gallery_name = $_POST['gallery_name'];
    $type = $_POST['type'];

    /* ----------------------------------------------------
        FETCH OLD IMAGES IF EDITING
    ---------------------------------------------------- */
    $old_images = [];
    if ($id != '') {
        $old = $conn->query("SELECT * FROM gallery WHERE id='$id'")->fetch_object();
        if (!empty($old->image_path)) {
            $old_images = explode(",", $old->image_path);
        }
    }

    /* ----------------------------------------------------
        HANDLE FILE UPLOAD (BOTH SINGLE & MULTIPLE)
    ---------------------------------------------------- */
/* ----------------------------------------------------
    HANDLE FILE UPLOAD (BOTH SINGLE & MULTIPLE)
---------------------------------------------------- */
$uploaded_files = [];

if (isset($_FILES['image'])) {

    // MULTIPLE FILES (image[])
    if (is_array($_FILES['image']['name'])) {

        foreach ($_FILES['image']['tmp_name'] as $key => $tmp) {
            if ($tmp != "") {

                // ORIGINAL FILE NAME
                $original_name = basename($_FILES['image']['name'][$key]);

                // FINAL PATH
                $filename = "uploads/" . $original_name;

                move_uploaded_file($tmp, $filename);

                $uploaded_files[] = $filename;
            }
        }

    } 
    // SINGLE FILE (image)
    else {

        if ($_FILES['image']['tmp_name'] != "") {

            // ORIGINAL FILE NAME
            $original_name = basename($_FILES['image']['name']);

            // FINAL PATH
            $filename = "uploads/" . $original_name;

            move_uploaded_file($_FILES['image']['tmp_name'], $filename);

            $uploaded_files[] = $filename;
        }
    }
}

    /* ----------------------------------------------------
        DECIDE FINAL IMAGE LIST
    ---------------------------------------------------- */

    // If editing AND no new images uploaded → keep old images
    if ($id != '' && empty($uploaded_files)) {
        $final_images = implode(",", $old_images);
    } else {
        // If adding OR new images selected → use new images
        $final_images = implode(",", $uploaded_files);
    }

    /* ----------------------------------------------------
        INSERT NEW RECORD
    ---------------------------------------------------- */
    if ($id == '') {

        $sql = "INSERT INTO gallery (category, gallery_name, type, image_path)
                VALUES ('$category', '$gallery_name', '$type', '$final_images')";
        $conn->query($sql);

        header("Location: gallery.php");
        exit();
    }

    /* ----------------------------------------------------
        UPDATE EXISTING RECORD
    ---------------------------------------------------- */
    else {

        $sql = "UPDATE gallery SET 
                    category='$category',
                    gallery_name='$gallery_name',
                    type='$type',
                    image_path='$final_images'
                WHERE id='$id'";
        $conn->query($sql);

        header("Location: gallery.php");
        exit();
    }
}
?>
