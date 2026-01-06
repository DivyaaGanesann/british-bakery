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
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'config.php'; ?>
<?php 
$cat_name='';
$sno='';
if(isset($_GET['edit_id']) && $_GET['edit_id'] != ''){
	$id=base64_decode($_GET['edit_id']);
   $get_category = $conn->query("SELECT * FROM category where sno='$id' limit 1");  
	$fetch_category = $get_category->fetch_object();
	$cat_name=$fetch_category->name;
	$sno=$fetch_category->sno;
}
if(isset($_GET['delete_id']) && $_GET['delete_id'] != ''){
	$id=base64_decode($_GET['delete_id']);
   $get_category = $conn->query("delete FROM category where sno='$id' limit 1");
   ?>
   <script>
       window.location.href = "category.php";
   </script>
   <?php
}
?>
<div style="background-color: #f4f4f4; 
  min-height: 150vh;
  margin-top: 0px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
  padding: 40px 0;
  margin-left:250px;">
  
  <div style="
    background-color: white;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    text-align: center;
    width: 60%;
	margin-top: 60px;
    min-height: 250px;
    margin-bottom: 90px;">
    
    <?php if (isset($_GET['msg'])): ?>
      <?php if ($_GET['msg'] == 'success'): ?>
          <p style="color: green;">Category added successfully!</p>
      <?php elseif ($_GET['msg'] == 'error'): ?>
          <p style="color: red;">Database error!</p>
      <?php elseif ($_GET['msg'] == 'empty'): ?>
          <p style="color: orange;">Please enter a category name.</p>
      <?php endif; ?>
      <script>
        if (window.history.replaceState) {
            const url = new URL(window.location);
            url.searchParams.delete('msg');
            window.history.replaceState({}, document.title, url.pathname);
        }
      </script>
    <?php endif; ?>

    <form style="display: flex; flex-direction: column; gap: 15px; align-items: center;" 
          action="category_submit.php" method="POST">
      <label style="font-weight: bold;">Name:</label>
      <input type="text" name="name"  value="<?php echo $cat_name;?>"
             style="padding: 8px; width: 60%; border: 1px solid #ccc; border-radius: 6px;">
			 <input type="hidden" name="sno" value="<?php echo $sno;?>"/>
      <input type="submit" value="Add"
             style="padding: 10px 25px; border: none; border-radius: 6px; background-color: #007bff; color: white; cursor: pointer;">
    </form>

  </div>

  <div style="
    background-color: white;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    text-align: center;
    width: 70%;
    min-height: 300px;">


<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			
			?>
			<tr>
			<td><?php echo htmlspecialchars($row['sno']); ?></td>
			<td><?php echo htmlspecialchars($row['name']); ?></td>
			<td>
                    <a href='#?id="<?php echo $row['sno']; ?> title="View">
                        <i class='fa-solid fa-eye'></i>
                    </a>
                    <a href="category.php?edit_id=<?php echo base64_encode($row['sno']); ?>" title='Edit'>
                        <i class='fa-solid fa-pen-to-square'></i>
                    </a>
                    <a href="category.php?delete_id=<?php echo base64_encode($row['sno']); ?>" >
                        <i class='fa-solid fa-trash'></i>
                    </a>
                  </td>
			</tr>
			<?php
        }
    } else {
        echo "<tr><td colspan='3' style='text-align:center;'>No categories found.</td></tr>";
    }

   
    ?>
    </tbody>
</table>

  </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
      $('#myTable').DataTable();
  });
</script>
