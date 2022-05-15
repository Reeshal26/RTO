<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add law
if($_POST['submit'])
{
$section_no=$_POST['section_no'];
$section_name=$_POST['section_name'];
$section_details=$_POST['section_details'];

$ret="select section_no from law where section_no='".$section_no."'";
$stmt = $mysqli->query($ret);
//while($rows=$stmt1->fetch_assoc())
//while($rows=mysqli_fetch_array($stmt))
//while ($rows=mysqli_fetch_row($stmt))
while($rows = $stmt->fetch_assoc())
//{
	  
   $num=$rows['section_no'];
  // echo"<script>alert('$num');</script>";
    if($num!=$section_no){
        $query="insert into  law (section_no,section_name,section_details) values(?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('sss',$section_no,$section_name,$section_details);
        $stmt->execute();
        echo"<script>alert('law added successfully');</script>";  }
  else
          {echo"<script>alert('section no = $section_no Already exsist !!!');</script>";

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
	<title>Add new laws</title>
	<link rel="icon" href="img/govt.jpg" sizes="16x16">
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
					
						<h2 class="page-title">Add law </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add laws</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">section_no </label>
												<div class="col-sm-8">
													<input type="text" value="" name="section_no"  class="form-control" required="required"> </div>
											</div>
											<!--<div class="form-group">
												<label class="col-sm-2 control-label">Course Name (Short)</label>
												<div class="col-sm-8">
	<input type="text" class="form-control" name="cns" id="cns" value="" required="required">
						 
												</div>
											</div>-->
<div class="form-group">
									<label class="col-sm-2 control-label">maximum penalty </label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="section_name" value="" required="required" maxlength="4">
												</div>
												</div>
												<!--noting-->
												<div class="form-group">
									<label class="col-sm-2 control-label">section_details</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="section_details" value="" required="required">
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