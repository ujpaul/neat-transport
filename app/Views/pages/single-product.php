<!-- Main content -->
<section class="content">
	<!-- Default box -->
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
							<?= $product['type']; ?>
						</label>
					</div>

					<h4 class="mt-3">Price</h4>

					<div class="bg-gray py-2 px-3 mt-4">
						<h2 class="mb-0">
							<?= $product['price']; ?>Rwf
						</h2>
					</div>

					<div class="mt-4">
						<div class="btn btn-success btn-md btn-flat" style="cursor: pointer" data-toggle="modal"
							 data-target="#imgModal">
							<i class="fas fa-plus fa-lg mr-2"></i>
							Add picture
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<nav class="w-100">
					<div class="nav nav-tabs" id="product-tab" role="tablist">
						<a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
						   role="tab" aria-controls="product-desc" aria-selected="true">Details</a>
						<a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
						   href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Records</a>
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
	<!-- /.card -->

</section>
<!-- /.content -->

<div class="modal fade" id="imgModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('manipulate_image'); ?>" method="POST" id="productForm">
				<div class="modal-header">
					<h4 class="modal-title">New image</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Title</label>
						<input type="hidden" value="<?= $product['id']; ?>" name="produit">
						<input type="file" class="form-control" name="image">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
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
				url: "<?php echo base_url('manipulate_image') ?>",
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
