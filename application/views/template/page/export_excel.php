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
			background:#555;
			color:#FFF;
		}
	</style>
  </head>
<body>
<?php
	$filename = "Publication_".date('Y-m-d').'.xls';
	header('Content-Disposition: attachment; filename='.$filename);
	header('Content-type: application/force-download');
	header('Content-Transfer-Encoding: binary');
	header('Pragma: public');
	print "\xEF\xBB\xBF"; // UTF-8 BOM
	# ==================================================
	echo "<table class='title'><tr><td colspan='".(count($types)+16)."' align='center'><b>DATA PUBLIKASI DEPARTEMEN TEKNIK ELEKTRO FTUI</b></td></tr></table><br/>";
	if(!empty($publication)){
?>
	<table class="list" width="200%">
		<thead>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Nama Penulis Artikel (dalam urutan sesuai dokumen karya ilmiah)</th>
			<th rowspan="2">Departemen</th>
			<th rowspan="2">Judul Artikel/Invensi</th>
			<th rowspan="2">Status Uplaod SIDR</th>
			<th rowspan="2">Verifikasi SIDR</th>
			<th colspan="<?php echo count($types);?>" style="width:<?php echo (count($types)*100);?>px">Jenis Publikasi/Karya</th>
			<th rowspan="2">Detail Karya Ilmiah (Penerbit,Tahun Terbit, Vol, Hal, dll)</th>
			<th colspan="2">Impact Factor</th>
			<th rowspan="2">Ranking Quartil (Q1, Q2, Q3, Q4, Q5)</th>
			<th rowspan="2">Frekuensi Terbit dalam q 1 tahun</th>
			<th rowspan="2">Negara Domisili Jurnal</th>
			<th rowspan="2">Penerbit/Publisher (Asosiasi/Institusi)</th>
			<th rowspan="2">Tahun Awal Terbit</th>
			<th rowspan="2">Alamat Website</th>
			<th rowspan="2">Database Indeks ( SCOPUS, Proquest, JSTOR, ScienceDirect, dll)</th>
		</tr>
		<tr>
			<?php foreach($types as $t){?>
			<th style="width:100px"><?php echo $t['type_name'];?></th>
			<?php }?>
			<th>Thomson Reuters-Journal Citation Reports (JCR)</th>
			<th>SCImago Journal Rank (SJR)</th>
		</tr>
		</thead>
		<tbody>
		<?php 
			if(!empty($publication)){ $no=0; foreach($publication as $a){ $no++; 
			$bg = $no%2 == 0 ? '#EEE':'#FFF';
		?>
		<tr style="background:<?php echo $bg;?>">
			<td valign="top" align="center"><?php echo $no;?></td>
			<td valign="top"><?php echo $a['author'];?></td>
			<td valign="top"><?php echo $a['department_name'];?></td>
			<td valign="top"><?php echo $a['title'];?></td>
			<td valign="top" align="center"><?php echo $a['sidr_upload']==1?'v':'';?></td>
			<td valign="top" align="center"><?php echo $a['sidr_verify']==1? 'v':'';?></td>
			<?php foreach($types as $t){?>
			<?php echo $a['pub_type_id'] == $t['type_id'] ? '<td bgcolor="yellow" valign="top" align="center">v</td>':'<td></td>';?>
			<?php }?>
			<td valign="top"><?php echo $a['detail'];?></td>
			<td valign="top" align="center"><?php echo $a['jcr'];?></td>
			<td valign="top" align="center"><?php echo $a['scr'];?></td>
			<td valign="top" align="center"><?php echo $a['q_year'];?></td>
			<td valign="top" align="center"><?php echo $a['freq_year'];?></td>
			<td valign="top" align="center"><?php echo $a['pub_country'];?></td>
			<td valign="top" align="center"><?php echo $a['publisher'];?></td>
			<td valign="top" align="center"><?php echo $a['pub_year'];?></td>
			<td valign="top" align="center"><?php echo $a['pub_website'];?></td>
			<td valign="top" align="center"><?php echo $a['db_index'];?></td>
		</tr>
		<?php }}?>
		</tbody>
	</table>
<?php } ?>
</body>
</html>