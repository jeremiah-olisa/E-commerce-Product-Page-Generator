<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
    require 'config.php';
$record_per_page = 12;
$page = '';
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{
 $page = 1;
}

$start_from = ($page-1)*$record_per_page;

$query = "SELECT * FROM images order by id DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($con, $query);

?>
	<section class="feature-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Featured Listings</h3>
				<p>Browse houses and flats for sale and to rent in your area</p>
			</div>
			<div class="row">
					 <?php
     					while($row = mysqli_fetch_array($result))
     					{
    				 ?>
				<div class="col-lg-4 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="col-12 sale-notic"><?php echo $row["status"]; ?></div>
						<br>
						<?php echo '<div class="feature-pic set-bg" data-setbg="upload/'.$row['name'].'">'; ?>
						<?php echo '<img weight="100%" class="feature-pic set-bg col-md-12 col-12" src="upload/'.$row['name'].'">'; ?>
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<h5><?php echo $row["address"]; ?></h5>
								<p><i class="fa fa-map-marker"></i><?php echo $row["address"]; ?></p>
							</div>
							<div class="room-info-warp">
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-th-large"></i><?php echo $row["size"]; ?> Meters</p>
										<p><i class="fa fa-bed"></i><?php echo $row["bedroom"]; ?> Bedroom(s)</p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-car"></i><?php echo $row["garage"]; ?> Garage(s)</p>
										<p><i class="fa fa-bath"></i><?php echo $row["bathrooms"]; ?> Bathroom(s)</p>
									</div>	
								</div>
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-user"></i><?php echo $row["agent"]; ?></p>
									</div>
									<?php
										$dateposted = $row["dates"]; 
										 $datenow = time(); 
									?>
									<div class="rf-right">
										<p><i class="fa fa-clock-o"></i><?php echo round(( $dateposted - $datenow) / (60 * 60 * - 24)) . " days"; ?></p>
									</div>	
								</div>
							</div>
							<a href="#" class="room-price">₦ <?php echo $row["price"]; ?></a>
						</div>
					</div>
				</div>
				    <?php
     					}
     				?>
			</div>
		</div>
	</section>
 <div align="center">
    <br />
    <?php
    $page_query = "SELECT * FROM images ORDER BY id DESC";
    $page_result = mysqli_query($con, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);
    for ($i=1; $i <= $total_pages ; $i++) {
    	echo '<a href="product.php?page='.$i.'">page '.$i.' </a>';
    }

    
    
    ?>
    </div>
    <br /><br />
<a href=""></a>
</body>
</html>