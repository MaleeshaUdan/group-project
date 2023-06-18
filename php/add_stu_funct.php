<?php

    require 'dbconfig.php';

        $full_name = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
            $full_name = strtoupper($full_name);//convert to capital letters
        $sname = filter_input(INPUT_POST, 'sname', FILTER_SANITIZE_STRING);
            $sname = strtoupper($sname);//convert to capital letters
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
            $address=strtoupper($address);//convert to capital letters
        $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
        $nic = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_STRING);
            $nic = strval($nic); //  integers are not changing
            $nic = str_replace('v', 'V', $nic); // replace any 'v' characters with 'V'
        $faculty = filter_input(INPUT_POST, 'faculty', FILTER_SANITIZE_STRING);
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
        $academic_year = filter_input(INPUT_POST, 'academicYear', FILTER_SANITIZE_STRING);
        $reg_number = filter_input(INPUT_POST, 'regNo', FILTER_SANITIZE_STRING);
           if (preg_match('/[a-z]/', $reg_number)) {
            // Convert lower case letters to uppercase
            $reg_number = strtoupper(preg_replace('/[a-z]/', '$0', $reg_number));
        }

        $date_of_admission = filter_input(INPUT_POST, 'dateOfAdmission', FILTER_SANITIZE_STRING);

        $sql="SELECT * FROM student WHERE nic='$nic' OR email='$email' OR reg_number='$reg_number'";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)) {
            echo "<script>alert('Error: User Already Exists (NIC or Email or Registration Number can not be same).')</script>";
            echo "<script>window.location = 'add_stu.php'</script>";
        }
        else{
            $sql="INSERT INTO student VALUES('$nic','$full_name','$sname','$gender','$address','$dob','$email','$telephone','$faculty','$department','$academic_year','$reg_number','$date_of_admission')";
            if (mysqli_query($conn,$sql)) {
                echo "<script>alert('Student added successfully.')</script>";
                echo "<script>window.location = 'add_stu.php'</script>";
            }
            else{
                echo "<script>alert('Error: Record Not Saved')</script>";
                echo "<script>window.location = 'add_stu.php'</script>";    
            }
        }

        $conn->close();
        
?>