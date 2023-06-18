<?php
require_once 'dbconfig.php'; // Include the file containing database connection details
require_once 'header.php';

// Fetch distinct departments from the exams table
$departmentQuery = "SELECT DISTINCT department FROM exams";
$departmentResult = mysqli_query($conn, $departmentQuery);

// Fetch distinct subject types (courses) from the exams table
$courseQuery = "SELECT DISTINCT subject_type FROM exams";
$courseResult = mysqli_query($conn, $courseQuery);

// Fetch distinct semesters from the exams table
$semesterQuery = "SELECT DISTINCT semester FROM exams";
$semesterResult = mysqli_query($conn, $semesterQuery);

// Fetch distinct years of study from the exams table
$yearQuery = "SELECT DISTINCT year_of_study FROM exams";
$yearResult = mysqli_query($conn, $yearQuery);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Exam Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch and populate dropdown options
            var departmentOptions = '<option value="">Select Department</option>';
            var courseOptions = '<option value="">Select Course</option>';
            var semesterOptions = '<option value="">Select Semester</option>';
            var yearOptions = '<option value="">Select Year of Study</option>';

            <?php while ($row = mysqli_fetch_assoc($departmentResult)) { ?>
                departmentOptions += '<option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>';
            <?php } ?>

            <?php while ($row = mysqli_fetch_assoc($courseResult)) { ?>
                courseOptions += '<option value="<?php echo $row['subject_type']; ?>"><?php echo $row['subject_type']; ?></option>';
            <?php } ?>

            <?php while ($row = mysqli_fetch_assoc($semesterResult)) { ?>
                semesterOptions += '<option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>';
            <?php } ?>

            <?php while ($row = mysqli_fetch_assoc($yearResult)) { ?>
                yearOptions += '<option value="<?php echo $row['year_of_study']; ?>"><?php echo $row['year_of_study']; ?></option>';
            <?php } ?>

            $('#department').html(departmentOptions);
            $('#course').html(courseOptions);
            $('#semester').html(semesterOptions);
            $('#yearOfStudy').html(yearOptions);

            // Handle the click event of the search button
            $('#searchButton').click(function() {
                var department = $('#department').val();
                var course = $('#course').val();
                var semester = $('#semester').val();
                var yearOfStudy = $('#yearOfStudy').val();

                // Perform search and populate the table with data
                $.ajax({
                    type: 'POST',
                    url: 'fetch_all_stu.php',
                    data: {
                        department: department,
                        course: course,
                        semester: semester,
                        yearOfStudy: yearOfStudy
                    },
                    success: function(response) {
                        $('#studentsTable').html(response);
                    }
                });
            });

            // Handle the click event of the clear button
            $('#clearButton').click(function() {
                // Clear form fields
                $('#department').val('');
                $('#course').val('');
                $('#semester').val('');
                $('#yearOfStudy').val('');
                $('#studentsTable').empty();
            });

            // Handle the click event of the export button
            $('#exportButton').click(function() {
                // Get table data as an array of arrays
                var tableData = [];
                $('#studentsTable tr').each(function(row, tr) {
                    var rowData = [];
                    $(tr).find('td').each(function(col, td) {
                        rowData.push($(td).text());
                    });
                    tableData.push(rowData);
                });

                // Get table headers
                var tableHeaders = [];
                $('#studentsTable th').each(function() {
                    tableHeaders.push($(this).text());
                });

                // Insert table headers at the beginning of the table data
                tableData.unshift(tableHeaders);

                // Convert table data to CSV format
                var csvContent = "data:text/csv;charset=utf-8,";
                tableData.forEach(function(rowArray) {
                    var row = rowArray.join(",");
                    csvContent += row + "\r\n";
                });

                // Create a temporary download link and trigger the download
                var encodedUri = encodeURI(csvContent);
                var link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "exam_details.csv");
                document.body.appendChild(link);
                link.click();
            });
        });
    </script>
</head>

<body>
    <div class="container mt-3">
        <div class="mt-4 p-5 bg-primary text-white rounded">
            <h3>All Students' Exam Details</h3>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row g-2">
            <div class="col-3">
                <select class="form-control" id="department" name="department">
                    <option value="">Select Department</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control" id="course" name="course">
                    <option value="">Select Course</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control" id="yearOfStudy" name="yearOfStudy">
                    <option value="">Select Year of Study</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control" id="semester" name="semester">
                    <option value="">Select Semester</option>
                </select>
            </div>

            <div class="col-2">
                <button class="btn btn-primary w-100" type="button" id="searchButton">Search</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <button class="btn btn-secondary w-100" type="button" id="clearButton">Clear</button>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Registration Number</th>
                    <th>Department</th>
                    <th>Year of Study</th>
                    <th>Theory Marks</th>
                    <th>Practical Marks</th>
                    <th>Theory ICA 01 Marks</th>
                    <th>Theory ICA 02 Marks</th>
                    <th>Theory ICA 03 Marks</th>
                    <th>Practical ICA 01 Marks</th>
                    <th>Practical ICA 02 Marks</th>
                    <th>Practical ICA 03 Marks</th>
                    <th>Theory Grade</th>
                    <th>Practical Grade</th>
                    <th>Overall Grade</th>
                    <th>GPA</th>
                </tr>
            </thead>
            <tbody id="studentsTable">
                <!-- Table rows will be dynamically added based on search results -->
            </tbody>
        </table>
        <br>
        <div class="text-center">
            <button class="btn btn-primary" id="exportButton">Export as CSV</button>
        </div>
    </div>
</body>

</html>
<?php
require_once 'footer.php';
?>
