<!DOCTYPE html>
<html class="ng-scope">
<head>
	<title><?php echo isset($title) ? $title : 'Research FTUI';?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/ionicons.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/adminLTE.min.css';?>">

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo site_url();?>"><b>Research</b> FTUI</a>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Enter your email. We will send you a new password to log in.</p>
			<?php echo $this->session->flashdata('invalid');?>
			<form action="<?php echo site_url().'login/reset_password';?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="email" placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-submit">
					<input type="submit" class="btn btn-primary btn-block" value="Reset Password">
				</div><br/>
			</form>
			<a href="<?php echo site_url().'login';?>"><i class="fa fa-arrow-circle-left"></i> Back to login page</a><br>
			<a href="<?php echo site_url().'login/register';?>"><i class="fa fa-user"></i> Register new Researcher</a>

		</div>
	</div>

    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
</body>
</html>
