
<div class="content">
	<div class="animated fadeIn">
		<div style="text-align: right">
		</div>
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<!-- /.card-header -->
						<div class="modal fade" id="replyModal">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="<?=base_url('reply_email');?>" method="POST" id="replyForm">
										<div class="modal-header">
											<h4 class="modal-title">Reply email</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="email">
											<div class="form-group">
												<label>Title</label>
												<textarea class="form-control" placeholder="Type message" name="message"></textarea>
											</div>

										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit"  class="btn btn-primary">Send</button>
										</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Client names</th>
									<th>Client email</th>
									<th>Client phone</th>
									<th>Client address</th>
									<th>Requested product</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
								<?php
								$i=1;
								foreach ($requests as $request) {
									?>
									<tr>
										<td><?=$i; ?></td>
										<td><?= $request['names']; ?></a></td>
										<td><?= $request['email']; ?></td>
										<td><?= $request['phone']; ?></td>
										<td><?= $request['address']; ?></td>
										<td><?= $request['title']; ?></td>
										<td style="text-align: center">
											<button class="btn btn-sm btn-success" data-target="#replyModal" data-toggle="modal" data-email="<?=$request['email'];?>"><span class="fas fa-reply"></span> Reply</button>
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

<script src="<?=base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script>
	$(function(){
		$(document).on('submit', '#userForm', function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('manipulate_product') ?>",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				cache:false,
				async:false,
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
		$("#replyModal").on('show.bs.modal', function (e) {
			var mail = $(e.relatedTarget).data("email");
			$("#replyModal [name='email']").val(mail).change()
		})

		$(document).on('submit', '#replyForm', function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('reply_email') ?>",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				cache:false,
				async:false,
				success: function (data) {
					var json = null;
					try {
						json = JSON.parse(data);
						if (json.hasOwnProperty("error")) {
							alert(json.error);
						} else {
							alert(json.success);
							$('#replyForm')[0].reset();
							$('#replyModal').hide();
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
