<?php
require_once 'header.php';

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Exam Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			var yearOfStudyDropdown = $('#yearOfStudy');
			var semesterDropdown = $('#semester');
			var subjectCodeDropdown = $('#subjectCode');
			var departmentDropdown = $('#department');
			var courseDropdown = $('#course');

			yearOfStudyDropdown.change(function() {
				updateSubjectCodes();
			});

			semesterDropdown.change(function() {
				updateSubjectCodes();
			});

			departmentDropdown.change(function() {
				updateCourseDropdown();
			});

			function updateSubjectCodes() {
				var selectedYearOfStudy = yearOfStudyDropdown.val();
				var selectedSemester = semesterDropdown.val();

				$.ajax({
					url: "getExamSubjects.php",
					method: "POST",
					data: {
						yearOfStudy: selectedYearOfStudy,
						semester: selectedSemester
					},
					success: function(response) {
						subjectCodeDropdown.empty();

						var subjects = JSON.parse(response);

						$.each(subjects, function(index, subject) {
							subjectCodeDropdown.append($('<option></option>').val(subject.subject_code).text(subject.subject_code));
						});
					},
					error: function() {
						console.log('Error retrieving subject codes.');
					}
				});
			}

			function updateCourseDropdown() {
				var selectedDepartment = departmentDropdown.val();

				if (selectedDepartment === '2') {
					courseDropdown.prop('disabled', true);
					courseDropdown.val(''); // Clear the selected value
				} else {
					courseDropdown.prop('disabled', false);
				}
			}

			$('#examForm').submit(function(event) {
				event.preventDefault(); // Prevent form submission

				var regNumberInput = $('#regNumber');
				var regNumberError = $('#regNumber');

				// Validate registration number
				var regNumber = regNumberInput.val().trim();

				if (regNumber === '') {
					regNumberInput.addClass('is-invalid');
					regNumberError.text('Please enter a registration number.');
					return;
				}

				var marksInputs = $('input[type="text"][id^="theoryICA"], input[type="text"][id^="practicalICA"], #theoryMarks, #practicalMarks');
				var isValid = true;

				marksInputs.each(function() {
					var marksInput = $(this);
					var marks = marksInput.val().trim();

					if (marks !== '') {
						if (isNaN(marks) || marks < 0 || marks > 100) {
							marksInput.addClass('is-invalid');
							isValid = false;
						} else {
							marksInput.removeClass('is-invalid');
						}
					}
				});

				if (!isValid) {
					return;
				}

				$.ajax({
					type: 'POST',
					url: "validate_registration.php",
					data: {
						regNumber: regNumber // Convert regNumber to string
					},
					success: function(response) {
						response = response.trim(); // Trim leading/trailing whitespace

						if (response == "success") {
							// Registration number is valid, submit the form
							$('#examForm').off('submit').submit();
						} else {
							// Registration number is invalid, display error message
							regNumberInput.addClass('is-invalid');
							regNumberError.text('Invalid registration number.');
						}
					},
					error: function() {
						alert('Error: Failed to validate the registration number.');
					}
				});

			});

			$('#submitButton').click(function() {
				var formData = $('#searchForm').serialize();

				$.ajax({
					type: 'POST',
					url: 'update_database.php',
					data: formData,
					success: function(response) {
						var result = JSON.parse(response);

						if (result.status === 'success') {
							alert(result.message); // Display the success message
						} else {
							alert('Error: ' + result.message); // Display the error message
						}
					},
					error: function() {
						alert('Error: Failed to insert data into the database.');
					}
				});
			});
		});
	</script>
</head>


<body>
	<div class="container mt-3">
		<div class="mt-4 p-5 bg-primary text-white rounded">
			<h3>Exam Details</h3>
		</div>
	</div>

	<?php if ($error !== '') : ?>
		<script>
			$(document).ready(function() {
				alert('<?php echo $error; ?>');
			});
		</script>
	<?php endif; ?>

	<?php if ($success !== '') : ?>
		<script>
			$(document).ready(function() {
				alert('<?php echo $success; ?>');
				location.reload(); // Refresh the page
			});
		</script>
	<?php endif; ?>

	<div class="container mt-3">
		<form id="examForm" method="post" action="update_database.php">
			<div class="mb-3 mt-3">
				<label for="registrationNumber" class="form-label">Registration Number</label>
				<input type="text" class="form-control" id="regNumber" name="regNumber" required>
				<div id="regNumberError" class="invalid-feedback"></div>
			</div>

			<div class="mb-3 mt-3">
				<label for="department" class="form-label">Department</label>
				<select class="form-control" id="department" name="department">
					<option value="1">Physical Science</option>
					<option value="2">Bio Science</option>
				</select>
			</div>

			<div class="mb-3 mt-3">
				<label for="course" class="form-label">Course</label>
				<select class="form-control" id="course" name="course">
					<option value="">Select a course</option>
					<option value="IT">IT</option>
					<option value="Maths">Maths</option>
				</select>
			</div>

			<div class="mb-3 mt-3">
				<label for="yearOfStudy" class="form-label">Year of Study</label>
				<select class="form-control" id="yearOfStudy" name="yearOfStudy">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>

			<div class="mb-3 mt-3">
				<label for="semester" class="form-label">Semester</label>
				<select class="form-control" id="semester" name="semester">
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
			</div>

			<div class="mb-3 mt-3">
				<label for="subjectCode" class="form-label">Subject Code</label>
				<select class="form-control" id="subjectCode" name="subjectCode"></select>
			</div>

			<div class="mb-3 mt-3">
				<label for="theoryICA" class="form-label">Theory In Course Assessment Examination Marks</label>
				<div class="row">
					<div class="col">
						<label for="theoryICA1" class="form-label">ICA 1</label>
						<input type="text" class="form-control" id="theoryICA1" name="theory_ica01_marks">
					</div>
					<div class="col">
						<label for="theoryICA2" class="form-label">ICA 2</label>
						<input type="text" class="form-control" id="theoryICA2" name="theory_ica02_marks">
					</div>
					<div class="col">
						<label for="theoryICA3" class="form-label">ICA 3</label>
						<input type="text" class="form-control" id="theoryICA3" name="theory_ica03_marks">
					</div>
				</div>
			</div>

			<div class="mb-3 mt-3">
				<label for="practicalICA" class="form-label">Practical In Course Assessment Examination Marks</label>
				<div class="row">
					<div class="col">
						<label for="practicalICA1" class="form-label">ICA 1</label>
						<input type="text" class="form-control" id="practicalICA1" name="practical_ica01_marks">
					</div>
					<div class="col">
						<label for="practicalICA2" class="form-label">ICA 2</label>
						<input type="text" class="form-control" id="practicalICA2" name="practical_ica02_marks">
					</div>
					<div class="col">
						<label for="practicalICA3" class="form-label">ICA 3</label>
						<input type="text" class="form-control" id="practicalICA3" name="practical_ica03_marks">
					</div>
				</div>
			</div>

			<div class="mb-3 mt-3">
				<label for="theoryMarks" class="form-label">Theory Examination Marks</label>
				<input type="text" class="form-control" id="theoryMarks" name="theoryMarks">
			</div>

			<div class="mb-3 mt-3">
				<label for="practicalMarks" class="form-label">Practical Examination Marks</label>
				<input type="text" class="form-control" id="practicalMarks" name="practicalMarks">
			</div>

			<div class="mb-3 mt-3">
				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-secondary">Clear</button>
			</div>
		</form>
	</div>
</body>

</html>

<?php
require_once 'footer.php';
?>