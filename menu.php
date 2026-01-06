<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['username']=='Guest')
{
	header("Location: login.php");
	exit();
}
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
include 'header.php';
include 'navbar.php';
include 'config.php';
$menuItems=$conn->query("SELECT * FROM menu ORDER BY sno DESC");
$catResult=$conn->query("SELECT * FROM category ORDER BY sno ASC");
?>
<section class="about-hero">
<div class="overlay"></div>
<div class="about-text">
<h1>Menu</h1></div>
</section>
<section class="menu-filter">
<div class="container-fluid text-center main-border">
<h1 class="section-title">Our Tasty Menu</h1>
<div class="filter-bar" id="filterBar">
<button class="filter-btn active" data-filter="all">All</button>
<?php
if($catResult && $catResult->num_rows>0){
while($cat=$catResult->fetch_assoc()){
echo '<button class="filter-btn" data-filter="'.strtolower($cat['name']).'">'.$cat['name'].'</button>';
}
}
?>
</div>
<div class="row centered-row" id="menuGrid">
<?php
if($menuItems && $menuItems->num_rows>0){
while($item=$menuItems->fetch_assoc()){
$imgPath="admindashboard/uploads/".$item['photo'];
echo '<div class="col-sm-3 col-xs-6 menu-item" data-category="'.strtolower($item['categories']).'">
<div class="menu1-card">
<img src="'.$imgPath.'" alt="'.htmlspecialchars($item['categories_name']).'" style="width:100%; height:200px; object-fit:cover;">
<h4>'.htmlspecialchars($item['categories_name']).'</h4>
<p>₹'.htmlspecialchars($item['price']).'</p>
</div></div>';
}
}else{echo '<p>No menu items available.</p>';}
?>
</div>
</div>
</section>
<section id="subscribe-section" class="subscribe-section fade-up">
<div class="container text-center">
<h2 class="subscribe-title">Stay Updated with Our Festival Specials!</h2>
<p class="subscribe-text">Get alerts on <strong>seasonal treats</strong>, <strong>bulk offers</strong>, <strong>party cakes</strong>, and <strong>limited-time bakery discounts</strong>.</p>
<form class="subscribe-form">
<div class="form-group"><input type="email" class="form-input" placeholder="Enter your email" required></div>
<label class="checkbox-label"><input type="checkbox" required>Yes, notify me about festival offers & new arrivals.</label>
<button type="submit" class="subscribe-btn">Subscribe Now</button>
</form>
</div>
</section>
<script>
(function() {
    var buttons = document.querySelectorAll('#filterBar .filter-btn');
    var items = Array.from(document.querySelectorAll('#menuGrid .menu-item'));
    var hideClass = 'filter-hide';
    var animDuration = 450;

    function setActiveButton(clickedBtn) {
        buttons.forEach(b => {
            b.classList.remove('active');
            b.setAttribute('aria-pressed', 'false');
        });
        clickedBtn.classList.add('active');
        clickedBtn.setAttribute('aria-pressed', 'true');
    }

    function showItem(el) {
        el.style.display = '';
        el.offsetHeight; // trigger reflow
        el.classList.remove(hideClass);
    }

    function hideItem(el) {
        el.classList.add(hideClass);
        setTimeout(() => {
            if (el.classList.contains(hideClass)) el.style.display = 'none';
        }, animDuration);
    }

    function filterBy(category) {
        if (category === 'all') {
            items.forEach(showItem);
        } else {
            items.forEach(it => 
                it.getAttribute('data-category') === category ? showItem(it) : hideItem(it)
            );
        }
    }

    buttons.forEach(btn => btn.addEventListener('click', () => {
        setActiveButton(btn);
        filterBy(btn.getAttribute('data-filter'));
    }));
    items.forEach(it => {
        it.classList.remove(hideClass);
        it.style.display = '';
    });
})();
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const fadeElements = document.querySelectorAll(".fade-up");

    function fadeInOnScroll() {
        fadeElements.forEach(el => {
            if (el.getBoundingClientRect().top <= window.innerHeight - 100) {
                el.classList.add("visible");
            }
        });
    }

    window.addEventListener("scroll", fadeInOnScroll);
    fadeInOnScroll(); // Initial check
});
</script>
<?php include 'footer.php'; ?>
