<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['library']))
{
 header('location:index.php');
}
else{
?>
<?php
include('connect.php');
if(isset($_POST['submit']))
{
$sql=mysqli_query($connection,"SELECT password FROM  library where password='".$_POST['cpass']."' && username='".$_SESSION['library']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($connection,"update library set password='".$_POST['npass']."' where username='".$_SESSION['libraryrec']."'");
$_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
}
}

// echo "SELECT userpass FROM  faculty where password='".$_POST['cpass']."' && username='".$_SESSION['faculty']."'";
?>




<!DOCTYPE html>
<html lang="zxx">
    
   <head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php include "head.php" ?>
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.npass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npass.focus();
return false;
}
else if(document.chngpwd.cfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cfpass.focus();
return false;
}
else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cfpass.focus();
return false;
}
return true;
}
</script>
   </head>
   <body>
<?php include('navbar.php');?>
			<div class="app-content">



				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">library | Change Password</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>library</span>
									</li>
									<li class="active">
										<span>Change Password</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">

									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Change Password</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>
													<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="exampleInputEmail1">
																Current Password
															</label>
							<input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password">
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																New Password
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="New Password">
														</div>

<div class="form-group">
															<label for="exampleInputPassword1">
																Confirm Password
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password">
														</div>



														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>

											</div>
										</div>
									<div class="col-lg-12 col-md-12"> 
											<div class="panel panel-white">


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->






						<!-- end: SELECT BOXES -->

					</div>
				</div>
			</div>

    <?php include "footer.php"; ?>
    <script>
       // Row Toggler
       $('#foo-row-toggler').footable();

       // Accordion
       $('#foo-accordion').footable().on('footable_row_expanded', function(e) {
        $('#foo-accordion tbody tr.footable-detail-show').not(e.row).each(function() {
          $('#foo-accordion').data('footable').toggleDetail(this);
        });
       });
       // Filtering
       var filtering = $('#foo-filtering');
       filtering.footable().on('footable_filtering', function (e) {
        var selected = $('#foo-filter-status').find(':selected').val();
        e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
        e.clear = !e.filter;
       });

       // Filter status
       $('#foo-filter-status').change(function (e) {
        e.preventDefault();
        filtering.trigger('footable_filter', {filter: $(this).val()});
       });

       // Search input
       $('#foo-search').on('input', function (e) {
         
        e.preventDefault();
        filtering.trigger('footable_filter', {filter: $(this).val()});
        
       });

    </script>
   </body>
</html>
<?php
}
?>
