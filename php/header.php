<?php
	session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /index.php?error=signin");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid m-0">
	  	<div class="m-0 p-5 bg-primary text-white rounded">
		  <a href="landing_page.php" style="text-decoration: none; color: white;">
            <h1>User Dashboard</h1>
        </a>
	    	<p>Students Information Management System for Faculty of Applied Science</p> 
			<p> University of Vavuniya</p>
	  	</div>
	</div>

	<div class="container-fluid m-0">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
			<div class="container-fluid">
				 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
				 <span class="navbar-toggler-icon"></span>
				  </button>
					<div class="collapse navbar-collapse" id="mynavbar">
				      <ul class="navbar-nav me-auto">
				        <li class="nav-item dropdown">
							  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Students</a>
							  <ul class="dropdown-menu">
							    <li><a class="dropdown-item" href="add_stu.php">Add Student</a></li>
							    <li><a class="dropdown-item" href="stu_details.php">Student's Details</a></li>
							    <li><a class="dropdown-item" href="allStudents.php">All Students' Details</a></li>
							  </ul>
						</li>
						
						<li class="nav-item dropdown">
							  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">	Exams</a>
							  <ul class="dropdown-menu">
							    <li><a class="dropdown-item" href="exam_details.php">Add Exam Details</a></li>
							    <li><a class="dropdown-item" href="stu_exam_details.php">Student's Exam Details</a></li>
							    <li><a class="dropdown-item" href="all_stu_details.php">All Students' Exam Details</a></li>
							  </ul>
						</li>
						
				        <li class="nav-item dropdown">
							  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Academic Staff</a>
							  <ul class="dropdown-menu">
							    <li><a class="dropdown-item" href="add_lec.php">Add Staff</a></li>
							    <li><a class="dropdown-item" href="lec_details.php">Staff Details</a></li>
							  </ul>
						</li>
				        <li class="nav-item dropdown">
							  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Non Academic Staff</a>
							  <ul class="dropdown-menu">
							    <li><a class="dropdown-item" href="add_nonAcStf.php">Add Staff</a></li>
							    <li><a class="dropdown-item" href="stf_details.php">Staff Details</a></li> 
							  </ul>
						</li>
						<li class="nav-item">
							
							<a class="nav-link" href="subjects.php">Subjects</a>

						</li>
				      </ul>
				      <form class="d-flex" action="logout.php" method="post">
				        <button class="btn btn-primary" type="submit" value="submit">Logout</button>
				      </form>
				    </div>
			</div>
		</nav>
	</div>

</body>
</html>