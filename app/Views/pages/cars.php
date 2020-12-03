<!-- slider_area_start -->
<div class="slider_area">
	<div class="single_slider  d-flex align-items-center slider_bg_1">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-10 offset-xl-1">
					<div class="slider_text text-center justify-content-center">
						<h3>Find your best Property</h3>
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
										<div class="single-field max_width ">
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

<!-- popular_property  -->
<div class="popular_property">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="section_title mb-40 text-center">
					<h3>Popular Properties</h3>
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
									<span>Popular Properties</span>
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

</div>
<!-- /home_details  -->
<!-- counter_area  -->
<!-- /counter_area  -->
