<?php
require_once 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <style>
        .tile {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .tile:hover {
            transform: scale(1.05);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

		a {
            text-decoration: none !important;
            color: white;
        }

        .group-container {
            border: 2px double blue;
            padding: 15px;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="group-container">
            <h2>Student</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="add_stu.php">
                        <div class="card tile bg-primary text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Add Student</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="stu_details.php">
                        <div class="card tile bg-success text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Student's Details</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="allStudents.php">
                        <div class="card tile bg-info text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">All Students' Details</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="group-container">
            <h2>Exam</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="exam_details.php">
                        <div class="card tile bg-warning text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Add Exam Details</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="stu_exam_details.php">
                        <div class="card tile bg-danger text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Student's Exam Details</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="all_stu_details.php">
                        <div class="card tile bg-secondary text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">All Students' Exam Details</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="group-container">
            <h2>Academic Staff</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="add_lec.php">
                        <div class="card tile bg-primary text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Add Staff</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="lec_details.php">
                        <div class="card tile bg-success text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Staff Details</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="group-container">
            <h2>Non-Academic Staff</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="add_nonAcStf.php">
                        <div class="card tile bg-info text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Add Non-Academic Staff</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="stf_details.php">
                        <div class="card tile bg-warning text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Non-Academic Staff Details</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="group-container">
            <h2>Subjects</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="subjects.php">
                        <div class="card tile bg-danger text-white rounded">
                            <div class="card-body">
                                <h3 class="card-title">Subjects</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>
