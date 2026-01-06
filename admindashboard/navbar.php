<body>
<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'Guest';
}

$logout_message = '';
if (isset($_SESSION['logout_message'])) {
    $logout_message = $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
}
?>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical">
    <div id="top-header" class="app-topstrip bg-white py-3 px-3 w-100 d-lg-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <a class="d-flex justify-content-center" href="#">
                <h3 style="background-color: white; color: #DB241E;"><strong>British Bakery</strong></h3>
            </a>
        </div>

        <div class="d-lg-flex align-items-center gap-2">
            <h3 class="text-dark fs-5">
                Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>
            </h3>

            <div class="d-flex align-items-center gap-2">
                <form action="logout.php" method="post">
                    <button type="submit" class="btn btn-danger">
                        <i class="ti ti-logout fs-5"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <aside class="left-sidebar">
        <div>
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <br>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="home.php">
                            <i class="ti ti-home"></i>
                            <span class="hide-menu">Home</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-dropdown" href="#">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="hide-menu">Menu</span>
                        </a>
                        <ul class="sidebar-dropdown">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="category.php">
                                    <i class="ti ti-menu"></i>
                                    <span class="hide-menu">Category</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="menudashboard.php">
                                    <i class="ti ti-menu"></i>
                                    <span class="hide-menu">Menu Item</span>
                                </a>
                            </li>                            

                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="gallery.php">
                            <i class="ti ti-video"></i>
                            <span class="hide-menu">Gallery</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="video.php">
                            <i class="ti ti-video"></i>
                            <span class="hide-menu">Video</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="body-wrapper">
    </div>
</div>
<script>
    document.querySelectorAll('.has-dropdown').forEach(drop => {
        drop.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentElement;
            parent.classList.toggle('active');

            const topHeader = document.getElementById('top-header');
            if (parent.classList.contains('active')) {
                topHeader.style.display = 'none';
            } else {
                topHeader.style.display = 'flex';
            }
        });
    });
</script>

<style>
    .sidebar-dropdown {
        display: none;
        padding-left: 15px;
    }
    .sidebar-item.active > .sidebar-dropdown {
        display: block;
    }

    .sidebar-link.has-dropdown::after {
        content: "\25BC";
        float: right;
        transition: transform 0.3s;
    }
    .sidebar-item.active > .sidebar-link.has-dropdown::after {
        transform: rotate(-180deg);
    }
    .left-sidebar {
        width: 250px;
        position: fixed;     
        top: 70px;            
        left: 0;
        bottom: 0;
        overflow-y: auto;
        background-color: #fff;
        
    }
    .body-wrapper {
        margin-left: 250px;  
       
        margin-top: 70px;   
    }
</style>
