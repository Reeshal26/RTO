<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
//check_login();
//code for add fine
if($_POST['submit'])
{
$vehicles_no=$_POST['vehicles_no'];
$fine_amount=$_POST['fine_amount'];
$section_no=$_POST['section_no'];


        $ret="select vehicles_no from vehicles where vehicles_no='".$vehicles_no."'";
        $stmt = $mysqli->query($ret);
        while($rows = $stmt->fetch_assoc())
            $numv=$rows['vehicles_no'];
            
        $ret="select * from law where section_no='".$section_no."'";
         $stmt = $mysqli->query($ret);
         while($rows = $stmt->fetch_assoc())
            $nums=$rows['section_no'];
            //$numy=$rows['section_name'];
            
            $ret="select section_name from law where section_name='".$fine_amount."'";
         $stmt = $mysqli->query($ret);
         while($rows = $stmt->fetch_assoc())
            $numf=$rows['section_name'];
    
    if($numv!=$vehicles_no){
             echo"<script>alert('Entered $numv vehicle not registered');</script>";
    }
    else if($nums!=$section_no){
        echo"<script>alert('Entered $nums section number not valid');</script>";
    }
    else if($numf>$fine_amount){
        echo"<script>alert('Entered $numf amount out of bound');</script>";
    }
    
else{

        $query="insert into  fine (vehicles_no,fine_amount,section_no) values(?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('sis',$vehicles_no,$fine_amount,$section_no);
        $stmt->execute();
        
        $ret="select * from vehicles where vehicles_no='".$vehicles_no."'";
        $stmt1 = $mysqli->query($ret);
        while($rows=mysqli_fetch_array($stmt1))
        {
          $num=$rows['mobile_number'];
        }
        echo"<script>alert('message was sent to $num');</script>";
        // //echo $num;
        
        // 	// Account details
        // 	$username = "thikkar40@gmail.com";
        // 	$hash = "7bbe78b61f527fdf0c0f5f117ebd5c35ede1882b9149f275a532ec15b0778978";
        // 	$apiKey = "RgVS1owcGsM-X2N4pz9DKPIGFeEQGpDF1bRYmybOlJ";
        // //	$a='918970093125';
        // 	// Message details
        // 	$numbers = array($num);
        // 	$sender = urlencode('TXTLCL');
        // 	$message = rawurlencode('YOUR '.$vehicles_no.' VEHICLE GOT FINE!!!');
         
        // 	$numbers = implode(',', $numbers);
         
        // 	// Prepare data for POST request
        // 	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
         
        // 	// Send the POST request with cURL
        // 	$ch = curl_init('https://api.textlocal.in/send/');
        // 	curl_setopt($ch, CURLOPT_POST, true);
        // 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 	$response = curl_exec($ch);
        // 	curl_close($ch);
        	
        // 	// Process your response here
        // 	//echo $response;
        
        	 
        	 echo"<script>alert('fine added successfully');</script>";
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
	<title>rise fine</title>
	<link rel="icon" href="img/mtr.jpg" sizes="16x16">
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
					
						<h2 class="page-title">Add fine </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">fine</div>
									<div class="panel-body">
									
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
											<div id="zctb_filter" class="dataTables_filter">
												<label class="col-sm-2 control-label">vehicle_no</label>
												<div class="col-sm-8">
												<input type="text" pattern="[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}" name="vehicles_no" class="form-control " placeholder="vehicle_no" required="required" maxlength="10"> </div>

												<!--<div class="col-sm-8">
													<input type="search"  name="cc"  class="form-control input-sm" aria-controls="zctb" required="required">
													<input type="search" class="form-control input-sm" placeholder="" aria-controls="zctb">-->		

											
										</div>	</div>
																								<!--<div class="form-group">
												<label class="col-sm-2 control-label">Course Name (Short)</label>
												<div class="col-sm-8">
	<input type="text" class="form-control" name="cns" id="cns" value="" required="required">
						 
												</div>
											</div>-->
<div class="form-group">
									<label class="col-sm-2 control-label">section_no </label>
											<div class="col-sm-8">
											
									<input type="text" class="form-control" name="section_no" value="" placeholder="section_no" required="required" >
												</div>
												</div>
												<!--noting-->
												<div class="form-group">
									<label class="col-sm-2 control-label">fine_amount</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="fine_amount" placeholder="fine amount" value="" required="required" maxlength="4">
												</div>
											</div>



												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Add">
												</div>
											</div>
											
</form>											
										

										
																<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>vehicles no </th>
											<th>owner Name</th>
											<th>mobile no</th>
											
											<!--<th>room no  </th>
											<th>Seater </th>
											<th>Staying From </th>-->
											<th></th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>vehicles no </th>
											<th>owner Name</th>
											<th>mobile no</th>
											
											<!--<th>Room no  </th>
											<th>Seater </th>
											<th>Staying From </th>
											<th>Action</th>-->
										</tr>
									</tfoot>
									<tbody>
<?php	
//$aid=$_SESSION['id'];
$ret="select * from vehicles";
$stmt= $mysqli->query($ret) ;
//$stmt->bind_param('i',$aid);
//$stmt->execute() ;//ok
//$res=$stmt->get_result();
$cnt=1;
while($row=$stmt->fetch_assoc())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>

<td><?php echo $row['vehicles_no'];?></td>
<td><?php echo $row['owner_name'];?></td>
<td><?php echo $row['mobile_number'];?></td>

<td>
<!--<a href="javascript:void(0);"  onClick="popUpWindow('http://localhost/hostel/admin/full-profile.php?id=<?php echo $row->id;?>');" title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;-->
<!--<a href="vehicledetais.php?del=<?php echo $row->id;?>" title="Delete Record" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>-->
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>
										

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
