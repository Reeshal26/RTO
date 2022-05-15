<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add police
if($_POST['submit'])
{
$police_code=$_POST['police_code'];
$police_name=$_POST['police_name'];

$ret="select police_code from police where police_code='".$police_code."'";
$stmt = $mysqli->query($ret);
while($rows = $stmt->fetch_assoc())

    $num=$rows['police_code'];
    if($num!=$police_code){
        $query="insert into  police (police_code,police_name) values(?,?)";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('ss',$police_code,$police_name);
        $stmt->execute();
        echo"<script>alert(' added successfully');</script>";
}
else
{echo"<script>alert('police code = $police_code Already exsist !!!');</script>";

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
	<title>Add police</title>
	<link rel="icon" href="img/sympo.jpg" sizes="17x17">
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
					
						<h2 class="page-title">Add police </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add police</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">police Id </label>
												<div class="col-sm-8">
													<input type="text" pattern="[0-9]{4}"  value="" name="police_code"  class="form-control" required="required" title="4 number only" maxlength="4"> </div>
											</div>
											<!--<div class="form-group">
												<label class="col-sm-2 control-label">Course Name (Short)</label>
												<div class="col-sm-8">
	<input type="text" class="form-control" name="cns" id="cns" value="" required="required">
						 
												</div>
											</div>-->
<div class="form-group">
									<label class="col-sm-2 control-label">police Name(Full)</label>
									<div class="col-sm-8">
									<input type="text" pattern="[A-Za-z]{}" class="form-control" name="police_name" value="" required="required">
												</div>
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