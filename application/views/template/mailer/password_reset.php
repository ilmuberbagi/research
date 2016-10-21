<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo isset($title)?$title:'Reset Password SI Research FTUI'; ?></title>
    <style type="text/css">
    </style>
</head>
<body>
	<h2>Reset Password Research FTUI</h2>
	<p>Anda baru saja mereset password pada sistem informasi Research FTUI. Berikut adalah username dan password Anda terbaru. Segera ganti password setelah Anda login yang terletak pada Profile kanan atas dashboard.</p>
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
	<p>Login melalui link berikut:<br/><a href="<?php echo site_url().'login';?>"><?php echo site_url().'login';?></a></p>
	<p>Jika Anda memerlukan bantuan, Silakan hubungi kami.</p>
	<p>Salam hormat,<br/>Administrator</p>
</body>
</html>
