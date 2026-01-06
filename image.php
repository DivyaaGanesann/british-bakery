<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'config.php'; ?>
<section class="about-hero">
<div class="overlay"></div>
<div class="about-text">
<h1>Gallery</h1>
</div>
</section>
<div class="container" style="padding:50px 0;">
<div class="row">
    <?php  
    $sql = $conn->query("SELECT * FROM gallery ORDER BY id DESC");
    while($row = $sql->fetch_assoc()) {
    $images = explode(",", $row['image_path']);
    foreach($images as $img) {
    ?>
    <div class="col-md-4" style="margin-bottom:30px;">
    <img src="admindashboard/<?php echo $img; ?>" 
    style="width:100%; height:250px; object-fit:cover;border-radius:10px;">
    </div>
    <?php
    }
    }
    ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
<?php include 'footer.php'?>