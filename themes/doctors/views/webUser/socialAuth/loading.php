<?php
    // theme baseUrl
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;
?>
<table width="100%" border="0">
  <tr>
    <td align="center" height="190px" valign="middle"><img src="<?=$baseUrl?>/img/loading.gif" /></td>
  </tr>
  <tr>
    <td align="center"><br /><h3>Loading...</h3><br /></td> 
  </tr>
  <tr>
    <td align="center">Contacting <b><?php echo ucfirst( strtolower( strip_tags( $provider ) ) ) ; ?></b>. Please wait.</td> 
  </tr> 
</table>

<script>
	window.location.href = window.location.href + "&redirect_to_idp=1";
</script>
