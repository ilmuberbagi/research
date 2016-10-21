<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo isset($title)?$title:'Aktivasi Akun Riset FTUI'; ?></title>
    <style type="text/css">
    </style>
</head>
<body>
	<?php if ($status == 1){?>

		<h2>Aktivasi Sistem Informasi Riset FTUI</h2>
		<p>Yth. <?php echo $name;?></p>
		<p>Ini adalah email otomatis yang menandakan bahwa kami telah melakukan verifikasi akun Anda pada Sistem Informasi Riset FTUI <a href="<?php echo site_url();?>"><?php echo site_url();?></a>. Anda dapat menggunakan dan masuk ke dalam sistem dengan akun sebagai berikut:</p>

		<table>		
			<tr>
				<td>Username</td>
				<td>: <?php echo $user_id;?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>: <?php echo $password;?></td>
			</tr>
		</table>
		
		<p>Login : <a href="<?php echo site_url().'login';?>"><?php echo site_url().'login';?></a></p>

		<p>Jika Anda memerlukan bantuan, Silakan hubungi kami.</p>
		<p>Salam hormat,<br/>Administrator</p>


	<?php }else{?>

		<p>Ini adalah email otomatis yang menandakan bahwa kami telah melakukan pemblokiran akun dengan email ini pada Sistem Informasi Riset FTUI <a href="<?php echo site_url();?>"><?php echo site_url();?></a>. Akun ini tidak dapat menggunakan atau masuk ke dalam sistem.</p>
		<p>Jika Anda memerlukan bantuan, Silakan hubungi kami.</p>
		<p>Salam hormat,<br/>Administrator</p>

	<?php } ?>

</body>
</html>
