<div id="markup" style="display: none;">
    <p>Welcome <?php echo $name; ?>,<br />
    Please login to connect Your account with <b><?php echo $provider; ?></b>.</p><br />
    <p>If You don't have account yet please <a class='login_new' href='#'>click here</a> to sign up!</p>
</div>
<script language="javascript"> 
	if(  window.opener ){
	   try{
	       var message = document.getElementById('markup').innerHTML;
	       window.opener.prepareNewAuthentication(message);
	   } catch($e){ alert($e); }
	}
	window.self.close();
</script>
