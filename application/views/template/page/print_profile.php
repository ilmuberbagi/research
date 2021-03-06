<div class="row">
	<div class="col-md-12">
		<!-- h4 align="center">Researcher Profile<br/>Fakultas Teknik<br/>Universitas Indonesia</h4 -->
		<?php
			// echo "<table class='title'><tr><td colspan='3' rowspan='3'><img src='".site_url().'assets/public/img/logo-ftui.jpg'."' width='250'></td><td colspan='3'><b>FAKULTAS TEKNIK<br/>UNIVERSITAS INDONESIA</b></td></tr></table><br/>";
		?>
		<h2>Researcher Profile</h2>
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<td><?php echo $user[0]['name'];?></td>
				<td rowspan="12" align="center"><img src="<?php echo $user[0]['avatar']? $user[0]['avatar']:site_url().'assets/img/user.jpg';?>" class="img" width="130"></td>
			</tr>
			<tr><th width="200">NIP/NUP</th><td><?php echo $user[0]['user_code'];?></td></tr>
			<tr><th>Department</th><td><?php echo $user[0]['department_name'];?></td></tr>
			<tr><th>Email</th><td><?php echo $user[0]['email'];?></td></tr>
			<tr><th>Phone</th><td><?php echo $user[0]['phone'];?></td></tr>
			<tr><th>Expertise</th><td><?php echo $user[0]['expertise'] == '' ? '---': $user[0]['expertise'];?></td></tr>
			<tr><th>Research Interest</th><td><?php echo $user[0]['research_interest'] == ''? '---':$user[0]['research_interest'];?></td></tr>
			<tr><th>Link Research Gate</th><td><?php echo $user[0]['link_research_gate'] == ''? '---': $user[0]['link_research_gate'];?></td></tr>
			<tr><th>Link Google Scholar</th><td><?php echo $user[0]['link_google_scholar'] == ''? '---': $user[0]['link_google_scholar'];?></td></tr>
			<tr><th>Link Scopus</th><td><?php echo $user[0]['link_scopus'] ==''? '---':$user[0]['link_scopus'];?></td></tr>
			<tr><th>H-index Google Scholar</th><td><?php echo $user[0]['index_scholar'] == ''? '---': $user[0]['index_scholar'];?></td></tr>
			<tr><th>H-index Scopus</th><td><?php echo $user[0]['index_scopus'] == ''? '---': $user[0]['index_scopus'];?></td></tr>
			<tr><th>Profile</th><td colspan="2" align="justify"><?php echo $user[0]['profile'];?></td></tr>
		</table>
		<hr/>
		<?php 
			if(!empty($types)){
				foreach($types as $t){
					if(!empty($publication[$t['type_id']])){
						echo "<h4>".$t['type_name']."</h4>";
						echo "<table class='table table-bordered table-striped'>";
						echo "<tr><th>No</th><th>Title</th><th>Authors</th><th>Year</th><th>Publisher</th></tr>";
						$no=0;
						foreach($publication[$t['type_id']] as $p){ $no++;
							echo "<tr>";
								echo "<td>".$no."</td>";
								echo "<td>".$p['title']."</td>";
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
				echo "<h4>Grants</h4>";
				echo "<table class='table table-bordered table-striped'>";
				echo "<tr><th>No</th><th>Title</th><th>Authors</th><th>Year</th></tr>";
				$no=0;
				foreach($grants as $p){ $no++;
					echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$p['research_title']."</td>";
						echo "<td>".$p['main_researcher']."</td>";
						echo "<td>".$p['grant_year']."</td>";
					echo "</tr>";
				}
				echo "</table><hr/>";
			}
		?>
	</div>
</div>