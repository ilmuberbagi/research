<!DOCTYPE html>
<html class="ng-scope">
<head>
	<title><?php echo isset($title) ? $title : 'Research FTUI';?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/ionicons.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/adminLTE.min.css';?>">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<style>
	.note-userid, .note-email{color:#FF0000; padding-left:2px; padding-bottom:5px; border-bottom:solid 1px #FF0000}
	</style>

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div style="text-align:center; font-size:2em; font-weight:bold; color:#666">
			Researcher <div style="font-size:16px; margin-bottom:20px; font-weight:normal">Registration</div>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg" style="border-bottom:solid 1px #DDD; margin-bottom:10px">Please fill your data correctly. We will send you an activation account to your email.</p>
			
			<?php if($this->session->flashdata('success') != ''){?>
				<div class="callout callout-success">
					<h4>Success</h4>
					<p><?php echo $this->session->flashdata('success');?></p>
				</div>
			<?php } if($this->session->flashdata('warning') != ''){?>
				<div class="callout callout-success">
					<h4>Warning</h4>
					<p><?php echo $this->session->flashdata('warning');?></p>
				</div>
			<?php } ?>

			<form action="<?php echo site_url().'login/proc_register';?>" method="post">
				<div class="form-group has-feedback">
					<label>User ID <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" title="User ID" data-content="Enter user id with your identity number such as NIDN or NIP or NPM"></i></label>
					<input type="text" class="form-control" name="user_id" placeholder="User ID" id="user_id" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<div class="note-userid" style="display:none"><i class="fa fa-warning"></i> User ID has been used. Please use another one.</div>
				</div>
				<div class="form-group has-feedback">
					<label>Fullname <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" title="Fullname" data-content="Enter your fullname include your title such as Prof, Dr, etc"></i></label>
					<input type="text" class="form-control" name="name" placeholder="Fullname" required>
					<span class="glyphicon glyphicon-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<label>Email <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" title="Email" data-content="Recommended using official email like your@eng.ui.ac.id"></i></label>
					<input type="email" class="form-control" name="email" id="email" placeholder="yours@eng.ui.ac.id" required>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<div class="note-email" style="display:none"><i class="fa fa-warning"></i> Email has been used. Please use another one.</div>
				</div>
				<div class="form-group has-feedback">
					<label>Phone</label>
					<input type="phone" class="form-control" name="phone" placeholder="+62">
					<span class="glyphicon glyphicon-phone form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<label>Status</label>
					<select name="role_id" class="form-control" required>
						<option value="3">Dosen</option>
						<option value="4">Mahasiswa</option>
					</select>
				</div>
				<div class="form-group has-feedback">
					<label>Department</label>
					<select name="department_id" class="form-control" required>
						<?php if(!empty($department)){ foreach($department as $d){?>
						<option value="<?php echo $d['department_id'];?>"><?php echo $d['department_name'];?></option>
						<?php }}?>
					</select>
				</div>
				<div class="form-group has-feedback">
					<label>Functional Position</label>
					<input type="text" class="form-control" name="functional" placeholder="" required>
				</div>
				<!-- div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LdT5BwTAAAAAHP9S-A5QQUIDmMoK5Hd_p5ZWCt8"></div>
				</div -->
				<div class="form-action">
					<input type="reset" name="reset" class="btn btn-default" value="Batal">
					<input type="submit" name="submit" class="btn btn-danger submit" value="Register">
				</div>
			</form>
		</div>
	</div>

    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js';?>"></script>
	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%'
		});
		$('[data-toggle="popover"]').popover();
		
		$('#user_id').on('blur', function(){
			var id = $(this).val();
			$.ajax({
				type:'POST',
				data:{key:'user_id', value:id},
				url: '<?php echo site_url()."login/check_user";?>',
				success: function(data){
					if(data > 0){
						$(".note-userid").fadeIn();
						$(".submit").attr('disabled', true);
					}else{
						$(".note-userid").fadeOut();
						$(".submit").attr('disabled', false);
					} 
				},error: function(){
					alert('error, Please check your internet connection!');
				}
			});
		});
		
		$('#email').on('blur', function(){
			var email = $(this).val();
			$.ajax({
				type:'POST',
				data:{key:'email', value:email},
				url: '<?php echo site_url()."login/check_user";?>',
				success: function(data){
					if(data > 0){
						$(".note-email").fadeIn();
						$(".submit").attr('disabled', truess);
					}else{
						$(".note-email").fadeOut();
						$(".submit").attr('disabled', false);
					} 
				},error: function(){
					alert('error, Please check your internet connection!');
				}
			});
		});

	  });
	</script>
</body>
</html>
