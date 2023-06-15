<?php
	require_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Non Academic staff</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
		  // Get the Non academic Staff ID value and set it as the initial value of the input field
		  $.ajax({
		    url: "show_nonAcId.php",
		    success: function(data) {
		      $("#staff-id").val(data);
		    }
		  });

		  // Add an event listener to the Clear button
		  $("#clear-button").click(function() {
		    // Select all input fields except for the staff ID field and clear their values
		    $("input:not(#staff-id)").val("");
		  });
		});

	</script>

</head>
<body>
	<div class="container mt-3">
  		<div class="mt-4 p-5 bg-primary text-white rounded">
    		<h3>Add Non Academic Staff Details</h3>    
  		</div>
	</div>
	<br/>
	<div class="container">
		<form action="add_stfFunction.php" method="post">
			<div class="mb-3 mt-3">
			  <label for="staff-id" class="form-label">Staff ID</label>
			  <input type="text" class="form-control" id="staff-id" name="staff-id" readonly>
			</div>
			<div class="mb-3">
			  <label for="staff-name" class="form-label">Full Name</label>
			  <input type="text" class="form-control" id="staff-name" name="staff-name" placeholder="Enter the Full Name" required>
			</div>
			<div class="mb-3">
			  <label for="stfs-name" class="form-label">Name with Initials</label>
			  <input type="text" class="form-control" id="stfs-name" name="stfs-name" placeholder="Enter the Name with Initials" required>
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
			<div class="mb-3">
			  <label for="staff-address" class="form-label">Address</label>
			  <input type="text" class="form-control" id="staff-address" name="address" placeholder="Enter the Address" required>
			</div>
			<div class="mb-3 mt-3">
			  <label for="dob" class="form-label">Date of Birth</label>
			  <div class="input-group">
			    <input type="date" class="form-control" id="dob" name="dob" placeholder="Select date" required>
			    <button class="btn btn-outline-secondary" type="button" id="datepicker">
			      <i class="bi bi-calendar"></i>
			    </button>
			  </div>
			</div>
			<div class="mb-3 mt-3">
			  <label for="email" class="form-label">Email Address</label>
			  <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email" required>
			</div>
			<div class="mb-3 mt-3">
			  <label for="telephone" class="form-label">Telephone Number</label>
			  <input type="tel" class="form-control" id="telephone" placeholder="Enter Telephone Number (Enter Numbers Only 0xxxxxxxxx)" name="telephone" pattern="[0-9]+" required>
			</div>
			<div class="mb-3 mt-3">
			  <label for="nid" class="form-label was-validated">National ID Card Number</label>
			  <input type="text" class="form-control" id="nid" placeholder="Enter National ID Card Number" name="nid" required>
			</div>
			<div class="mb-3 mt-3">
			  <label for="dateOfJoining" class="form-label">Date of Joining</label>
			  <div class="input-group">
			    <input type="date" class="form-control" id="dateOfJoining" name="dateOfJoining" placeholder="Select date" required>
			    <button class="btn btn-outline-secondary" type="button" id="datepickerDoJ">
			      <i class="bi bi-calendar"></i>
			    </button>
			  </div>
			</div>
			<div class="mb-3">
			  <label for="section" class="form-label">Working Section</label>
			  <input type="text" class="form-control" id="section" name="section" placeholder="Enter the Section of Working" required>
			</div>
			<div class="mb-3">
			  <label for="position" class="form-label">Position of Working</label>
			  <input type="text" class="form-control" id="position" name="position" placeholder="Enter the Position of Working" required>
			</div>
			<div class="mb-3 mt-3">
				  <button type="submit" class="btn btn-primary">Submit</button>
				  <button type="reset" class="btn btn-secondary" id="clear-button">Clear</button>
			</div>
		</form>



	</div>

</body>
</html>
<?php

	require_once 'footer.php';
?>