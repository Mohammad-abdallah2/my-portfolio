 <?php
	include("admin/includes/db_config.php");

	$commentNewCount = $_POST['commentNewCount'];
	$id = $_POST['idget'];
	?>
 <div class="filters-content">
 	<div class="row portfolio-grid justify-content-center">

 		<?php

			$sql = "SELECT * FROM portfolio where filter= '$id' or all_filter ='$id' limit $commentNewCount";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) :
				while ($row = mysqli_fetch_assoc($result)) :
					$title = $row['title'];
					$sub_title = $row['sub_title'];

			?>

 				<div class="col-lg-4 col-md-6 all">
 					<div class="portfolio_box">
 						<div class="single_portfolio">
 							<img class="img-fluid w-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
 							<div class="overlay"></div>
 							<a href="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="img-gal">
 								<div class="icon">
 									<span class="lnr lnr-cross"></span>
 								</div>
 							</a>
 						</div>
 						<div class="short_info">
 							<h4><a href="portfolio-details.html"><?php echo $title; ?></a></h4>
 							<p><?php echo $sub_title; ?></p>
 						</div>
 					</div>
 				</div>
 			<?php endwhile; ?>
 		<?php endif; ?>
 	</div>
 </div>
 <!--gmaps Js-->
 <script src="js/theme.js"></script>