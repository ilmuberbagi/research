<script>
	function profile_preview(id){
		data = id.split('`');
		$('#titleProfile').html("Profile "+data[0]);
		$('#contentProfile').html(data[1]);
	}
</script>