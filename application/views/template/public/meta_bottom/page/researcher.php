<script>
	function profile_preview(id){
		$.ajax({
			type : 'GET',
			url : '<?php echo site_url()."home/get_user/";?>'+id, 
			success: function(data){
				//alert(data[0].user_id);
				if (data[0].profile == '')
					$('#contentProfile').html("Researcher's profile have not filled...");
				else
					$('#contentProfile').html(data[0].profile);

				$('#titleProfile').html("Profile "+data[0].name);

			}, error: function(){
				alert('Error connection');
			}
		});
	}
</script>