<?php
require_once 'dbconfig.php';

if (isset($_POST['registrationNumber'])) {
    $registrationNumber = $_POST['registrationNumber'];
    
    $query = "SELECT subject_code FROM exams WHERE reg_number = '$registrationNumber'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $subjectCodes = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (empty($subjectCodes)) {
            echo '<option value="">No subject codes found</option>';
        } else {
            $options = '<option value="">Select Subject Code</option>';

            foreach ($subjectCodes as $subjectCode) {
                $options .= '<option value="' . $subjectCode['subject_code'] . '">' . $subjectCode['subject_code'] . '</option>';
            }

            echo $options;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

