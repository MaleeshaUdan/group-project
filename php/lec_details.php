<?php
	require_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lecturer Details</title>
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

        $('#searchFormLec').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'lec_detailsfunction.php',
                data: formData,
                success: function(response) {
                    if (response == "error") {
                        alert('Error: No records found.');
                        $('input[type="text"]').val('');

                        // Add this code to disable the button if no record is found
                        $('#deleteButton').attr('disabled', 'disabled');
                    } else {
                        var result = JSON.parse(response);
                        $('#lecturerId').val(result.lecId);
                        $('#lecturerName').val(result.fname);
                        $('#nameWithInitials').val(result.sname);
                        $('#lecturerGender').val(result.gender);
                        $('#lecturerAddress').val(result.address);
                        $('#lecturerDob').val(result.dob);
                        $('#lecturerEmail').val(result.email);
                        $('#telephoneNumber').val(result.telephone);
                        $('#nationalID').val(result.nic);
                        $('#lecturerUniversity').val(result.university);
                        $('#lecturerDegree').val(result.degree);
                        

                        // Add this code to enable the button if a record is found
                        $('#deleteButton').removeAttr('disabled');
                        $('#registrationNumber').val(result.lecId);
                    }
                },
                error: function() {
                    alert('Error: Failed to search the database.');
                }
            });
        });

        // Add this code to handle the click event of the delete button
        $('#deleteButton').click(function() {
            var lectureid = $('#registrationNumber').val();
            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    type: 'POST',
                    url: 'del_lec.php',
                    data: { lectureid: lectureid },
                    success: function(response) {
                        alert(response);
                        $('#searchFormLec')[0].reset();
                        $('input[type="text"]').val('');
                        $('#deleteButton').attr('disabled', 'disabled');
                    },
                    error: function() {
                        alert('Error: Failed to delete the record.');
                    }
                });
            }
            else{
            	 $('#searchFormLec')[0].reset();
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
    		<h3>Lecturer Details</h3>    
  		</div>
	</div>
	<br/>
	<div class="container">
		<form id="searchFormLec" method="post">
	<div class="row g-2">
		<div class="col-3"></div>
		<div class="col-4">
			<div class="input-group">
				<input type="text" class="form-control" id="search-box" name="srch" placeholder="Enter the Lecturer ID" required>
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
		<label for="lecturerId" class="form-label">Lecturer ID</label>
		<input type="text" class="form-control" id="lecturerId" name="lecturerId" readonly>
	</div>

	<div class="mb-3 mt-3">
		<label for="lecturerName" class="form-label">Lecturer Full Name</label>
		<input type="text" class="form-control" id="lecturerName" name="lecturerName" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="nameWithInitials" class="form-label">Lecturer Name With Initials</label>
		<input type="text" class="form-control" id="nameWithInitials" name="nameWithInitials" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="lecturerGender" class="form-label">Gender</label>
		<input type="text" class="form-control" id="lecturerGender" name="lecturerGender" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="lecturerAddress" class="form-label">Lecturer Address</label>
		<input type="text" class="form-control" id="lecturerAddress" name="lecturerAddress" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="lecturerDob" class="form-label">Date of Birth</label>
		<input type="text" class="form-control" id="lecturerDob" name="lecturerDob" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="lecturerEmail" class="form-label">Email Address</label>
		<input type="text" class="form-control" id="lecturerEmail" name="lecturerEmail" readonly>
	</div>
	<div class="mb-3 mt-3">
	    <label for="telephoneNumber" class="form-label">Telephone Number</label>
	    <input type="text" class="form-control" id="telephoneNumber" name="telephoneNumber" readonly>
	</div>
	<div class="mb-3 mt-3">
	    <label for="nationalID" class="form-label">National Identity Card Number</label>
	    <input type="text" class="form-control" id="nationalID" name="nationalID" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="lecturerUniversity" class="form-label">Lecturer University</label>
		<input type="text" class="form-control" id="lecturerUniversity" name="lecturerUniversity" readonly>
	</div>
	<div class="mb-3 mt-3">
		<label for="lecturerDegree" class="form-label">Lecturer Degree</label>
		<input type="text" class="form-control" id="lecturerDegree" name="lecturerDegree" readonly>
	</div>
</div>


</body>
</html>

<?php
	require_once 'footer.php';
?>