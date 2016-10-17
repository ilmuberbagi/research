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
	$filename = "Grants_".date('Y-m-d').'.xls';
	header('Content-Disposition: attachment; filename='.$filename);
	header('Content-type: application/force-download');
	header('Content-Transfer-Encoding: binary');
	header('Pragma: public');
	print "\xEF\xBB\xBF"; // UTF-8 BOM
	# ==================================================
	echo "<table class='title'><tr><td colspan='3' rowspan='3'><img src='".site_url().'assets/public/img/logo-ftui.jpg'."' width='250'></td><td colspan='23'><b>".$title."</b></td></tr></table><br/>";
	if(!empty($grants)){
?>
	<table class="list" width="200%" border="1" cellspacing="0">
		<thead>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Nama Peneliti Utama</th>
			<th rowspan="2">Anggota</th>
			<th rowspan="2">Judul Penelitian</th>
			<th rowspan="2">Departemen</th>
			<th colspan="4">Sumber Dana</th>
			<th colspan="5">Status</th>
			<th colspan="5">Dana Penelitian</th>
			<th rowspan="2">Nomor Kontrak</th>
			<th rowspan="2">Laporan<br/>Kemajuan</th>
			<th rowspan="2">Laporan<br/>Akhir</th>
			<th rowspan="2">BAST/SP</th>
			<th colspan="2">Mitra Kerja</th>
			<th rowspan="2">Keterangan Tambahan</th>
		</tr>
		<tr>
			<th>Riset/PengMas</th>
			<th>Nama Hibah</th>
			<th>Nama Skema Hibah</th>
			<th>UI/Luar UI/<br/>Internasional *)</th>
			<th>Single/Multi<br/>Year(s)</th>
			<th>Submisi Proposal<br/>Baru/Lanjutan</th>
			<th>Seleksi</th>
			<th>Visit Site</th>
			<th>Granted</th>
			<th>Total yang<br/>diajukan</th>
			<th>Total yang<br/>disetujui</th>
			<th>Tahun 1</th>
			<th>Tahun 2</th>
			<th>Tahun 3</th>
			<th>Nama</th>
			<th>Instansi</th>
		</tr>
		</thead>
		<tbody>
		<?php 
			if(!empty($grants)){ $no=0; foreach($grants as $a){ $no++; 
			$bg = $no%2 == 0 ? '#EEE':'#FFF';
		?>
		<tr style="background:<?php echo $bg;?>">
			<td valign="top" align="center"><?php echo $no;?></td>
			<td valign="top"><?php echo $a['main_researcher'];?></td>
			<td valign="top"><?php echo $a['member_researcher'];?></td>
			<td valign="top"><?php echo $a['research_title'];?></td>
			<td valign="top"><?php echo $a['department_name'];?></td>
			<td valign="top"><?php echo $a['sd_riset']==0?'Riset':'Pengabdian Masyarakat';?></td>
			<td valign="top"><?php echo $a['sd_hibah'];?></td>
			<td valign="top"><?php echo $a['sd_skema_hibah'];?></td>
			<td valign="top"><?php echo $a['sd_source'];?></td>
			<td valign="top"><?php echo $a['st_year']==0?'Single':'Multi';?></td>
			<td valign="top"><?php echo $a['st_submision']==0?'Baru':'Lanjutan';?></td>
			<td valign="top"><?php echo $a['selection'];?></td>
			<td valign="top"><?php echo $a['site'];?></td>
			<td valign="top" align="center"><?php echo $a['st_granted']==1?'v':'';?></td>
			<td valign="top"><?php echo number_format($a['total_proposed']);?></td>
			<td valign="top"><?php echo number_format($a['total_approved']);?></td>
			<td valign="top"><?php echo number_format($a['year_1']);?></td>
			<td valign="top"><?php echo number_format($a['year_2']);?></td>
			<td valign="top"><?php echo number_format($a['year_3']);?></td>
			<td valign="top"><?php echo $a['contract_number'];?></td>
			<td valign="top"><?php echo $a['report_progress'] == 1? 'v':'';?></td>
			<td valign="top"><?php echo $a['last_report'] == 1? 'v':'';?></td>
			<td valign="top"><?php echo $a['sp'] == 1? 'v':'';?></td>
			<td valign="top"><?php echo $a['mitra_name'];?></td>
			<td valign="top"><?php echo $a['mitra_institusion'];?></td>
			<td valign="top"><?php echo $a['description'];?></td>
		</tr>
		<?php }}?>
		</tbody>
	</table>
<?php } ?>
</body>
</html>