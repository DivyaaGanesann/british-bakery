<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<?php 
include 'header.php'; 
include 'navbar.php'; 
include 'config.php'; 
$cat_name = '';
$type = '';
$price = '';
$sno = '';
if(isset($_GET['edit_id']) && $_GET['edit_id'] != ''){
    $id = base64_decode($_GET['edit_id']);
    $get_menu = $conn->query("SELECT * FROM menu WHERE sno='$id' LIMIT 1");
    if($get_menu && $get_menu->num_rows > 0){
        $fetch_menu = $get_menu->fetch_object();
        $cat_name = $fetch_menu->categories_name;
        $type = $fetch_menu->categories;
        $price = $fetch_menu->price;
        $sno = $fetch_menu->sno;
    }
}
if(isset($_GET['delete_id']) && $_GET['delete_id'] != ''){
    $id = base64_decode($_GET['delete_id']);
    $imgQry = $conn->query("SELECT photo FROM menu WHERE sno='$id'");
    $oldImg = $imgQry->fetch_assoc()['photo'];
    if($oldImg != "" && file_exists("uploads/".$oldImg)) unlink("uploads/".$oldImg);
    $conn->query("DELETE FROM menu WHERE sno='$id' LIMIT 1");
    echo "<script>window.location.href='menudashboard.php';</script>";
    exit();
}
?>

<div style="background-color: #f4f4f4; min-height: 150vh; padding: 40px; margin-left:250px;">

    <div style="background-color: white; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); width: 40%; margin: auto; text-align: center; min-height: 250px;">
        <?php if(isset($_GET['msg'])): ?>
            <?php if($_GET['msg']=='success'): ?><p style="color:green;">Menu item added/updated successfully!</p>
            <?php elseif($_GET['msg']=='error'): ?><p style="color:red;">Database error!</p>
            <?php elseif($_GET['msg']=='empty'): ?><p style="color:orange;">Please enter all required values.</p>
            <?php endif; ?>
            <script>
                if(window.history.replaceState){ 
				const url=new URL(window.location); 
				url.searchParams.delete('msg');
				window.history.replaceState({}, 
				document.title, url.pathname);
				}
            </script>
        <?php endif; ?>

        <form style="display:flex; flex-direction:column; gap:15px; align-items:center;" action="menu_submit.php" method="POST" enctype="multipart/form-data">

            <label>Categories:</label>
<select name="type" style="padding:8px; width:60%; border:1px solid #ccc; border-radius:6px;" required>
    <option value="">Select</option>
    <?php
        $cat_sql = "SELECT * FROM category ORDER BY name ASC";
        $cat_result = $conn->query($cat_sql);
        while($cat_row = $cat_result->fetch_assoc()) {
            $selected = ($type == $cat_row['name']) ? 'selected' : '';
            echo "<option value='".$cat_row['name']."' $selected>".$cat_row['name']."</option>";
        }
    ?>
</select>


            <label>Item Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($cat_name); ?>" style="padding:8px; width:60%; border:1px solid #ccc; border-radius:6px;" required>

            <label>Price:</label>
            <input type="number" name="price" min="0" value="<?php echo htmlspecialchars($price); ?>" style="padding:8px; width:60%; border:1px solid #ccc; border-radius:6px;" required>

            <input type="hidden" name="sno" value="<?php echo htmlspecialchars($sno); ?>">

            <input type="file" name="photo" accept="image/*" style="padding:10px;">

            <input type="submit" name="submit" value="Submit" style="padding:10px 25px; border:none; border-radius:6px; background-color:#007bff; color:white; cursor:pointer;">
        </form>
    </div>
    <div style="background-color:white; padding:40px; box-shadow:0 4px 20px rgba(0,0,0,0.15); width:80%; margin:50px auto; text-align:center;">
        <table id="myTable" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Categories</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM menu ORDER BY sno DESC";
                $result = $conn->query($sql);
                if($result && $result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        echo '<tr>
                                <td>'.$row['sno'].'</td>
                                <td>'.$row['categories'].'</td>
                                <td>'.$row['categories_name'].'</td>
                                <td>₹'.$row['price'].'</td>
                                <td>'.$row['photo'].'</td>
                                <td>
                                    <a href="menudashboard.php?edit_id='.base64_encode($row['sno']).'" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="menudashboard.php?delete_id='.base64_encode($row['sno']).'" onclick="return confirm(\'Delete?\')" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                </td>
                              </tr>';
                    }
                } else { echo "<tr><td colspan='6'>No menu items found.</td></tr>"; }
                ?>
            </tbody>
        </table>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function(){
	  $('#myTable').DataTable(); 
	  });
</script>
