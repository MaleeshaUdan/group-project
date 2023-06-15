<?php
session_start();
// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/login_style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/login_check_empty.js"></script>
	
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <?php if (isset($_GET['error']) && $_GET['error'] == 'signin'): ?>
				<div class="alert alert-danger" role="alert">
					You must sign in first!
				</div>
			<?php endif; ?>
             <form id="login" action="php/login.php" method="post" onsubmit="return validateForm()">
			  <h2 class="fw-bold mb-2 text-uppercase">Faculty of Applied Science</h2>
              <h2 class="fw-bold mb-2 text-uppercase">University of vavuniya</h2>
              <h5 class="fw-bold mb-2 text-uppercase">Student Information Management System</h5>
              <h6 class="fw-bold mb-2 text-uppercase">Admin Login Page</h6>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <div class="form-outline form-white mb-4">
                <input type="text" id="user" name="user" class="form-control form-control-lg" />
                <label class="form-label" for="user">Username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                <label class="form-label" for="pass">Password</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit" value="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>