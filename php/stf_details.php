<?php
	require_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Non Academic Staff Details</title>
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

        $('#searchFormStf').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'stf_detailsfunction.php',
                data: formData,
                success: function(response) {
                    if (response == "error") {
                        alert('Error: No records found.');
                        $('input[type="text"]').val('');

                        // Add this code to disable the button if no record is found
                        $('#deleteButton').attr('disabled', 'disabled');
                    } else {
                        var result = JSON.parse(response);
                        $('#staff-id').val(result.stfId);
                        $('#staff-name').val(result.firstName);
                        $('#stfs-name').val(result.lastName);
                        $('#gender').val(result.gender);
                        $('#staff-address').val(result.address);
                        $('#dob').val(result.dob);
                        $('#email').val(result.email);
                        $('#telephone').val(result.phoneNumber);
                        $('#nid').val(result.nic);
                        $('#dateOfJoining').val(result.dateOfJoining);
                        $('#section').val(result.section);
                        $('#position').val(result.position);
                        

                        // Add this code to enable the button if a record is found
                        $('#deleteButton').removeAttr('disabled');
                        $('#registrationNumber').val(result.stfId);
                    }
                },
                error: function() {
                    alert('Error: Failed to search the database.');
                }
            });
        });

        // Add this code to handle the click event of the delete button
        $('#deleteButton').click(function() {
            var staffid = $('#registrationNumber').val();
            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    type: 'POST',
                    url: 'del_stf.php',
                    data: { staffid: staffid },
                    success: function(response) {
                        alert(response);
                        $('#searchFormStf')[0].reset();
                        $('input[type="text"]').val('');
                        $('#deleteButton').attr('disabled', 'disabled');
                    },
                    error: function() {
                        alert('Error: Failed to delete the record.');
                    }
                });
            }
            else{
            	 $('#searchFormStf')[0].reset();
                 $('input[type="text"]').val('');
                 $('#deleteButton').attr('disabled', 'disabled');
            }

        });
    });
</script>




</head>
<body>
	<div class="container mt-3">
  		<div class="mt-4 p-5 bg-primary text-white rounded">
    		<h3>Non Academic Staff Details</h3>    
  		</div>
	</div>
	<br/>
	<div class="container">
		<form id="searchFormStf" method="post">
	<div class="row g-2">
		<div class="col-3"></div>
		<div class="col-4">
			<div class="input-group">
				<input type="text" class="form-control" id="search-box" name="srch" placeholder="Enter the Staff ID" required>
				<label for="search-box" class="form-label visually-hidden">Search</label>	    
			</div>
		</div>
		<div class="col-2">
			<button class="btn btn-primary  w-100" type="submit">Search</button>
		</div>
		<div class="col-2">
			<button class="btn btn-danger w-100" type="button" id="deleteButton">Delete Record</button>
		</div>
		<form id="deleteFormLec" action="javascript:void(0);" method="post">
			<input type="hidden" id="registrationNumber" name="registrationNumber">
		</form>
	</div>
	</form>
	<div class="mb-3 mt-3">
		<label for="staff-id" class="form-label">Staff ID</label>
		<input type="text" class="form-control" id="staff-id" name="staff-id" readonly>
	</div>

	<div class="mb-3 mt-3">
		<label for="staff-name" class="form-label">Full Name</label>
		<input type="text" class="form-control" id="staff-name" name="staff-name" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="stfs-name" class="form-label">Name With Initials</label>
		<input type="text" class="form-control" id="stfs-name" name="stfs-name" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="gender" class="form-label">Gender</label>
		<input type="text" class="form-control" id="gender" name="gender" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="staff-address" class="form-label">Address</label>
		<input type="text" class="form-control" id="staff-address" name="staff-address" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="dob" class="form-label">Date of Birth</label>
		<input type="text" class="form-control" id="dob" name="dob" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="email" class="form-label">Email Address</label>
		<input type="text" class="form-control" id="email" name="email" readonly>
	</div>
	<div class="mb-3 mt-3">
	    <label for="telephone" class="form-label">Telephone Number</label>
	    <input type="text" class="form-control" id="telephone" name="telephone" readonly>
	</div>
	<div class="mb-3 mt-3">
	    <label for="nid" class="form-label">National Identity Card Number</label>
	    <input type="text" class="form-control" id="nid" name="nid" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="dateOfJoining" class="form-label">Date of Joining</label>
		<input type="text" class="form-control" id="dateOfJoining" name="dateOfJoining" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="section" class="form-label">Working Section</label>
		<input type="text" class="form-control" id="section" name="section" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="position" class="form-label">Position of Working</label>
		<input type="text" class="form-control" id="position" name="position" readonly>
	</div>
</div>


</body>
</html>

<?php
	require_once 'footer.php';
?>