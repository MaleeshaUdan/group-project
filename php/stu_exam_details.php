<?php
    require_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student's Exam Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle the change event of the registration number input
            $('#registrationNumber').on('input', function() {
                var registrationNumber = $(this).val();
                var subjectCodeDropdown = $('#subjectCode');

                // Clear existing options
                subjectCodeDropdown.empty();

                // Populate subject code dropdown dynamically
                $.ajax({
                    type: 'POST',
                    url: 'fetch_subject_codes.php',
                    data: { registrationNumber: registrationNumber },
                    success: function(response) {
                        subjectCodeDropdown.html(response);
                    }
                });
            });

            // Handle the click event of the search button
            $('#searchButton').click(function() {
                var registrationNumber = $('#registrationNumber').val();
                var subjectCode = $('#subjectCode').val();

                // Perform search and populate the form fields with data
                $.ajax({
                    type: 'POST',
                    url: 'fetch_exam_details.php',
                    data: { registrationNumber: registrationNumber, subject_code: subjectCode },
                    success: function(response) {
                        var data = JSON.parse(response);
			            $('#regNumber').val(data.reg_number);
			            $('#department').val(data.department);
                        $('#yearOfStudy').val(data.year_of_study);
			            $('#subjectCode').val(data.subject_code);
                        $('#theoryMarks').val(data.theory_marks);
                        $('#practicalMarks').val(data.practical_marks);
                        $('#theoryICA01Marks').val(data.theory_ica01_marks);
			            $('#theoryICA02Marks').val(data.theory_ica02_marks);
			            $('#theoryICA03Marks').val(data.theory_ica03_marks);
			            $('#practicalICA01Marks').val(data.practical_ica01_marks);
			            $('#practicalICA02Marks').val(data.practical_ica02_marks);
			            $('#practicalICA03Marks').val(data.practical_ica03_marks);
			            $('#theoryGrade').val(data.theory_grade);
			            $('#practicalGrade').val(data.practical_grade);
			            $('#overallGrade').val(data.overall_grade);
			            $('#gpa').val(data.gpa);
                        
                    }
                });

                // Enable the delete button
                $('#deleteButton').prop('disabled', false);
            });

            // Handle the click event of the delete button
            $('#deleteButton').click(function() {
                var registrationNumber = $('#registrationNumber').val();

                if (confirm('Are you sure you want to delete this record?')) {
                    // Perform delete operation
                    $.ajax({
                        type: 'POST',
                        url: 'delete_record.php',
                        data: { registrationNumber: registrationNumber },
                        success: function(response) {
                            // Reset form fields
                            $('#registrationNumber').val('');
                            $('#subjectCode').empty();
                            $('#department').val('');
                            $('#yearOfStudy').val('');
                            $('#theoryMarks').val('');
                            $('#practicalMarks').val('');
                            $('#theoryICA01Marks').val('');
                            $('#theoryICA02Marks').val('');
                            $('#theoryICA03Marks').val('');
                            $('#practicalICA01Marks').val('');
                            $('#practicalICA02Marks').val('');
                            $('#practicalICA03Marks').val('');
                            $('#theoryGrade').val('');
                            $('#practicalGrade').val('');
                            $('#overallGrade').val('');
                            $('#gpa').val('');

                            // Disable the delete button
                            $('#deleteButton').prop('disabled', true);
                        }
                    });
                }
            });

            // Handle the click event of the clear button
            $('#clearButton').click(function() {
                // Clear form fields
                $('#registrationNumber').val('');
                $('#subjectCode').empty();
                $('#department').val('');
                $('#yearOfStudy').val('');
                $('#theoryMarks').val('');
                $('#practicalMarks').val('');
                $('#theoryICA01Marks').val('');
                $('#theoryICA02Marks').val('');
                $('#theoryICA03Marks').val('');
                $('#practicalICA01Marks').val('');
                $('#practicalICA02Marks').val('');
                $('#practicalICA03Marks').val('');
                $('#theoryGrade').val('');
                $('#practicalGrade').val('');
                $('#overallGrade').val('');
                $('#gpa').val('');

                // Disable the delete button
                $('#deleteButton').prop('disabled', true);
            });

        });
        
    </script>
</head>
<body>
    <div class="container mt-3">
        <div class="mt-4 p-5 bg-primary text-white rounded">
            <h3>Student's Exam Details</h3>
        </div>
    </div>
    <div class="container mt-3">
        <form>
            <div class="row g-2">
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" class="form-control" id="registrationNumber" name="registrationNumber" placeholder="Enter the Registration Number Here" required>
                        <label for="registrationNumber" class="form-label visually-hidden">Registration Number</label>
                    </div>
                </div>
                <div class="col-3">
                    <select class="form-control" id="subjectCode" name="subjectCode">
                        <option value="">Select Subject Code</option>
                        <!-- Options will be dynamically added based on the selected registration number -->
                    </select>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary w-100" type="button" id="searchButton">Search</button>
                </div>
                <div class="col-2">
                    <button class="btn btn-danger w-100" type="button" id="deleteButton" disabled>Delete Record</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label for="department" class="form-label">Department:</label>
                    <input type="text" class="form-control" id="department" name="department" readonly>
                </div>
                <div class="col-4">
                    <label for="yearOfStudy" class="form-label">Year of Study:</label>
                    <input type="text" class="form-control" id="yearOfStudy" name="yearOfStudy" readonly>
                </div>
                <div class="col-4">
                    <label for="theoryMarks" class="form-label">Theory Marks:</label>
                    <input type="text" class="form-control" id="theoryMarks" name="theoryMarks" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label for="practicalMarks" class="form-label">Practical Marks:</label>
                    <input type="text" class="form-control" id="practicalMarks" name="practicalMarks" readonly>
                </div>
                <div class="col-4">
                    <label for="theoryICA01Marks" class="form-label">Theory ICA 01 Marks:</label>
                    <input type="text" class="form-control" id="theoryICA01Marks" name="theoryICA01Marks" readonly>
                </div>
                <div class="col-4">
                    <label for="theoryICA02Marks" class="form-label">Theory ICA 02 Marks:</label>
                    <input type="text" class="form-control" id="theoryICA02Marks" name="theoryICA02Marks" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label for="theoryICA03Marks" class="form-label">Theory ICA 03 Marks:</label>
                    <input type="text" class="form-control" id="theoryICA03Marks" name="theoryICA03Marks" readonly>
                </div>
                <div class="col-4">
                    <label for="practicalICA01Marks" class="form-label">Practical ICA 01 Marks:</label>
                    <input type="text" class="form-control" id="practicalICA01Marks" name="practicalICA01Marks" readonly>
                </div>
                <div class="col-4">
                    <label for="practicalICA02Marks" class="form-label">Practical ICA 02 Marks:</label>
                    <input type="text" class="form-control" id="practicalICA02Marks" name="practicalICA02Marks" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label for="practicalICA03Marks" class="form-label">Practical ICA 03 Marks:</label>
                    <input type="text" class="form-control" id="practicalICA03Marks" name="practicalICA03Marks" readonly>
                </div>
                <div class="col-4">
                    <label for="theoryGrade" class="form-label">Theory Grade:</label>
                    <input type="text" class="form-control" id="theoryGrade" name="theoryGrade" readonly>
                </div>
                <div class="col-4">
                    <label for="practicalGrade" class="form-label">Practical Grade:</label>
                    <input type="text" class="form-control" id="practicalGrade" name="practicalGrade" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label for="overallGrade" class="form-label">Overall Grade:</label>
                    <input type="text" class="form-control" id="overallGrade" name="overallGrade" readonly>
                </div>
                <div class="col-4">
                    <label for="gpa" class="form-label">GPA:</label>
                    <input type="text" class="form-control" id="gpa" name="gpa" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <button class="btn btn-secondary w-100" type="button" id="clearButton">Clear</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<br>
<?php
	require_once 'footer.php';
?>
