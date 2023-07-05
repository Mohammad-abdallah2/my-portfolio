 <?php
	include("admin/includes/db_config.php");

	$id = $_POST['idget'];
	?>
 <section class="portfolio_area" id="Business-summary">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12">
 				<div class="main_title text-left">
 					<h2>Quality of project work done </h2>
 				</div>
 			</div>
 		</div>
 		<div class="filters portfolio-filter">
 			<ul>
 				<a>
 					<li onclick="showTopic(0)" <?php if ($id == 0) {
													echo ' class="active"';
												} ?>>all</li>
 				</a>
 				<a>
 					<li onclick="showTopic(1)" <?php if ($id == 1) {
													echo ' class="active"';
												} ?>>Projects</li>
 				</a>
 				<a>
 					<li onclick="showTopic(2)" <?php if ($id == 2) {
													echo ' class="active"';
												} ?>>Mysql Database </li>
 				</a>
 				<a>
 					<li onclick="showTopic(3)" <?php if ($id == 3) {
													echo ' class="active"';
												} ?>>Code</li>
 				</a>
 				<a>
 					<li onclick="showTopic(4)" <?php if ($id == 4) {
													echo ' class="active"';
												} ?>>Design</li>
 				</a>
 			</ul>
 		</div>
 		<script>
 			$(document).ready(function() {
 				var commentCount = 3;
 				var idget = "<?php echo $id; ?>";
 				$("#primary_btn4").click(function() {
 					commentCount = commentCount + 3;
 					$("#comments").load("load-comments.php", {
 						commentNewCount: commentCount,
 						idget: idget
 					});
 				});
 			});
 		</script>
 		<div class="filters-content" id="comments">
 			<div class="row portfolio-grid justify-content-center">

 				<?php

					$sql = "SELECT * FROM portfolio where filter= '$id' or all_filter ='$id' limit 3";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) :
						while ($row = mysqli_fetch_assoc($result)) :
							$title = $row['title'];
							$sub_title = $row['sub_title'];

					?>

 						<div class="col-lg-4 col-md-6 all">
 							<div class="portfolio_box">
 								<div class="single_portfolio">
 									<img class="img-fluid mw-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="">
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
 		<button class="primary_btn" id="primary_btn4">Load more</button>
 	</div>
 </section>

 <script>
 	function showTopic(value) {
 		$("#Business-summary").load("load-filter.php", {
 			idget: value
 		});
 	};
 </script>
 <script src="js/theme.js"></script>