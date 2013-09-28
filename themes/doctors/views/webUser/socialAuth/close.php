<script language="javascript"> 
	if(  window.opener ){
		window.opener.parent.location.href = "<?php echo $return_to; ?>";
	}

	window.self.close();
</script>
