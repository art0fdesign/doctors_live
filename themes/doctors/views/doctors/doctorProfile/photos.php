<h1 class="title">Photo gallery:</h1>

<?php foreach( $medias as $item ){ ?>
<?php if( $item->f_type == 'img' ): ?>
<div class="route gallery1">
    <a href="<?php echo $item->getFileUrl(); ?>" class="frame" rel="lightbox[gallery1]" >    
        <img src="<?php echo $item->getThumbUrl(); ?>" alt="Photo 1"/>
    </a>
    <div>        
        <h2><?php echo $item->title;?></h2>         
        <p><?php //echo $item->description;?></p>    
    </div>

</div>
<?php endif; ?>
<?php } ?>



<h1 class="title" style="margin-top:25px;">Video gallery:</h1>



<?php foreach( $medias as $item ){ ?>
<?php if( $item->f_type == 'vid' ): ?>
<div class="route gallery">

    <div class="videoframe">
        <?php echo $this->widget('ext.youtube.YoutubeWidget', array( 'params'=>array( 'src'=>$item->video_url, 'width'=>'250', 'height'=>'195')))->html; ?>
        <!--
        <object style="height: 195px; width: 250px">
        <param name="movie" value="<?php echo $item->video_url; ?>?version=3&feature=player_detailpage">
        <param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
        <embed src="<?php echo $item->video_url; ?>?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="250" height="195"></object>
        -->
    </div>

    <div class="text">
        <h2><?php echo $item->title;?></h2>         
        <p><?php echo $item->description;?></p>    
    </div>

</div>
<?php endif; ?>
<?php } ?>
