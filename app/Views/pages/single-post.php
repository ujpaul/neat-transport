<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="bradcam_text text-center">
					<h3>Property Details</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ bradcam_area  -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
	<div class="container">
		<div class="card card-solid">
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-6">
						<h3 class="d-inline-block d-sm-none"><?= $product['title']; ?></h3>
						<div class="col-12">
							<?php if (count($products) != 0) { ?>
								<img style="width: 400px"
									 src="<?= base_url(); ?>/assets/uploads/<?= $products[0]['image']; ?>"
									 class="product-image"
									 alt="Product Image">
								<?php
							}
							?>
						</div>
						<div class="col-12 product-image-thumbs">
							<?php foreach ($products as $pro) {
								?>
								<div class="product-image-thumb active"><img
											src="<?= base_url(); ?>/assets/uploads/<?= $pro['image']; ?>" alt="Product Image">
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<h3 class="my-3"><?= $product['title']; ?></h3>
						<hr>
						<h4>Info</h4>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-default text-center">
								<input type="radio" name="color_option" id="color_option1" autocomplete="off">
								<span class="text-xl">Product type</span>
								<br>
								<?= $product['productType']; ?>
							</label>
							<label class="btn btn-default text-center">
								<input type="radio" name="color_option" id="color_option1" autocomplete="off">
								<span class="text-xl">Status</span>
								<br>
								For &nbsp;<?= $product['type']; ?>
							</label>
						</div>

<!--						<h4 class="mt-3">Price</h4>-->

<!--						<div class="bg-gray py-2 px-3 mt-4">-->
<!--							<h2 class="mb-0">-->
<!--								--><?//= $product['price']; ?><!--Rwf-->
<!--							</h2>-->
<!--						</div>-->

						<div class="mt-4">
							<?php
							if($product['status'] =='Available'){
							?>
							<div class="btn btn-success btn-md btn-flat" style="cursor: pointer" data-toggle="modal"
								 data-target="#productModal">
								<i class="fa fa-shopping-cart fa-lg mr-2"></i>
								Order now
							</div>
							<?php
							}
							else if($product['status'] =='Sold'  && $product['type'] =='Sale'){
							?>
							<span>This &nbsp;<?= $product['title']?>&nbsp;has <?= $product['status']?></span>
							<?php
							}
							else if($product['status'] =='Sold'  && $product['type'] =='Rent'){
							?>
							<span>This &nbsp;<?= $product['title']?>&nbsp; is being occupied.And is not available for rent</span>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<nav class="w-100">
						<div class="nav nav-tabs" id="product-tab" role="tablist">
							<a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
							   role="tab" aria-controls="product-desc" aria-selected="true">Details</a>

						</div>
					</nav>
					<div class="tab-content p-3" id="nav-tabContent">
						<div class="tab-pane fade show active" id="product-desc" role="tabpanel"
							 aria-labelledby="product-desc-tab"><p><?= $product['description']; ?></p></div>
						<div class="tab-pane fade" id="product-comments" role="tabpanel"
							 aria-labelledby="product-comments-tab"> Records
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<div class="row">
			<div class="popular_property">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="section_title mb-40 text-center">
								<h3>Related Properties</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">

					</div>
					<?php
					if($product['productType']=='Car' && $product['type']=='Sale'){
					?>
					<div class="row">
						<?php
						foreach ($carForSale as $car){
							if($car['id']==$id){
								 continue;
							}
							else{
						?>
						<div class="col-xl-4 col-md-6 col-lg-4">
							<div class="single_property">
								<div class="property_thumb">
									<div class="property_tag">
										For &nbsp;<?= $car['type']?>
									</div>
									<a href="<?= base_url('singlePost/'.$car['id']);?>">
										<img src="<?= base_url(); ?>/assets/uploads/<?= $car['image']; ?>" alt="" style="max-height: 195px;">
									</a>
								</div>
								<div class="property_content">
									<div class="main_pro">
										<h3><a href="#"><?= $car['description']?></a></h3>
										<div class="mark_pro">
											<img src="<?=base_url();?>assets/img/svg_icon/location.svg" alt="">
											<span>Popular Properties</span>
										</div>
<!--										<span class="amount">--><?//= $car['price']?><!-- Rwf</span>-->
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						}
						?>
					</div>
					<?php
					}
					elseif ($product['productType']=='House' && $product['type']=='Sale'){
						?>
						<div class="row">
						<?php
						foreach ($houseForSale as $house){
							if($house['id']==$id){
								 continue;
							}
							else{
						?>
					<div class="col-xl-4 col-md-6 col-lg-4">
						<div class="single_property">
							<div class="property_thumb">
								<div class="property_tag">
									For &nbsp;<?= $house['type']?>
								</div>
								<a href="<?= base_url('singlePost/'.$house['id']);?>">
									<img src="<?= base_url(); ?>/assets/uploads/<?= $house['image']; ?>" alt="" style="max-height: 195px;">
								</a>
							</div>
							<div class="property_content">
								<div class="main_pro">
									<h3><a href="#"><?= $house['description']?></a></h3>
									<div class="mark_pro">
										<img src="<?=base_url();?>assets/img/svg_icon/location.svg" alt="">
										<span>Popular Properties</span>
									</div>
									<!--										<span class="amount">--><?//= $car['price']?><!-- Rwf</span>-->
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					}
					?>
				</div>
						<?php
					}
					elseif ($product['productType']=='House' && $product['type']=='Rent'){
						?>
						<div class="row">
							<?php
							foreach ($houseForRent as $house){
								if($house['id']==$id){
									continue;
								}
								else{
									?>
									<div class="col-xl-4 col-md-6 col-lg-4">
										<div class="single_property">
											<div class="property_thumb">
												<div class="property_tag">
													For &nbsp;<?= $house['type']?>
												</div>
												<a href="<?= base_url('singlePost/'.$house['id']);?>">
													<img src="<?= base_url(); ?>/assets/uploads/<?= $house['image']; ?>" alt="" style="max-height: 195px;">
												</a>
											</div>
											<div class="property_content">
												<div class="main_pro">
													<h3><a href="#"><?= $house['description']?></a></h3>
													<div class="mark_pro">
														<img src="<?=base_url();?>assets/img/svg_icon/location.svg" alt="">
														<span>Popular Properties</span>
													</div>
													<!--										<span class="amount">--><?//= $car['price']?><!-- Rwf</span>-->
												</div>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
						</div>
						<?php
					}
					else
					{
					?>

					<div class="row">
						<?php
						foreach ($carForRent as $car){
						if($car['id']==$id){
							continue;
						}
						else{
							?>
							<div class="col-xl-4 col-md-6 col-lg-4">
								<div class="single_property">
									<div class="property_thumb">
										<div class="property_tag">
											For &nbsp;<?= $car['type']?>
										</div>
										<a href="<?= base_url('singlePost/'.$car['id']);?>">
											<img src="<?= base_url(); ?>/assets/uploads/<?= $car['image']; ?>" alt="">
										</a>
									</div>
									<div class="property_content">
										<div class="main_pro">
											<h3><a href="#"><?= $car['description']?></a></h3>
											<div class="mark_pro">
												<img src="<?=base_url();?>assets/img/svg_icon/location.svg" alt="">
												<span>Popular Properties</span>
											</div>
<!--											<span class="amount">--><?//= $house['price']?><!-- Rwf</span>-->
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						}
						?>
					</div>
					<?php
					}
					?>
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
		</div>
	</div>
</section>
<div class="modal fade" id="productModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('manipulate_requests'); ?>" method="POST" id="productForm">
				<div class="modal-header">
					<h4 class="modal-title">New Request</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Title</label>
						<input type="hidden" value="<?= $product['id']; ?>" name="id">
						<div class="form-group">
							<label>Product name</label>
							<input type="text" class="form-control" placeholder="Enter names" name="title" value="<?= $product['title']?>" disabled>
						</div>
						<div class="form-group">
							<label>Names</label>
							<input type="text" class="form-control" placeholder="Enter names" name="names">
						</div>
						<div class="form-group">
							<label>Phone number</label>
							<input type="text" class="form-control" placeholder="Enter phone number" name="phone">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" placeholder="youremail@example.com" name="email">
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" placeholder="your address" name="address">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Make request</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script src="<?= base_url(); ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
<script>
	$(function () {
		$(document).on('submit', '#productForm', function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('manipulate_requests') ?>",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				cache: false,
				async: false,
				success: function (data) {
					var json = null;
					try {
						json = JSON.parse(data);
						if (json.hasOwnProperty("error")) {
							alert(json.error);
						} else {
							alert(json.success);
							$('#productForm')[0].reset();
							$('#productModal').hide();
							window.location.reload();
						}
					} catch (e) {
						alert("System error please try again later");
						console.log(e);
					}
				}
			});
		});
	})
</script>
<!--================ Blog Area end =================-->
