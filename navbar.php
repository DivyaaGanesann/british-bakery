<body>
<div class="header-top">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-xs-12 col-sm-6 header-phone">
        <span class="glyphicon glyphicon-earphone"></span> +(91)-9443268602
      </div>
      <div class="col-xs-12 col-sm-6 header-social">
        <span class="glyphicon glyphicon-envelope"></span>
        <a href="#"> britishbaker@gmail.com</a>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-default main-navbar" id="mainNavbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" style="height:40px; display:inline-block; margin-right:6px;">
        <img src="images/nameboard.png" style="height:40px; display:inline-block;">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="main-navbar">
      <ul class="nav navbar-nav navbar-center">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
            Gallery <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="image.php?type=images">Image Gallery</a></li>
            <li><a href="videoo.php">Video Gallery</a></li>
          </ul>
        </li>

        <li><a href="contact.php">Contact Us</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="btn navbar-btn order-btn">Order Online</a></li>
      </ul>
    </div>

  </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  window.addEventListener("scroll", function () {
    var navbar = document.querySelector(".main-navbar");
    if (window.scrollY > 100) {
      navbar.classList.add("navbar-sticky");
    } else {
      navbar.classList.remove("navbar-sticky");
    }
  });
</script>