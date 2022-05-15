<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add vehicle


if($_POST['submit'])
{
$owner_name=$_POST['owner_name'];
$vehicles_no=$_POST['vehicles_no'];
$mobile_number=$_POST['mobile_number'];

$ret="select vehicles_no from vehicles where vehicles_no='".$vehicles_no."'";
$stmt = $mysqli->query($ret);
while($rows = $stmt->fetch_assoc())

    $num=$rows['vehicles_no'];
    if($num!=$vehicles_no){

$query="insert into  vehicles (owner_name,vehicles_no,mobile_number) values(?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssi',$owner_name,$vehicles_no,$mobile_number);
$stmt->execute();
echo"<script>alert('vehicles added successfully');</script>";
}
 else
          {echo"<script>alert('vehicle no = $vehicles_no Already exsist !!!');</script>";

}
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Add new vehicles</title>
	<link rel="icon" href="img/rcar.jpg" sizes="16x16">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add vehicle </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add vehicle</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">owner_name </label>
												<div class="col-sm-8">
													<input type="text" value="" name="owner_name"  class="form-control" required="required"> </div>
											</div>
											<!--<div class="form-group">
												<label class="col-sm-2 control-label">Course Name (Short)</label>
												<div class="col-sm-8">
	<input type="text" class="form-control" name="cns" id="cns" value="" required="required">
						 
												</div>
											</div>-->
<div class="form-group">
									<label class="col-sm-2 control-label">vehicles_number</label>
									<div class="col-sm-8">
									<input type="text" pattern="[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}" class="form-control" name="vehicles_no" value="" class="text-uppercase text-sm" title="AND please use CAPITAL LETTER" required="required" maxlength="10">
												</div>
											</div>
												<div class="form-group">
												<label class="col-sm-2 control-label">mobile_number </label>
												<div class="col-sm-8">
													<input type="text" pattern="[789][0-9]{9}" value="" name="mobile_number"  class="form-control" title="Phone number start with 7-9 and remaing 9 digit with 0-9" required="required" maxlength="10">  </div>
											</div>



												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Add">
												</div>
											</div>

										</form>

									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</script>
</body>

</html>