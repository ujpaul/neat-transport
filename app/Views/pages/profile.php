<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle"
								 src="<?=base_url();?>assets/img/user.png"
								 alt="User profile picture">
						</div>

						<h3 class="profile-username text-center"><?=$user['names'];?></h3>

						<p class="text-muted text-center">Account</p>


						<hr>
						<strong><i class="fas fa-envelope mr-1"></i> Email</strong>

						<p class="text-muted">
							<?=$user['email'];?>
						</p>
						<a href="#" class="btn btn-primary btn-block"><b>Activate</b></a>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" style="cursor: pointer!important;" href="#basicInfo" data-toggle="tab">Change Password</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="basicInfo">
								<form class="form-horizontal" id="chgform" action="<?=base_url('changePassword');?>">
									<div class="form-group row">
										<label for="inputName" class="col-sm-2 col-form-label">Current Password</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" name="currentPassword"  placeholder="Current Password">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" name="newPassword"  placeholder="New Password" id="password">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputName2" class="col-sm-2 col-form-label" >Confirm Password</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" data-parsley-equalto-message="Password Mismatch" data-parsley-equalto="#password" placeholder="Confirm Password">
										</div>
									</div>
									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<button style="width: 100%;background-color: #007bff;color: #fff" type="submit" class="btn btn-default">Save Changes</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script>
	$(function(){
		// $("#chgform").parsley();
		$(document).on('submit', '#chgform', function (event) {
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url('changePassword') ?>",
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
							$('#chgform')[0].reset();
							window.location.reload();
						}
					} catch (e) {
						alert("System error please try again later");
						console.log(e);
					}
				}
			});
		});

	}) ;
</script>
