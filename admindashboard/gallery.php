<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'config.php'; ?>

<?php
$category = '';
$gallery_name = '';
$type = '';
$image_path = '';
$id = '';
if (isset($_GET['edit_id']) && $_GET['edit_id'] != '') {
    $id = base64_decode($_GET['edit_id']);
    $get = $conn->query("SELECT * FROM gallery WHERE id='$id' LIMIT 1");
    $row = $get->fetch_object();
    $category = $row->category;
    $gallery_name = $row->gallery_name;
    $type = $row->type;
    $image_path = $row->image_path;
}
if (isset($_GET['delete_id']) && $_GET['delete_id'] != '') {
    $id = base64_decode($_GET['delete_id']);
    $get = $conn->query("SELECT image_path FROM gallery WHERE id='$id'");
    $fetch = $get->fetch_object();
    if ($fetch->image_path != '') {
        $imgs = explode(",", $fetch->image_path);
        foreach ($imgs as $img) {
            if (file_exists($img)) {
                unlink($img);
            }
        }
    }
    $conn->query("DELETE FROM gallery WHERE id='$id' LIMIT 1");
    ?>
    <script> window.location.href = "gallery.php"; </script>
    <?php
}
?>
<div style="background-color:white; min-height:150vh; margin-left:250px; padding:40px 0; display:flex; flex-direction:column; align-items:center;">
<div style="background-color:white; padding:40px; width:70%; box-shadow:0 4px 20px rgba(0,0,0,0.15); border-radius:8px; margin-top:40px;">
        <h3 style="margin-bottom:30px; font-weight:600;">
            <?php echo ($id != '' ? "Edit Gallery" : "Add Gallery"); ?>
        </h3>
        <form action="image_submit.php" method="POST" enctype="multipart/form-data" style="width:100%;">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!-- Category -->
            <div style="display:flex; margin-bottom:20px;">
                <label style="width:200px;">Category</label>
                <select name="category" style="width:100%; padding:12px;">
                    <option value="">Select Category</option>
                    <option value="Shopimage" <?php if($category=="Shopimage") echo "selected"; ?>>Shop Image</option>
                    <option value="pasteryimage" <?php if($category=="pasteryimage") echo "selected"; ?>>Pastery Image</option>
                </select>
            </div>
            <div style="display:flex; margin-bottom:20px;">
                <label style="width:200px;">Gallery Name</label>
                <input type="text" name="gallery_name" value="<?php echo $gallery_name; ?>" style="width:100%; padding:12px;">
            </div>
            <div style="display:flex; margin-bottom:20px;">
                <label style="width:160px;">Gallery Type</label>
                <div>
                    <label><input type="radio" name="type" value="single" <?php if($type=="single") echo "checked"; ?> onclick="changeType()"> Single</label>
                    <label><input type="radio" name="type" value="multiple" <?php if($type=="multiple") echo "checked"; ?> onclick="changeType()"> Multiple</label>
                </div>
            </div>

            <!-- Image Upload -->
            <div style="display:flex; margin-bottom:20px;">
                <label style="width:200px;">Upload Image</label>
                <input type="file" id="imageInput" name="image[]" <?php echo ($type=="multiple"?"multiple":""); ?> style="width:100%; padding:10px;">
            </div>

            <!-- Existing Images -->
            <?php if ($id != '') { ?>
                <div style="margin-bottom:20px;">
                    <label style="font-weight:600;">Existing Images</label><br>
                    <?php
                    $imgs = explode(",", $image_path);
                    foreach ($imgs as $img) {
                        echo "<img src='$img' style='width:70px; height:70px; margin:4px; border-radius:6px;'>";
                    }
                    ?>
                </div>
            <?php } ?>
            <button type="submit" style="background:#007bff; color:white; padding:10px 25px; border:none; border-radius:6px;">
                <?php echo ($id != '' ? "Update" : "Submit"); ?>
            </button>
        </form>
    </div><br><br>

<!-- FIXED TABLE WRAPPER -->
<div style="width:90%; overflow-x:auto; background:white; padding:20px; border-radius:8px; box-shadow:0 4px 20px rgba(0,0,0,0.15);">

    <table id="myTable" class="display nowrap" style="width:100%; white-space:nowrap;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Type</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = $conn->query("SELECT * FROM gallery ORDER BY id DESC");
            while ($row = $sql->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['category']."</td>";
                echo "<td>".$row['gallery_name']."</td>";
                echo "<td>".$row['type']."</td>";
                echo "<td>";

$imgs = explode(",", $row['image_path']);

foreach ($imgs as $img) {

    // Extract file name
    $file_name = basename($img);

    echo "
        <div style='margin-bottom:5px;'>
            <span style='font-size:13px;'>$file_name</span>
        </div>
    ";
}

echo "</td>";

                echo "<td>".$row['created_at']."</td>";

                echo "<td>
                        <a href='gallery.php?edit_id=".base64_encode($row['id'])."'>
                            <i class='fa-solid fa-pen-to-square'></i>
                        </a>
                        &nbsp;
                        <a href='gallery.php?delete_id=".base64_encode($row['id'])."' onclick='return confirm(\"Delete?\")'>
                            <i class='fa-solid fa-trash'></i>
                        </a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</div> <!-- END TABLE WRAPPER -->


<script>
function changeType() {
    let type = document.querySelector('input[name="type"]:checked').value;
    let input = document.getElementById('imageInput');
    if (type === "multiple") 
	{
        input.setAttribute("multiple", "multiple");
        input.name = "image[]";
    } 
	else {
        input.removeAttribute("multiple");
        input.name = "image";
    }
}
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(()=> $('#myTable').DataTable());
</script>
