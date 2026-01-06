<?php
include 'header.php';
include 'navbar.php';
include 'config.php';
?>
<section class="about-hero">
<div class="overlay"></div>
<div class="about-text">
<h1>Video Gallery</h1>
</div>
</section>
<div class="container" style="padding:50px 0;">
<div class="row">
<?php
$query = "SELECT * FROM video_gallery ORDER BY sno DESC";
$result = mysqli_query($conn, $query);
if(!$result){
die("Query Failed: ".mysqli_error($conn));
}
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$embed = '';
if(!empty($row['embed_url']))
{
$embed = $row['embed_url'];
} elseif(!empty($row['video_url']))
{
$video_id = '';
if(preg_match("/youtu\.be\/([^\?\/]+)/", $row['video_url'], $matches)){
$video_id = $matches[1];
} elseif(preg_match("/v=([^\&]+)/", $row['video_url'], $matches)){
$video_id = $matches[1];
}
if($video_id != ''){
$embed = '<iframe width="100%" height="250" src="https://www.youtube.com/embed/'.$video_id.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
} else {
$embed = '';
}
} else {
$embed = '';
}
if($embed != ''){
?>
<div class="col-md-4 mb-4">
<div class="card">
<div class="card-body p-0">
<?php echo $embed; ?>
</div>
</div>
</div>
<?php
}
}
} else {
echo "<p>No videos found.</p>";
}
?>
</div>
</div>
<?php include 'footer.php'; ?>
