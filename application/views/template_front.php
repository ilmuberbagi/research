<!DOCTYPE html>
<html class="ng-scope">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo isset($title) ? $title : 'Riset & Pengabdian Masyarakat FTUI';?></title>
		<link rel="icon" type="image/png" href="<?php echo base_url().'assets/public/img/Makara_FTUI.png';?>">
		<link href="<?php echo base_url().'assets/public/css/bootstrap.css';?>" rel="stylesheet">
		<link href="<?php echo base_url().'assets/public/css/multidropdown-bootstrap.css';?>" rel="stylesheet">
		<link href="<?php echo base_url().'assets/public/fonts/FontAwesome/css/font-awesome.css';?>" rel="stylesheet">
		<link href="<?php echo base_url().'assets/public/css/footer-bootstrap.css';?>" rel="stylesheet">		
		<link href="<?php echo base_url().'assets/public/css/style.css';?>" rel="stylesheet">

	<?php
    $meta_page = "default";
    if(isset($page)) $meta_page = $page;
    if(file_exists(APPPATH."views/template/public/meta_top/{$meta_page}.php")) 
        $this->load->view("template/public/meta_top/{$meta_page}");
    ?>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/animate.css';?>">
</head>

<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		<?php $this->load->view("template/public/header");?>
		<?php
		if (!empty($page))
			if(file_exists(APPPATH."views/template/public/{$page}.php"))
				$this->load->view("template/public/".$page);
		?>
		<?php $this->load->view("template/public/footer");?>

	</div>
	
    <!-- Mainly scripts -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
	<?php
    if(file_exists(APPPATH."views/template/public/meta_bottom/{$meta_page}.php"))
        $this->load->view("template/public/meta_bottom/{$meta_page}");
    ?>
</body>
</html>