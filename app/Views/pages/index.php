<!-- slider_area_start -->
<div class="slider_area">
	<div class="single_slider  d-flex align-items-center slider_bg_1">
		<div class="container">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?= base_url()?>assets/img/logo2.png" alt="First slide" style="width: 1000px;height: 400px !important;">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?= base_url()?>assets/img/logo2.png" alt="Second slide" style="width: 1000px;height: 400px !important;">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?= base_url()?>assets/img/logo2.png" alt="Third slide"style="width: 1000px;height: 400px !important;">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<div class="row align-items-center">
				<div class="col-xl-10 offset-xl-1">
					<div class="slider_text text-center justify-content-center">
						<h3 style="margin-top: 30px;">Find your best Property</h3>
<!--						<p>Esteem spirit temper too say adieus who direct esteem.</p>-->
					</div>
					<div class="property_form">
						<form action="#">
							<div class="row">
								<div class="col-xl-12">
									<div class="form_wrap d-flex">
<!--										<div class="single-field max_width ">-->
<!--											<label for="#">Location</label>-->
<!--											<select class="wide" >-->
<!--												<option data-display="NewYork">Kigali</option>-->
<!--												<option value="1">Gisenyi</option>-->
<!--												<option value="2">M</option>-->
<!--											</select>-->
<!--										</div>-->
										<div class="single-field max_width " style="margin-left: 150px !important;">
											<label for="#">Property type</label>
											<select class="wide" >
												<option data-display="Apartment">Car</option>
												<option value="1">Car</option>
												<option value="2">House</option>
											</select>
										</div>
										<div class="single_field range_slider">
											<label for="#">Price (rwf)</label>
											<div id="slider"></div>
										</div>
										<div class="single-field min_width ">
											<label for="#">House</label>
											<select class="wide" >
												<option data-display="01">01</option>
												<option value="1">02</option>
												<option value="2">03</option>
											</select>
										</div>
										<div class="single-field min_width ">
											<label for="#">car</label>
											<select class="wide" >
												<option data-display="01">01</option>
												<option value="1">02</option>
												<option value="2">03</option>
											</select>
										</div>
										<div class="serach_icon">
											<a href="#">
												<i class="ti-search"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- slider_area_end -->
<div class="section_title  text-center">
	<h3>Number of available Properties</h3>
</div>
<div class="counter_area slider_area">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-3">
				<div class="single_counter">
					<h3> <span  class="counter" ><?= $carForSale['counter'];?></span></h3>
					<p style="color: #fff">Car for sale</p>
				</div>
			</div>
			<div class="col-xl-3 col-md-3">
				<div class="single_counter">
					<h3> <span class="counter" ><?= $carForRent['counter'];?></span></h3>
					<p style="color: #fff">Car for rent</p>
				</div>
			</div>
			<div class="col-xl-3 col-md-3">
				<div class="single_counter">
					<h3> <span class="counter" ><?= $houseForSale['counter'];?></span></h3>
					<p style="color: #fff">House for sale</p>
				</div>
			</div>
			<div class="col-xl-3 col-md-3">
				<div class="single_counter">
					<h3> <span class="counter" ><?= $houseForRent['counter'];?></span></h3>
					<p style="color: #fff">House for rent</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- popular_property  -->
<div class="popular_property">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="section_title mb-40 text-center">
					<h3>Available Properties</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			foreach ($products as $product)
			{
			?>
			<div class="col-xl-2 col-md-6 col-lg-2">
				<div class="single_property">
					<div class="property_thumb">
						<div class="property_tag" style="position: absolute;top:110px;left:90px;white-space: nowrap">
							For <?= $product['type']; ?>
						</div>
						<a href="<?= base_url('singlePost/'.$product['id'])?>">
						<img src="<?= base_url(); ?>/assets/uploads/<?= $product['image']; ?>" alt="<?= $product['title']; ?>" style="width: 174px;height:138px; ">
						</a>
					</div>
					<div class="property_content">
						<div class="main_pro">
							<h3><a href="#"><?= $product['description']?></a></h3>
							<div class="mark_pro">
								<a href="<?= base_url('singlePost');?>">
								<img src="<?=base_url();?>assets/img/svg_icon/location.svg" alt="">
								</a>
								<span><?= $product['bargain']?></span>
							</div>
							<div class="mark_pro">
								<a href="<?= base_url('singlePost');?>">
								<img src="<?=base_url();?>assets/img/svg_icon/location.svg" alt="">
								</a>
								<span><?= $product['status']?></span>
							</div>
							<span class="amount"style="white-space: nowrap"><?= $product['price']?> Rwf</span>
						</div>
					</div>
				</div>
			</div>
				<?php
			}
			?>
		</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="more_property_btn text-center">
					<a href="#" class="boxed-btn3-line">More Properties</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /popular_property  -->

<!-- home_details  -->
<div class="home_details">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="home_details_active owl-carousel">
					<div class="single_details">
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- /home_details  -->
<!-- counter_area  -->

<!-- /counter_area  -->
