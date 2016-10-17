<html xmlns:x="urn:schemas-microsoft-com:office:excel">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if gte mso 9]>
    <xml>
    <x:ExcelWorkbook>
    <x:ExcelWorksheets>
    <x:ExcelWorksheet>
    Name of the sheet
    <x:WorksheetOptions>
    <x:Panes>
    </x:Panes>
    </x:WorksheetOptions>
    </x:ExcelWorksheet>
    </x:ExcelWorksheets>
    </x:ExcelWorkbook>
    </xml>
    <![endif]-->
	<style>
		.list{
			font-size:14px;
		}
		.title{
			font-size:1.5em;
			color:#0055AA;
		}
		.list th{
			font-size:1.1em;
			background:#EEE;
			color:#222;
		}
	</style>
  </head>
<body>
	<?php
		$filename = 'List_users.xls';
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Pragma: public');
		print "\xEF\xBB\xBF"; // UTF-8 BOM

		echo "<table class='title'><tr><td colspan='3' rowspan='3'><img src='".site_url().'assets/public/img/logo-ftui.jpg'."' width='250'></td><td colspan='3'><b>FAKULTAS TEKNIK<BR/>UNIVERSITAS INDONESIA</b></td></tr></table><br/>";
	?>
	<table><tr><td class="title" colspan="6">List Users</td></tr></table>
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Department</th>
			<th>Role</th>
			<th>Status</th>
		</tr>
		<?php if(!empty($users)){ $no=0; foreach($users as $u){ $no++; ?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $u['name'];?></td>
			<td><?php echo $u['email'];?></td>
			<td><?php echo $u['phone'];?></td>
			<td><?php echo $u['department_name'];?></td>
			<td><?php echo $u['role_name'];?></td>
			<td><?php echo $u['status'];?></td>
		</tr>
		<?php }} ?>
	</table>	
</body>
</html>