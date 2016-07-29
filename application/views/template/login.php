<!DOCTYPE html>
<html class="ng-scope">
<head>
	<title><?php echo isset($title) ? $title : 'Research FTUI';?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/ionicons.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/adminLTE.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/square/blue.css';?>">

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo site_url();?>"><b>Research</b> FTUI</a>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Log in with your username and password.</p>
			<?php echo $this->session->flashdata('invalid');?>
			<form action="<?php echo site_url().'login/auth';?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" placeholder="Username">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label><input type="checkbox"> Remember Me</label>
						</div>
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
				</div>
			</form>
			<hr/>
			<a href="<?php echo site_url().'login/reset';?>"><i class="fa fa-question-circle"></i> I forgot my password</a><br>
			<a href="<?php echo site_url().'login/register';?>"><i class="fa fa-user"></i> Register new researcher</a>

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
		  increaseArea: '20%' // optional
		});
	  });
	</script>
</body>
</html>
