<?php

	require_once 'header.php';

?>



<!DOCTYPE html>
<html>
<head>
	<title>Students' Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Add this code to disable the button on page load
        $('#deleteButton').attr('disabled', 'disabled');

        $('#searchForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'stu_detailsfunct.php',
                data: formData,
                success: function(response) {
                    if (response == "error") {
                        alert('Error: No records found.');
                        $('input[type="text"]').val('');

                        // Add this code to disable the button if no record is found
                        $('#deleteButton').attr('disabled', 'disabled');
                    } else {
                        var result = JSON.parse(response);
                        $('#fullName').val(result.full_name);
                        $('#nameWithInitials').val(result.sname);
                        $('#gender').val(result.gender);
                        $('#address').val(result.address);
                        $('#dob').val(result.dob);
                        $('#email').val(result.email);
                        $('#telephone').val(result.telephone);
                        $('#idNumber').val(result.nic);
                        $('#faculty').val(result.faculty);
                        $('#department').val(result.department);
                        $('#academicYear').val(result.academic_year);
                        $('#admissionDate').val(result.date_of_admission);

                        // Add this code to enable the button if a record is found
                        $('#deleteButton').removeAttr('disabled');
                        $('#registrationNumber').val(result.reg_number);
                    }
                },
                error: function() {
                    alert('Error: Failed to search the database.');
                }
            });
        });

        // Add this code to handle the click event of the delete button
        $('#deleteButton').click(function() {
            var registrationNumber = $('#registrationNumber').val();
            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    type: 'POST',
                    url: 'del_stu.php',
                    data: { registrationNumber: registrationNumber },
                    success: function(response) {
                        alert(response);
                        $('#searchForm')[0].reset();
                        $('input[type="text"]').val('');
                        $('input[type="email"]').val('');
                        $('#deleteButton').attr('disabled', 'disabled');
                    },
                    error: function() {
                        alert('Error: Failed to delete the record.');
                    }
                });
            }
            else{
            	 $('#searchForm')[0].reset();
                 $('input[type="text"]').val('');
                 $('input[type="email"]').val('');
                 $('#deleteButton').attr('disabled', 'disabled');
            }

        });
    });
</script>

</head>
<body>
	<div class="container mt-3">
  		<div class="mt-4 p-5 bg-primary text-white rounded">
    		<h3>Students' Details</h3>    
  		</div>
	</div>
	<div class="container mt-3">
		<form id="searchForm" method="post">
			<div class="row g-2">
				<div class="col-3"></div>
				 <div class="col-4">
				    <div class="input-group">
				      <input type="text" class="form-control" id="search-box" name="srch" placeholder="Enter the Registration Number Here" required>
				      <label for="search-box" class="form-label visually-hidden">Search</label>	    
				   </div>
				 </div>
				 <div class="col-2">
				    <button class="btn btn-primary  w-100" type="submit">Search</button>
				 </div>
				 <div class="col-2">
				    <button class="btn btn-danger w-100" type="button" id="deleteButton">Delete Record</button>
				</div>
				<form id="deleteForm" action="javascript:void(0);" method="post">
				    <input type="hidden" id="registrationNumber" name="registrationNumber">
				</form>
			</div>
			<div class="mb-3 mt-3">
			    <label for="fullName" class="form-label">Full Name</label>
			    <input type="text" class="form-control" id="fullName" name="fullName" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="nameWithInitials" class="form-label">Name With Initials</label>
			    <input type="text" class="form-control" id="nameWithInitials" name="nameWithInitials" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="gender" class="form-label was-validated">Gender</label>
			    <input type="text" class="form-control" id="gender" name="gender" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="address" class="form-label was-validated">Address</label>
			    <input type="text" class="form-control" id="address" name="address" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="dob" class="form-label was-validated">Date of Birth</label>
			    <input type="text" class="form-control" id="dob" name="dob" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="email" class="form-label was-validated">Email Address</label>
			    <input type="email" class="form-control" id="email" name="email" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="telephone" class="form-label was-validated">Telephone Number</label>
			    <input type="text" class="form-control" id="telephone" name="telephone" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="idNumber" class="form-label">National Identity Card Number</label>
			    <input type="text" class="form-control" id="idNumber" name="idNumber" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="faculty" class="form-label">Faculty of Studies</label>
			    <input type="text" class="form-control" id="faculty" name="faculty" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="department" class="form-label">Department</label>
			    <input type="text" class="form-control" id="department" name="department" readonly>
			</div>
			<div class="mb-3 mt-3">
			  <label for="academicYear" class="form-label">Academic Year</label>
			  <input type="text" class="form-control" id="academicYear" name="academicYear" readonly>
			</div>
			<div class="mb-3 mt-3">
			    <label for="admissionDate" class="form-label">Date of Admission</label>
			    <input type="text" class="form-control" id="admissionDate" name="admissionDate" readonly>
			</div>

		</form>
	</div>
</body>
</html>
<br/>
<?php
	require_once 'footer.php';
?>