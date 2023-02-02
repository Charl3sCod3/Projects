
		<section>
			<div class="row">
<!-- 			<div class="col-md-1">
			</div> -->
			<div class="col-md-12">
				<iframe style="margin:auto;" src="https://www.youtube.com/embed/9AWTmFKvQL0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<div class="card">
			<div class="card-header" style="margin: auto;">
				<h4 class="card-title">ACCREDITED FOOD ESTABLISHMENT</h4>
			</div>
			<div class="card-body">
				<div class="row">
					
					<?php
					foreach ($getstablishmentLogo as $key => $value) {
					?>
					<div class="col-md-3 col-sm-12">
						<a href="?q=storeMenu&sd_id=<?php echo $value[0] ?>" >
						<div style="margin-top: 10px;" class="position-relative" style="height: 180px;background-color: transparent !important;border-radius: 15px;overflow: hidden;">
		                      <div class="ribbon-wrapper ribbon-xl">
		                        <div class="ribbon bg-success text-xs">
		                          Click to view store
		                        </div>
		                      </div>
		                     <div id="stablishmentIcon" style="height: 160px;overflow: hidden;position: relative;border-radius: 15px;">
										<?php if(!empty($value[6])): ?>
										<img src="images/<?php echo $value[6] ?>" style="max-width: 100%;max-height: 200px; height: 100%;width: 100%">
										<?php else: ?>
										<img src="images/logo1.png" style="max-width: 100%;max-height: 200px; height: 100%;width: 100%">
										<?php endif ?>
										</div>
								<h6 style="margin: 0px;padding: 5px;font-weight: 700;color: black;text-align: center;"><?php echo $value[1] ?></h6>
		                    </div>
		                   </a>						
					</div>

					<?php } ?>
				</div>
			</div>
		</div>
			</div>
<!-- 			<div class="col-md-1">
			</div> -->
		</div>
		</section>
		<section class="Gallery" style="position: relative;overflow: hidden; height: 20vh">
				<div class="container gallery-wrap">
					<img src="images/beach/lakebababubasilisa.jpg" style="position: absolute;top: 0px;bottom: 0px;left: 0px;width: 100%;opacity: 0.5">
					<h3 style="font-weight: 900;text-align: center;color:black;">BOOK A ROOM AT INSIDE DINAGAT!</h3>
			<div class="row">
				<div class="col-md-8">
					
				</div> 
				<div class="col-md-4">
				<div class="card" style="background-color: #ffffff59;margin-top:25%;">
					<form method="get" action="" enctype="multipart/form-data" >
					<div class="card-body" style="background-color: #ffffff59;">
								<div class="form-group">
									<small>Check In Date</small>
									<input type="date" class="form-control" name="date_start" required="">
								</div>
								<div class="form-group">
									<small>Check Out Date</small>
									<input type="date" class="form-control" name="date_end" required="">
								</div>
								<div class="form-group">
									<small>Number of Persons</small>
									<input type="number" class="form-control" name="num_person" required="">
								</div>
								<div class="form-group">
									<input type="hidden" name="q" value="room_search">
									<small>&nbsp</small>
									<button type="submit" name="" class=" form-control btn btn-success btn-md"><i class="fa fa-search"></i> Search Rooms</button>
								</div>
						
					</div>
								</form>
				</div>  <!--- Card ENd ---->
				</div>
			</div>
		</div>
	</section>
<section class="packages">
	<div class="container">
	<div class="card">
           	 		<div class="card-header">
                 	 	<h1 class="text-title">Packages</h1>
           	 		</div>
           	 	</div>
            
        <div class="row">
		        <?php
		        $today = date("Y-m-d");
		        $sql  = "SELECT * FROM `packagedetails` WHERE `user_packID`=0 ";
		        $query = $con->query($sql);
		        while ($packoom = $query->fetch_array()) {
		          $descStrLen = strlen($packoom['packageDisc']);
		          if ($descStrLen > 500 ) {
		           $packageDisc = substr($packoom['packageDisc'],  0, 500).'. . .';
		          }else{
		            $packageDisc = $packoom['packageDisc'];
		          }
		        ?> 
		        <div class=" col-sm-12 col-xs-12 col-md-6">
		          <div class="card" style="position: relative;">
		            <div class="card-header">
		              <div class="card1-title"><strong  style="font-size: 20px;margin-bottom: 0px;height: 88px;"><?php echo $packoom['packTitle']  ?></strong ><br></div>
		            </div>
		            <div id="packimgcontouter" class="card-body">
		            <?php 
		            	$getimgs = "SELECT * FROM `packageimg` WHERE `package_id`='$packoom[0]' Limit 4";
		            	$imgq = $con->query($getimgs);
		            	$imgnr = $imgq->num_rows;
		            	$i=0;
		            	while ($imgr = $imgq->fetch_array()) {
		            		$i++;
		             ?>
		             <div class="packimgscont">
		             	<img src="tourpackages/<?php echo $imgr[2] ?>" style="width: 100%;">
		             </div>
		         <?php } ?>
		            </div>
		            <div id="packagebody" class="card-body" style="min-height: 420px;z-index: 2;background-color: white;">
		                <div class="wrapper-text">
		                  <p style="font-size:13px;"><?php echo $packageDisc ?></p>
		                  <div class="row">
		                    <div class="col-12">
		                    </div>
		                  </div>
		                </div>
		            </div>
		            <div class="card-footer">
		            	<div class="bg-gray py-2 px-3 " style="width: 100%;display: flex;justify-content: space-between;"> 
		                        <h5 class="mb-0" style="width: 60%;padding: 10px;">
		                         <strong >Price:</strong > ₱<?php echo number_format($packoom['pack_prize'],2) ?>
		                        </h5>
		                        <?php if (isset($user_id) && $position == 4): ?>
		                        	<a href="?q=bookatour&package_id=<?php echo $packoom[0] ?>" class="btn btn-md btn-primary" ><i class="fa fa-book"></i> Book Package</a>
		                        <?php endif ?>
		                      </div>
		            </div>
		          </div>
		        </div>
					 <?php } ?>
		</div>
	</div>
</section>
<section id="gal" class="Gallery">
	<div class="container gallery-wrap">
		<div class="row">
			<div class="col-md-12">
				<div class="text-title py-4 text-center">
					Dinagat Islands Tourist Spot Gallery
				</div>
			</div>
			<!-- Container for the image gallery -->
<!-- 		<div class="col-md-2">
		</div> -->
		<div class="col-md-12">
			<div class="gallery-wrapper" >
				<!-- Full-width images with number text -->
				<div class="mySlides" style="height: 500px;position: relative;position: relative;">
					<div class="numbertext">1 / 6</div>
					<h1 style="z-index: 10;text-align: center;position: absolute;width: 100%;bottom:10px;padding: 10px;background-color: #ffffff61;font-weight: 900;">Campintac Beach</h1>
					<a href="?q=gallery"><img style="z-index: 1;" src="images/beach/1.jpg" class="img-custom-css"></a>
				</div>
				<div class="mySlides" style="height: 500px;position: relative;">
					<div class="numbertext">2 / 6</div>
					<a href="?q=gallery"><img src="images/bitaog.jpg" class="img-custom-css"></a>
					<h1 style="z-index: 10;text-align: center;position: absolute;width: 100%;bottom:10px;padding: 10px;background-color: #ffffff61;font-weight: 900;">Bitaog Beach</h1>
				</div>
				<div class="mySlides" style="height: 500px;position: relative;">
					<div class="numbertext">3 / 6</div>
					<a href="?q=gallery"><img src="images/hinabyan.jpg" class="img-custom-css"></a>
					<h1 style="z-index: 10;text-align: center;position: absolute;width: 100%;bottom:10px;padding: 10px;background-color: #ffffff61;font-weight: 900;">Hinabyan Beach</h1>
				</div>
				<div class="mySlides" style="height: 500px;position: relative;">
					<div class="numbertext">4 / 6</div>
					<a href="?q=gallery"><img src="images/beach/4.jpg" class="img-custom-css"></a>
					<h1 style="z-index: 10;text-align: center;position: absolute;width: 100%;bottom:10px;padding: 10px;background-color: #ffffff61;font-weight: 900;">Tabirayan Beach</h1>
				</div>
				<div class="mySlides" style="height: 500px;position: relative;">
					<div class="numbertext">5 / 6</div>
					<a href="?q=gallery"><img src="images/beach/5.jpg" class="img-custom-css"></a>
					<h1 style="z-index: 10;text-align: center;position: absolute;width: 100%;bottom:10px;padding: 10px;background-color: #ffffff61;font-weight: 900;">LakeBababu Beach</h1>
				</div>
				<div class="mySlides" style="height: 500px;position: relative;">
					<div class="numbertext">6 / 6</div>
					<a href="?q=gallery"><img src="images/23.jpg" class="img-custom-css"></a>
					<h1 style="z-index: 10;text-align: center;position: absolute;width: 100%;bottom:10px;padding: 10px;background-color: #ffffff61;font-weight: 900;">Duyos Beach</h1>
				</div>
				<!-- Next and previous buttons -->
				<a class="prev1" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next1" onclick="plusSlides(1)">&#10095;</a>
				<!-- Image text -->
				<!-- <div class="caption-container">
					<p id="caption">Welcome to dinagat</p>
				</div> -->
				<!-- Thumbnail images -->
					<div class="row" style="padding: 10px;" id="desktopView">
						<div class="column" style="padding: 5px;">
							<img class="gallery-image cursor" src="images/beach/1.jpg" style="width:100%" onclick="currentSlide(1)" alt="">
						</div>
						<div class="column" style="padding: 5px;">
							<img class="gallery-image cursor" src="images/bitaog.jpg" style="width:100%" onclick="currentSlide(2)" alt="">
						</div>
						<div class="column" style="padding: 5px;">
							<img class="gallery-image cursor" src="images/hinabyan.jpg" style="width:100%" onclick="currentSlide(3)" alt="">
						</div>
						<div class="column" style="padding: 5px;">
							<img class="gallery-image cursor" src="images/beach/4.jpg" style="width:100%" onclick="currentSlide(4)" alt="">
						</div>
						<div class="column" style="padding: 5px;">
							<img class="gallery-image cursor" src="images/beach/5.jpg" style="width:100%" onclick="currentSlide(5)" alt="">
						</div>
						<div class="column" style="padding: 5px;">
							<img class="gallery-image cursor" src="images/23.jpg" style="width:100%" onclick="currentSlide(6)" alt="">
						</div>
					</div>
				</div>
			</div>
<!-- 			<div class="col-md-2">
			</div> -->
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="apps-features-wrapper" id="desktopView">
					<img src="images/about-us.jpg" class="img-fluid">
				</div>
			</div>
			<div class="col-md-6">
				<div class="apps-features-main-Lwrapper">
					<div class="apps-features-inner-wrapper">
						<div class="features-title">
							<div class="gtitle">
								What we offer
							</div>
						</div>
						<div class="appFeatures-item-wrapper">
							<div class="appFeatures-item-inner-wrapper">
								<div class="appFeatures-item">
									<div class="image-holder-1 ">
										<i class="bi bi-patch-check-fill fontSize"></i>
									</div>
									<div class="app-item-wrap">
										<div class="app-item-title text-color-red py-2">
											Lowest Budget Spot's
										</div>
										<div class="app-item-info infoText">
											Fare Guarantee
										</div>
									</div>
								</div>
								<div class="appFeatures-item">
									<div class="image-holder-3">
										<i class="bi bi-patch-check-fill fontSize"></i>
									</div>
									<div class="app-item-wrap">
										<div class="app-item-title text-color-green py-2">
											Incredible Deals
										</div>
										<div class="app-item-info infoText">
											Check out with confidence. Priceline members always get our best price.
										</div>
									</div>
								</div>
								<div class="appFeatures-item">
									<div class="image-holder-3">
										<i class="bi bi-patch-check-fill fontSize"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h4 style="text-align: center;margin-top: 1em; background-color: black;font-weight: 700;color:white;padding: 10px;">Services Offered To</h4>
		<div class="row">
			<div class="col-md-4">
				<div style="width: 100%;height: 400px;display: flex;justify-content: center;background-color: black;color:white;border-radius: 30px;">
					<div style="margin: auto;padding: 2em;text-align: justify-all;">
						<h4 style="text-align: center;font-weight: 600;margin-bottom: 1em;">Food Establishments</h4>
						<p >
						We offer online food ordering servies to our Food Establishments partners, by
						advertising their products to our website. <br>
					</p>
					<h5><b style="font-weight: 600;text-align: center;">You prepare the food we will deliver it for you.</b></h5>
					</div>
				</div>
			</div>
		<div class="col-md-4">
				<div style="width: 100%;height: 400px;display: flex;justify-content: center;background-color: black;color:white;border-radius: 30px;">
					<div style="margin: auto;padding: 2em;text-align: justify-all;">
						<h4 style="text-align: center;font-weight: 600;margin-bottom: 1em;">Hotel Establishments</h4>
						<p >
						We offer online Room Booking servies to our Hotel Establishments partners, by
						advertising their rooms to our website. <br>
					</p>
					<h5><b style="font-weight: 600;text-align: center;">Will direct travelers to you're business and you'll Take care of the rest.</b></h5>
					</div>
				</div>
			</div>
		<div class="col-md-4">
				<div style="width: 100%;height: 400px;display: flex;justify-content: center;background-color: black;color:white;border-radius: 30px;">
					<div style="margin: auto;padding: 2em;text-align: justify-all;">
						<h4 style="text-align: center;font-weight: 600;margin-bottom: 1em;">Tour Operator</h4>
						<p >
						We list your Tour Packages and products online, help you process travel booking, <br>
					</p>
					<h5><b style="font-weight: 600;text-align: center;">Will direct travelers to you're business and you'll Take care of the rest.</b></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- <script type="text/javascript">

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("gallery-image");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script> -->