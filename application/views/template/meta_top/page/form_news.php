<script src="<?php echo base_url().'assets/js/tinymce/tinymce.min.js';?>"></script>
<script>
tinymce.init({
    selector: '.description',
	relative_urls : false,
	remove_script_host : false,	
	height:400,
	plugins: [
		'advlist autolink lists link image charmap print preview anchor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table contextmenu paste code'
	],
	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
});
</script>
