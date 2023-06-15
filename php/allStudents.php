<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Students</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	 <style>
		body {
			height: 1000px;
			
		}
		#footer {
			position: fixed;
			bottom: 0;
			width: 100%;
			height: 100px;
			background-color: #f5f5f5;
			transition: all 0.5s ease-in-out; 
		}
		#footer.hidden {
			transform: translateY(70px); 
		}
	</style>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
    $(document).ready(function() {
        $('#studentsform').submit(function(e) {
            e.preventDefault();
            var year = $('#acyear').val();
            var faculty = $('#faculty').val();
            $.ajax({
                type: "POST",
                url: "getAllStudents.php",
                data: { year: year, faculty: faculty },
                dataType: "json",
                success: function(data) {
                    var table = $('<table>').addClass('table');
                    var thead = $('<thead>').appendTo(table);
                    var tr = $('<tr>').appendTo(thead);
                    $('<th>').text('Registration Number').appendTo(tr);
                    $('<th>').text('Name With Initials').appendTo(tr);
                    $('<th>').text('Department').appendTo(tr);
                    $('<th>').text('Date of Admission').appendTo(tr);

                    var tbody = $('<tbody>').appendTo(table);
                    if (data.length === 0) {
                        $('<tr>').append($('<td colspan="4">').text('No Records Found')).appendTo(tbody);
                    } else {
                        $.each(data, function(i, item) {
                            tr = $('<tr>').appendTo(tbody);
                            $('<td>').text(item.reg_number).appendTo(tr);
                            $('<td>').text(item.sname).appendTo(tr);
                            $('<td>').text(item.department).appendTo(tr);
                            $('<td>').text(item.date_of_admission).appendTo(tr);
                        });
                    }

                    $('#result').html(table);
                }
            });
        });
    });
</script>

</head>
<body>
	<div class="container">
		<form id="studentsform" method="post">
			<div class="row">
			    <div class="col-md-6 mb-3 mt-3">
			        <label for="acyear" class="form-label was-validated">Academic Year</label>
			        <select class="form-select" id="acyear" name="acyear" required>
			        		<option value="" selected disabled hidden>Select Academic Year</option>
			            	<option value="2018/2019">2018/2019</option>
					        <option value="2019/2020">2019/2020</option>
					        <option value="2020/2021">2020/2021</option>
					        <option value="2021/2022">2021/2022</option>
					        <option value="2022/2023">2022/2023</option>
					        <option value="2023/2024">2023/2024</option>
					        <option value="2024/2025">2024/2025</option>
					        <option value="2025/2026">2025/2026</option>
					        <option value="2026/2027">2026/2027</option>
					        <option value="2027/2028">2027/2028</option>
					        <option value="2028/2029">2028/2029</option>
					        <option value="2029/2030">2029/2030</option>
			        </select>
			    </div>
			    <div class="col-md-6 mb-3 mt-3">
			        <label for="faculty" class="form-label was-validated">Faculty</label>
			        <select class="form-select" id="faculty" name="faculty" required>
			            <option value="" selected disabled hidden>Select the Faculty</option>
			            <option value="Applied Science">Applied Science</option>
			        </select>
			    </div>
			    <div class="col-12 mb-3 mt-3">
			        <button type="submit" class="btn btn-primary">Show</button>
			    </div>
			</div>

		</form>	
		<div id="result"></div>
		
	</div>
</body>
</html>
<br/>
<footer id="footer">
    <?php
    require_once 'footer.php';
    ?>
</footer>

