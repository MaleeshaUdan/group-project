
<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Students</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	 

</head>
<body>
	<div class="container mt-3">
  		<div class="mt-4 p-5 bg-primary text-white rounded">
    		<h3>Add Student Details</h3>    
  		</div>
	</div>

	<div class="container">
			<form action="add_stu_funct.php" method="post">
				  <div class="mb-3 mt-3">
				    <label for="text" class="form-label was-validated">Full Name</label>
				    <input type="text" class="form-control" id="fname" placeholder="Enter the Full Name" name="fname" required>
				  </div>
				  <div class="mb-3 mt-3">
				    <label for="text" class="form-label was-validated">Name With Initials</label>
				    <input type="text" class="form-control" id="sname" placeholder="Enter the Name With Initials" name="sname" required>
				  </div>
				 <div class="mb-3 mt-3">
				    <label for="gender" class="form-label">Gender</label>
				    <div class="row">
				        <div class="col-auto">
				            <div class="form-check">
				                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
				                <label class="form-check-label" for="male">
				                    Male
				                </label>
				            </div>
				        </div>
				        <div class="col-auto">
				            <div class="form-check">
				                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
				                <label class="form-check-label" for="female">
				                    Female
				                </label>
				            </div>
				        </div>
				    </div>
				 </div>
				 <div class="mb-3 mt-3">
				    <label for="text" class="form-label was-validated">Address</label>
				    <input type="text" class="form-control" id="address" placeholder="Enter Your Address" name="address" required>
				  </div>
				   <div class="mb-3 mt-3">
						  <label for="dob" class="form-label">Date of Birth</label>
						  <div class="input-group">
						    <input type="date" class="form-control" id="dob" name="dob" placeholder="Select date">
						    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
						  </div>
				   </div>
				   <div class="mb-3 mt-3">
					    <label for="email" class="form-label was-validated">Email Address</label>
					    <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" required>
				  </div>
				  <div class="mb-3 mt-3">
				    <label for="telephone" class="form-label was-validated">Telephone Number</label>
				    <input type="text" class="form-control" id="telephone" placeholder="Enter Your Telephone Number (Enter Numbers Only 0xxxxxxxxx)" name="telephone" pattern="[0-9]+" required>
				  </div>

				  <div class="mb-3 mt-3">
					  <label for="nid" class="form-label was-validated">National ID Card Number</label>
					  <input type="text" class="form-control" id="nid" placeholder="Enter Your National ID Card Number(xxxxxxxxV or v)" name="nid" required pattern="[0-9Vv]+">
				  </div>
				  <div class="mb-3 mt-3">
						    <label for="faculty" class="form-label was-validated">Faculty of Studies</label>
						    <select class="form-select" id="faculty" name="faculty" required>
						        <option value="Applied Science">Applied Science</option>				        
						    </select>
						</div>

						<div class="mb-3 mt-3">
						    <label for="department" class="form-label was-validated">Department</label>
						    <select class="form-select" id="department" name="department">
						    	<option value="">---Select---</option>
						        <option value="Biological Science">Biological Science</option>
						        <option value="Physical Science">Physical Science</option>
						    </select>
						</div>

 					<div class="mb-3 mt-3">
					    <label for="academicYear" class="form-label was-validated">Academic Year</label>
					    <select class="form-select" id="academicYear" name="academicYear" required>
					    	<option value="">---Select---</option>
					        <option value="2018/2019">2018/2019</option>
					        <option value="2019/2020">2019/2020</option>
					        <option value="2020/2021">2020/2021</option>
					        <option value="2021/2022">2021/2022</option>
					        <option value="2022/2023">2022/2023</option>
					        <option value="2023/2024">2023/2024</option>
					        <option value="2024/2025">2024/2025</option>
					        <option value="2025/2026">2025/2026</option>
					        <option value="2026/2027">2026/2027</option>
					        <option value="2027/2028">2027/2028</option>
					        <option value="2028/2029">2028/2029</option>
					        <option value="2029/2030">2029/2030</option>
					    </select>
					</div>	
					<div class="mb-3 mt-3">
					    <label for="regNo" class="form-label was-validated">Registration Number</label>
					    <input type="text" class="form-control" id="regNo" placeholder="Enter Your Registration Number (20XX/YYY/XXX)" name="regNo" required>
					</div>
					<div class="mb-3 mt-3">
					    <label for="dateOfAdmission" class="form-label">Date of Admission</label>
					    <div class="input-group">
					        <input type="date" class="form-control" id="dateOfAdmission" name="dateOfAdmission" placeholder="Select date">
					        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
					    </div>
					</div>


				  
				 <div class="mb-3 mt-3">
				  <button type="submit" class="btn btn-primary">Submit</button>
				  <button type="reset" class="btn btn-secondary">Clear</button>
				</div>

			</form>
	</div>
<br/>	
</body>
</html>

<?php
	require_once 'footer.php';
?>
