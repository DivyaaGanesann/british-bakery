<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form-admin</title>
  <link rel="shortcut icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
session_start();
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM signup WHERE username='$username' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: category.php");
            exit();
        }
    }
    header("Location: login.php?error=1");
    exit();
}
?>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
	
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <h3><strong>British Bakery</strong></h3>
                </a>
                             <form action="login.php" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="username" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                  </div>

 <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
  Login In
</button>                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="position-fixed top-0 start-50 translate-middle-x mt-4" style="z-index: 1055; width: 90%; max-width: 400px; display: none;" id="errorAlert">
    <div class="alert alert-warning alert-dismissible fade show text-center shadow" role="alert">
      Incorrect username or password. Please try again.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('error') === '1') {
  const alertBox = document.getElementById('errorAlert');
  alertBox.style.display = 'block';
  setTimeout(() => {
    const bsAlert = new bootstrap.Alert(alertBox.querySelector('.alert'));
    bsAlert.close();
  }, 9000);
  window.history.replaceState({}, document.title, window.location.pathname);
}
</script>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>