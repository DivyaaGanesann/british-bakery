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
<?php include 'config.php'; 
$cat = $conn->query("SELECT COUNT(*) AS total FROM category");
$cat_count = $cat->fetch_assoc()['total'];
$menu = $conn->query("SELECT COUNT(*) AS total FROM menu");
$menu_count = $menu->fetch_assoc()['total'];
$gallery = $conn->query("SELECT COUNT(*) AS total FROM gallery");
$gallery_count = $gallery->fetch_assoc()['total'];
$video = $conn->query("SELECT COUNT(*) AS total FROM video_gallery");
$video_count = $video->fetch_assoc()['total'];
?>

<div class="container" style="margin-top:150px; margin-left:250px;">
    <div class="row">
        <div class="col-md-2">
            <div style=" padding:30px; color:black; text-align:center;border:1px solid black;border-radius:10px;">
                <h3><?php echo $cat_count; ?></h3>
                <p>Total Categories</p>
            </div>
        </div>
        <div class="col-md-2">
            <div style=" padding:30px; color:black; text-align:center;border:1px solid black;border-radius:10px;">
                <h3><?php echo $menu_count; ?></h3>
                <p>Total Menus</p>
            </div>
        </div>
        <div class="col-md-2">
            <div style=" padding:30px; color:black; text-align:center;border:1px solid black;border-radius:10px;">
                <h3><?php echo $gallery_count; ?></h3>
                <p>Total Images</p>
            </div>
        </div>
        <div class="col-md-2">
            <div style=" padding:30px; color:black; text-align:center;border:1px solid black;border-radius:10px;">
                <h3><?php echo $video_count; ?></h3>
                <p>Total Videos</p>
            </div>
        </div>

    </div>
</div>
