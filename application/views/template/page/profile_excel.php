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
			text-align:left;
		}
	</style>
  </head>
<body>
	<?php
		$filename = "Profile_".str_replace(' ','_', $user[0]['name']).'.xls';
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Pragma: public');
		print "\xEF\xBB\xBF"; // UTF-8 BOM		
		echo "<table class='title'><tr><td colspan='3' rowspan='3'><img src='".site_url().'assets/public/img/logo-ftui.jpg'."' width='250'></td><td colspan='3'><b>FAKULTAS TEKNIK<BR/>UNIVERSITAS INDONESIA</b></td></tr></table><br/>";
	?>
	<table><tr><td class="title" colspan="6">Researcher Profile</td></tr></table>
	<table class="list">
		<tr>
			<th>Name</th>
			<td><?php echo $user[0]['name'];?></td>
			<td rowspan="12" align="center" valign="top"><img src="<?php echo $user[0]['avatar']? $user[0]['avatar']:site_url().'assets/img/user.jpg';?>" class="img" width="130"></td>
		</tr>
		<tr><th width="200">NIP/NUP</th><td><?php echo "'".$user[0]['user_code'];?></td></tr>
		<tr><th>Department</th><td><?php echo $user[0]['department_name'];?></td></tr>
		<tr><th>Email</th><td><?php echo $user[0]['email'];?></td></tr>
		<tr><th>Phone</th><td><?php echo "'".$user[0]['phone'];?></td></tr>
		<tr><th>Expertise</th><td><?php echo $user[0]['expertise'] == '' ? '---': $user[0]['expertise'];?></td></tr>
		<tr><th>Research Interest</th><td><?php echo $user[0]['research_interest'] == ''? '---':$user[0]['research_interest'];?></td></tr>
		<tr><th>Link Research Gate</th><td><?php echo $user[0]['link_research_gate'] == ''? '---': $user[0]['link_research_gate'];?></td></tr>
		<tr><th>Link Google Scholar</th><td><?php echo $user[0]['link_google_scholar'] == ''? '---': $user[0]['link_google_scholar'];?></td></tr>
		<tr><th>Link Scopus</th><td><?php echo $user[0]['link_scopus'] ==''? '---':$user[0]['link_scopus'];?></td></tr>
		<tr><th>H-index Google Scholar</th><td align="left"><?php echo $user[0]['index_scholar'] == ''? '---': $user[0]['index_scholar'];?></td></tr>
		<tr><th>H-index Scopus</th><td align="left"><?php echo $user[0]['index_scopus'] == ''? '---': $user[0]['index_scopus'];?></td></tr>
		<tr><th>Profile</th><td colspan="2"><?php echo $user[0]['profile'];?></td></tr>
	</table>
	<hr/>
	<?php 
		if(!empty($types)){
			foreach($types as $t){
				if(!empty($publication[$t['type_id']])){
					echo '<table><tr><td class="title" colspan="6">'.$t['type_name'].'</td></tr></table>';
					echo "<table class='table table-bordered table-striped list' border='1'>";
					echo "<tr><th>No</th><th colspan='2'>Title</th><th>Authors</th><th>Year</th><th>Publisher</th></tr>";
					$no=0;
					foreach($publication[$t['type_id']] as $p){ $no++;
						echo "<tr>";
							echo "<td>".$no."</td>";
							echo "<td colspan='2'>".$p['title']."</td>";
							echo "<td>".$p['author']."</td>";
							echo "<td>".$p['pub_year']."</td>";
							echo "<td>".$p['publisher']."</td>";
						echo "</tr>";
					}
					echo "</table><hr/>";
				}
			}
		}
		
		# grants
		if(!empty($grants)){
			echo '<table><tr><td class="title" colspan="6">Grants</td></tr></table>';
			echo "<table class='table table-bordered table-striped list' border='1'>";
			echo "<tr><th>No</th><th colspan='2'>Title</th><th>Authors</th><th colspan='2'>Year</th></tr>";
			$no=0;
			foreach($grants as $p){ $no++;
				echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td colspan='2'>".$p['research_title']."</td>";
					echo "<td>".$p['main_researcher']."</td>";
					echo "<td colspan='2'>".$p['grant_year']."</td>";
				echo "</tr>";
			}
			echo "</table><hr/>";
		}
	?>
</body>
</html>