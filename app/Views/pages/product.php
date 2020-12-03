<div class="content">
	<div class="animated fadeIn">
		<div style="text-align: right">
		</div>
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Users</h3>
							<button class="btn-info btn" data-toggle="modal" data-target="#userModel"
									style="float: right"><i class="fas fa-plus"></i> New Product
							</button>
						</div>
						<!-- /.Modal -->
						<div class="modal fade" id="userModel">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="<?= base_url('manipulate_user'); ?>" method="POST" id="userForm">
										<div class="modal-header">
											<h4 class="modal-title">New Product</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label>Title</label>
												<input type="hidden" name="productId">
												<input type="text" class="form-control" placeholder="Enter title"
													   name="title">
											</div>
											<div class="form-group">
												<label>Description</label>
												<input type="text" class="form-control" placeholder="Description"
													   name="description">
											</div>
											<div class="form-group">
												<label>Price</label>
												<input type="number" class="form-control" placeholder="price"
													   name="price">
											</div>
											<div class="form-group">
												<label>Negotiability</label>
												<select class="form-control" name="negotiable">
													<option selected disabled>Select Type</option>
													<option value="1">Negotiable</option>
													<option value="2">Not Negotiable</option>
												</select>
											</div>
											<div class="form-group">
												<label>Product status</label>
												<select class="form-control" name="userType">
													<option selected disabled>Select Type</option>
													<option value="1">Sale</option>
													<option value="2">Rent</option>
												</select>
											</div>
											<div class="form-group">
												<label>Product type</label>
												<select class="form-control" name="productType">
													<option selected disabled>Select Type</option>
													<option value="1">Car</option>
													<option value="2">House</option>
												</select>
											</div>
										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<div class="modal fade" id="confirm">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="<?= base_url('update_status'); ?>" method="POST" id="confirm"
										  enctype="multipart/form-data">
										<div class="modal-header">
											<h4 class="modal-title">Confirm</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="card">
												<textarea placeholder="Are you sure?" disabled></textarea>
											</div>
											<input type="hidden" name="productId">

										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel
											</button>
											<button type="submit" class="btn btn-primary">Confirm</button>
										</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<div class="modal fade" id="return">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="<?= base_url('returnProduct'); ?>" method="POST" id="return"
										  enctype="multipart/form-data">
										<div class="modal-header">
											<h4 class="modal-title">Return product</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="card">
												<textarea placeholder="Are you sure this product has returned?" disabled></textarea>
											</div>
											<input type="hidden" name="productId">

										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel
											</button>
											<button type="submit" class="btn btn-primary">Return</button>
										</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						`                        <!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Product type</th>
									<th>Description</th>
									<th>Price</th>
									<th>Status</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
								<?php
								$i = 1;
								foreach ($products as $product) {
									?>
									<tr>
										<td><?= $i; ?></td>
										<td>
											<a href="<?= base_url('singleProduct/' . $product['id']) ?>"><?= $product['title']; ?></a>
										</td>
										<td><?= $product['productType']; ?></td>
										<td><?= $product['description']; ?></td>
										<td><?= $product['price']; ?></td>
										<td><?= $product['type']; ?></td>
										<td style="text-align: center">
											<button class="btn btn-sm btn-success" data-target="#userModel"
													data-toggle="modal" data-id="<?= $product['id']; ?>"><span
														class="fas fa-pen"></span> Edit
											</button>
											<?php
											if ($product['type'] == 'Sale' && $product['status'] == 1) {
												?>
												<button class="btn btn-sm btn-primary" data-target="#confirm"
														data-toggle="modal" data-id="<?= $product['id']; ?>"><span
															class="fas fa-cart-plus"></span> Sell
												</button>
												<?php
											} elseif ($product['type'] == 'Rent' && $product['status'] == 1) {
												?>
												<button class="btn btn-sm btn-primary" data-target="#confirm"
														data-toggle="modal" data-id="<?= $product['id']; ?>"><span
															class="fas fa-pen"></span> Rent
												</button>
												<?php
											} elseif($product['type'] == 'Rent' && $product['status'] == 2) {
												?>
												<button class="btn btn-sm btn-danger" data-target="#return"
														data-toggle="modal" data-id="<?= $product['id']; ?>"><span
															class="fas fa-reply"></span> Return
												</button>
											<?php
											}
											?>

										</td>
									</tr>
									<?php
									$i++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script>
	$(function () {
		$(document).on('submit', '#userForm', function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('manipulate_product') ?>",
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
							$('#userForm')[0].reset();
							$('#userModel').hide();
							window.location.reload();
						}
					} catch (e) {
						alert("System error please try again later");
						console.log(e);
					}
				}
			});
		});

		$("#confirm").on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data("id");
			$("#confirm [name='productId']").val(id).change()
		})
		$(document).on('submit', '#confirm', function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('update_status') ?>",
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
							$('#confirm').hide();
							window.location.reload();
						}
					} catch (e) {
						alert("System error please try again later");
						console.log(e);
					}
				}
			});
		});

		$("#return").on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data("id");
			$("#return [name='productId']").val(id).change()
		})
		$(document).on('submit', '#return', function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('returnProduct') ?>",
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
							$('#return').hide();
							window.location.reload();
						}
					} catch (e) {
						alert("System error please try again later");
						console.log(e);
					}
				}
			});
		});
		$("#userModel").on('show.bs.modal',function (e) {
			var id=$(e.relatedTarget).data("id");
			$.getJSON("<?=base_url();?>update_product/" + id, function (data) {
				console.log(data)
				$("#userModel [name='productId']").val(data.id).change();
				$("#userModel [name='title']").val(data.title).change();
				$("#userModel [name='description']").val(data.description).change();
				$("#userModel [name='price']").val(data.price).change();
				$("#userModel [name='negotiable']").val(data.bargain).change();
				$("#userModel [name='userType']").val(data.type).change();
				$("#userModel [name='productType']").val(data.product_type).change();
			});
			return;
		})
		$.ajax({
			url: "<?php echo base_url('manipulate_product') ?>",
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
						$('#userForm')[0].reset();
						$('#userModel').hide();
						window.location.reload();
					}
				} catch (e) {
					alert("System error please try again later");
					console.log(e);
				}
			}
		});
	});
</script>
