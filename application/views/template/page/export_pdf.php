	<style>
		.list{ font-size:1em}
		.list th{
			background-color:#EEE;
			border:solid 1px #222;
			font-weight:bold;
			text-align:center;
			padding:3px;
		}
		.list td{
			border:solid 1px #222;
			padding:3px;
		}
		.heading td{font-size:2em; font-weight:bold; color:#222;}
		.heading .small{font-size:12px; font-weight:bold}
		.small{ font-size:0.7em; font-weight:100; font-style:italic;}
		.big{ font-size:1.2em}
	</style>
	<table>
		<tr class="heading">
			<td width="115px"><img src="<?php echo site_url().'assets/public/img/logo-ftui.jpg';?>"></td>
			<td width="50px">&nbsp;</td>
			<td width="686px"><br/><br/><?php echo $title;?></td>
		</tr>
	</table><br/><br/>
	<table class="list" cellpadding="2">
		<thead>
		<tr>
			<th rowspan="2" style="width:15px"><br/><br/><br/>No</th>
			<th rowspan="2" width="100px"><br/><br/>Nama Penulis Artikel(dalam urutan sesuai dokumen karya ilmiah)</th>
			<th rowspan="2" width="50px"><br/><br/><br/>Departemen</th>
			<th rowspan="2" width="100px"><br/><br/>Judul Artikel/Invensi</th>
			<th rowspan="2" width="20px"><br/><br/>Uplaod File</th>
			<th rowspan="2" width="30px"><br/><br/>Status</th>
			<th colspan="<?php echo count($types);?>" width="<?php echo (count($types)*20);?>px" class="big">Jenis Publikasi/Karya</th>
			<th rowspan="2" width="50px"><br/><br/>Page</th>
			<th rowspan="2" width="50px"><br/><br/>Volume</th>
			<th colspan="2" width="100px">Impact Factor</th>
			<th rowspan="2" width="30px">Ranking Quartil (Q1, Q2, Q3, Q4, Q5)</th>
			<th rowspan="2" width="30px">Frekuensi Terbit dalam 1 tahun</th>
			<th rowspan="2" width="50px"><br/><br/>Negara Domisili Jurnal</th>
			<th rowspan="2" width="50px"><br/><br/>Penerbit/Publisher (Asosiasi/Institusi)</th>
			<th rowspan="2" width="30px"><br/><br/>Tahun Awal Terbit</th>
			<th rowspan="2" width="50px"><br/><br/>Alamat Website</th>
			<th rowspan="2" width="50px">Database Indeks ( SCOPUS, Proquest, JSTOR, ScienceDirect, dll)</th -->
		</tr>
		<tr>
			<?php foreach($types as $t){?>
			<th width="20px" class="small"><?php echo $t['type_name'];?></th>
			<?php } ?>
			<th width="50px">Thomson Reuters-Journal Citation Reports (JCR)</th>
			<th width="50px">SCImago Journal Rank (SJR)</th>
		</tr>
		</thead>
		<tbody>
		<?php 
			if(!empty($publication)){ $no=0; foreach($publication as $a){ $no++; 
			$bg = $no%2 == 0 ? '#EEE':'#FFF';
		?>
		<tr style="background:<?php echo $bg;?>">
			<td valign="top" align="center" width="15px"><?php echo $no;?></td>
			<td valign="top" width="100px"><?php echo $a['author'];?></td>
			<td valign="top" width="50px"><?php echo $a['department_name'];?></td>
			<td valign="top" width="100px"><?php echo $a['title'];?></td>
			<td valign="top" align="center" width="20px"><?php echo $a['sidr_upload']==1?'v':'';?></td>
			<td valign="top" align="center" width="30px"><?php echo $a['sidr_verify']==1? 'v':'';?></td>
			<?php foreach($types as $t){?>
			<td bgcolor="#FFFFDD" width="20px" valign="top" align="center"><?php echo $a['pub_type_id'] == $t['type_id'] ? 'v':'';?></td>
			<?php } ?>
			<td valign="top" width="50px" align="center"><?php echo $a['page'];?></td>
			<td valign="top" width="50px" align="center"><?php echo $a['volume'];?></td>
			<td valign="top" width="50px" align="center"><?php echo $a['jcr'];?></td>
			<td valign="top" width="50px" align="center"><?php echo $a['scr'];?></td>
			<td valign="top" align="center" width="30px"><?php echo $a['q_year'];?></td>
			<td valign="top" align="center" width="30px"><?php echo $a['freq_year'];?></td>
			<td valign="top" align="center" width="50px"><?php echo $a['pub_country'];?></td>
			<td valign="top" align="center" width="50px"><?php echo $a['publisher'];?></td>
			<td valign="top" align="center" width="30px"><?php echo $a['pub_year'];?></td>
			<td valign="top" align="center" width="50px"><?php echo $a['pub_website'];?></td>
			<td valign="top" align="center" width="50px"><?php echo $a['db_index'];?></td>
		</tr>
		<?php }}?>
		</tbody>
	</table>
