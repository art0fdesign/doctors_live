<?php
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;    
?>
<div class="tin_menu affiliation">



	<div class="gray_top"><span>&#32;</span><h2>hospital affiliation</h2></div>

	

	<ul>
<?php foreach( $locations as $locItem ){ $item = $locItem->location; ?>

		<li>

			<h4><?php echo $item->facility;?></h4>

			<p><?php echo $item->address;?><br/>

			<?php echo $item->city . ', ' . $item->state_code . ' ' . $item->zip_code; ?><br/>

			<?php echo $item->phone;?></p>

			<a href="#">Map this Address</a>

			<span class="separator">&#32;</span>

		</li>
<?php } ?>



	</ul>

	

</div>

<div class="bottom">&#32;</div>
