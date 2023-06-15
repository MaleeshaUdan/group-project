<?php

	require_once 'header.php';

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
    // Disable the delete button on page load
    $('#deleteButton').prop('disabled', true);

    var yearOfStudyDropdown = $('#yearOfStudy');
    var semesterDropdown = $('#semester');
    var subjectCodeDropdown = $('#subjectCode');

    yearOfStudyDropdown.change(function() {
        updateSubjectCodes();
    });

    semesterDropdown.change(function() {
        updateSubjectCodes();
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


    $('#searchForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'exam_detailsfunct.php',
            data: formData,
            success: function(response) {
                if (response == 'error') {
                    alert('Error: No records found.');
                    $('input[type="text"]').val('');

                    // Disable the delete button if no record is found
                    $('#deleteButton').prop('disabled', true);
                } else {
                    var result = JSON.parse(response);
                    $('#regNumber').val(result.reg_number);
                    $('#department').val(result.department);
                    $('#yearOfStudy').val(result.year_of_study);
                    $('#subjectCode').val(result.subject_code);
                    $('#subjectName').val(result.subject_name);
                    $('#theoryMarks').val(result.theory_marks);
                    $('#practicalMarks').val(result.practical_marks);
                    $('#ica01Marks').val(result.ica01_marks);
                    $('#ica02Marks').val(result.ica02_marks);
                    $('#ica03Marks').val(result.ica03_marks);
                    $('#theoryGrade').val(result.theory_grade);
                    $('#practicalGrade').val(result.practical_grade);
                    $('#overallGrade').val(result.overall_grade);
                    $('#gpa').val(result.gpa);

                    // Enable the delete button if a record is found
                    $('#deleteButton').prop('disabled', false);
                }
            },
            error: function() {
                alert('Error: Failed to search the database.');
            }
        });
    });

    // Handle the click event of the delete button
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
                    $('#deleteButton').prop('disabled', true);
                },
                error: function() {
                    alert('Error: Failed to delete the record.');
                }
            });
        } else {
            $('#searchForm')[0].reset();
            $('input[type="text"]').val('');
            $('input[type="email"]').val('');
            $('#deleteButton').prop('disabled', true);
        }
    });
});

</script>

<!DOCTYPE html>
<html>
<head>
    <title>Exam Details</title>
</head>
<body>
    <div class="container mt-3">
        <div class="mt-4 p-5 bg-primary text-white rounded">
            <h3>Exam Details</h3>    
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
                    <button class="btn btn-primary w-100" type="submit">Search</button>
                 </div>
                 <div class="col-2">
                    <button class="btn btn-danger w-100" type="button" id="deleteButton">Delete Record</button>
                </div>
                <form id="deleteForm" action="javascript:void(0);" method="post">
                    <input type="hidden" id="registrationNumber" name="registrationNumber">
                </form>
            </div>
			<div class="mb-3 mt-3">
                <label for="studentName" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="studentName" name="studentName" disabled>
            </div>

            <div class="mb-3 mt-3">
                <label for="regNumber" class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="regNumber" name="regNumber" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="yearOfStudy" class="form-label">Year of Study</label>
                <input type="text" class="form-control" id="yearOfStudy" name="yearOfStudy" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" class="form-control" id="semester" name="semester" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="subjectCodePractical" class="form-label">Subject Code (Practical)</label>
                <input type="text" class="form-control" id="subjectCodePractical" name="subjectCodePractical" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="ica01MarksPractical" class="form-label">ICA 1 Marks (Practical)</label>
                <input type="text" class="form-control" id="ica01MarksPractical" name="ica01MarksPractical" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="ica02MarksPractical" class="form-label">ICA 2 Marks (Practical)</label>
                <input type="text" class="form-control" id="ica02MarksPractical" name="ica02MarksPractical" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="ica03MarksPractical" class="form-label">ICA 3 Marks (Practical)</label>
                <input type="text" class="form-control" id="ica03MarksPractical" name="ica03MarksPractical" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="subjectCodeTheory" class="form-label">Subject Code (Theory)</label>
                <input type="text" class="form-control" id="subjectCodeTheory" name="subjectCodeTheory" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="ica01MarksTheory" class="form-label">ICA 1 Marks (Theory)</label>
                <input type="text" class="form-control" id="ica01MarksTheory" name="ica01MarksTheory" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="ica02MarksTheory" class="form-label">ICA 2 Marks (Theory)</label>
                <input type="text" class="form-control" id="ica02MarksTheory" name="ica02MarksTheory" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="ica03MarksTheory" class="form-label">ICA 3 Marks (Theory)</label>
                <input type="text" class="form-control" id="ica03MarksTheory" name="ica03MarksTheory" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="overallICAMarks" class="form-label">Overall ICA Marks</label>
                <input type="text" class="form-control" id="overallICAMarks" name="overallICAMarks" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="theoryMarks" class="form-label">Theory Marks</label>
                <input type="text" class="form-control" id="theoryMarks" name="theoryMarks" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="practicalMarks" class="form-label">Practical Marks</label>
                <input type="text" class="form-control" id="practicalMarks" name="practicalMarks" disabled>
            </div>
            
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</body>
</html>
