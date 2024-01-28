  <?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$databasename = 'sms_db';
	
	$conn = new mysqli($hostname, $username, $password, $databasename);
	if($conn->connect_error){
		die("Connection faild: " .$conn-connect_error);
	}


	$sql = "SELECT * FROM product";
	$query = $conn->query($sql);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Report | Stock Management System</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<script>
			function printPage()
			{
			  var printStyle = document.querySelector("style");
			  
			  var printBox = document.querySelector("#printBox");
			  var printWidndow = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
			  printWidndow.document.write("<style>"+printStyle.innerHTML+"</style>"+printBox.innerHTML);
			  printWidndow.document.close();
			  printWidndow.focus();
			  printWidndow.print();
			  printWidndow.close();
			}
		</script>
  </head>
	</head>
	
	<body>
				
		<div class="container-foluid">
			<div class="row">
				<div class="col-sm-3">
					
				</div>
				<div class="col-sm-6">
					<div id='report_content'>
						<h1 class="text-center">Data List</h1>
						<table class="table table-success">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">Name</th>
							  <th scope="col">Code</th>
							  <th scope="col">Entry Date</th>
							</tr>
						  </thead>
						  <tbody>
							<?php
								while($row = $query->fetch_assoc()){
									$product_id = $row['product_id'];
									$product_name = $row['product_name'];
									$product_code = $row['product_code'];
									$product_entry_date = $row['product_entry_date'];
								
							?>
							<tr>
							  <td><?php echo $product_id ?></th>
							  <td><?php echo $product_name ?></td>
							  <td><?php echo $product_code ?></td>
							  <td><?php echo $product_entry_date ?></td>
							</tr>
								<?php } ?>
						  </tbody>
						</table>
					</div><!-- report print -->
				</div>
				<div class="col-sm-3">
					
				</div>
			</div>
		</div><!-- end of container-foluid -->
		
		</div>
		<script>
			window.addEventListener("load", window.print());
		</script>
	</body>
</html>
