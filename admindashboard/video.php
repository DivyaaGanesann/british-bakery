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
$sno = "";
$title = "";
$video_url = "";
$embed_url = "";
if (isset($_GET['edit']) && $_GET['edit'] != "") {
    $sno = intval($_GET['edit']);
    $edit = $conn->query("SELECT * FROM video_gallery WHERE sno = $sno");
    if ($edit->num_rows > 0) {
        $data = $edit->fetch_assoc();
        $title = $data['title'];
        $video_url = $data['video_url'];
        $embed_url = $data['embed_url'];
    }
}
if (isset($_GET['delete']) && $_GET['delete'] != "") {
    $del = intval($_GET['delete']);
    $conn->query("DELETE FROM video_gallery WHERE sno = $del");
    echo "<script>window.location='video.php'</script>";
}
?>
<div class="body-wrapper p-4">
    <div class="card p-4 shadow" style="max-width: 800px; margin: auto;">
        <h3 class="mb-3">Video Gallery</h3>

        <form action="video_submit.php" method="POST">
            <input type="hidden" name="sno" value="<?php echo $sno; ?>">

            <label><b>Title</b></label>
            <input type="text" name="title" required class="form-control mb-3"
                   value="<?php echo htmlspecialchars($title); ?>">

            <label><b>Video URL</b></label>
            <input type="text" name="video_url" required class="form-control mb-3"
                   value="<?php echo htmlspecialchars($video_url); ?>">

            <label><b>Embed URL </b></label>
            <textarea name="embed_url" rows="2" class="form-control mb-3"><?php echo htmlspecialchars($embed_url); ?></textarea>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

    <br>

    <!-- TABLE -->
    <div class="card p-4 shadow mt-4" style="max-width: 1100px; margin: auto;">
        <table id="myTable" class="display table table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Title</th>
                    <th>Video URL</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM video_gallery ORDER BY sno DESC");
                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['video_url']); ?></td>
                    <td>
                        <a href="video.php?edit=<?php echo $row['sno']; ?>" <i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="video.php?delete=<?php echo $row['sno']; ?>" 
                           onclick="return confirm('Delete this video?')" 
                           <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Datatable Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        "autoWidth": false
    });
});
</script>
