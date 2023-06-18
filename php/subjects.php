<?php
	require_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subjects</title>
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
		    $('#subjectsform').submit(function(e) {
		        e.preventDefault();
		        var year = $('#year').val();
		        var semester = $('#semester').val();
		        $.ajax({
		            type: "POST",
		            url: "getSubjects.php",
		            data: { year: year, semester: semester },
		            dataType: "json",
		            success: function(data) {
		                var table = $('<table>').addClass('table');
		                var thead = $('<thead>').appendTo(table);
		                var tr = $('<tr>').appendTo(thead);
		                $('<th>').text('Subject Code').appendTo(tr);
		                $('<th>').text('Subject Name').appendTo(tr);
		                $('<th>').text('Credits').appendTo(tr);
		                

		                var tbody = $('<tbody>').appendTo(table);
		                $.each(data, function(i, item) {
		                    tr = $('<tr>').appendTo(tbody);
		                    $('<td>').text(item.subject_code).appendTo(tr);
		                    $('<td>').text(item.subject_name).appendTo(tr);
		                    $('<td>').text(item.number_of_credits).appendTo(tr);
		                });

		                $('#result').html(table);
		            }
		        });
		    });
		});
	</script>
</head>
<body>
	<div class="container">
		<form id="subjectsform" method="post">
			<div class="row">
			    <div class="col-md-6 mb-3 mt-3">
			        <label for="year" class="form-label was-validated">Year of Study</label>
			        <select class="form-select" id="year" name="year" required>
			            <option value="" selected disabled hidden>Select Year</option>
			            <option value="1">First Year</option>
			            <option value="2">Second Year</option>
			            <option value="3">Third Year</option>
			            <option value="4">Fourth Year</option>
			        </select>
			    </div>
			    <div class="col-md-6 mb-3 mt-3">
			        <label for="semester" class="form-label was-validated">Semester</label>
			        <select class="form-select" id="semester" name="semester" required>
			            <option value="" selected disabled hidden>Select Semester</option>
			            <option value="1">First Semester</option>
			            <option value="2">Second Semester</option>
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

