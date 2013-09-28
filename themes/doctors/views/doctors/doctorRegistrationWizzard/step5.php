<?php
$mediaOptions = array( 'img'=>'PHOTO', 'vid'=>'VIDEO');//, 'pdf'=>'PDF' );
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-registration-form', 'htmlOptions' => array('enctype' => 'multipart/form-data'), 'enableAjaxValidation'=>true )); 
?>
<div>
<?php include_once('_links.php'); ?>

    <h1 class="title step_title">Step 5: Photos &#38; Videos</h1>
    
    <?php echo @$settings['wizzard-step5-intro']['set_value'];?>
        
    <fieldset class="leftalign">
        
        <dl class="float_left">
            <?php echo $form->errorSummary( $media ); ?>
        </dl>
        <div class="clear"></div>
        
        <dl class="float_left short medium">
            <dt><span>MEDIA TYPE:</span></dt>
            <dd>
                <span class="select selectWrapper">PHOTO</span>
                <?php echo $form->dropDownList( $media, 'f_type', $mediaOptions, array('class'=>'stled', 'id'=>'media_type_select') ); ?>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left">
            <dt><label>MEDIA TITLE:</label></dt>
            <dd>
                <?php echo $form->textField( $media, 'title', array( 'class'=>'textbox textbox4' )); ?>
                <?php echo $form->error( $media, 'title' ); ?>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left">
            <dt><label>DESCRIPTION:</label></dt>
            <dd>
                <?php echo $form->textArea( $media, 'description', array( 'class'=>'textbox textbox40', 'cols'=>'30', 'rows'=>'5' )); ?>
            </dd>
        </dl><br class="clear"/>
        
        <div id="file_wrapper"<?php echo $media->f_type=='vid'? ' style="display:none;"': ''; ?>>
        <dl class="float_left" style="width:550px;">
            <dt><label>MEDIA LOCATION:</label></dt>
            <dd class="wlink textbox textbox4" style="margin-top:2px;">
                <?php echo $form->fileField( $media, 'image', array( 'class'=>'file', 'size'=>'38', 'id'=>'file_photo_upload' )); ?>
                <?php echo $form->error( $media, 'image' ); ?>
				<span class="fileSearch"></span>
                <dd>
                    <a class="gray_btn" style="font-weight:bold;">Browse</a>
                    <input id="media_upload_button" class="blue_btn upload" type="submit" value="Upload" name="FileUpload" style="display:none;" />
                </dd>                
                <div class="clear"></div>                
            </dd>
        </dl>
        </div>
        
        <div id="video_wrapper"<?php echo $media->f_type!='vid'? ' style="display:none;"': ''; ?>> 
        <dl class="float_left">
            <dt><label>URL</label></dt>
            <dd>
                <?php echo $form->textField( $media, 'video_url', array( 'class'=>'textbox textbox4' ) ); ?>
                <?php echo $form->error( $media, 'video_url' ); ?>
            </dd>
        </dl>
        <dl class="float_left">
            <dt><label>WIDTH</label></dt>
            <dd>
                <?php echo $form->textField( $media, 'video_width', array( 'class'=>'textbox textbox4' ) ); ?>
            </dd>
        </dl>
        <dl class="float_left">
            <dt><label>HEIGHT</label></dt>
            <dd>
                <?php echo $form->textField( $media, 'video_height', array( 'class'=>'textbox textbox4' ) ); ?>
            </dd>
                <dd>
                    <input class="blue_btn upload" type="submit" value="Upload" name="FileUpload" />
                </dd>
        </dl>
        </div>
        
        <br class="clear"/>        

        <!-- MEDIA LIST TABLE -->
        <br />
        <table id="media_list">
            <thead>
        		<tr>       
            		<th>&nbsp;</th>        
                    <th>Title</th>
                    <th>Type</th>
            		<th>&nbsp;</th>        
                </tr>
            </thead>
            
        	<tbody>
<?php foreach( $list as $item ){ ?>
                <tr>
                    <td><img src="<?php echo $item->getThumbUrl('profile');?>" /></td>
                    <td><?php echo $item->title;?></td>
                    <td><?php echo $item->getTypetext( $item->f_type );?></td>
                    <td><a href="#" class="BtnDelete remove_media" id="remove_<?=$item->id?>" title="Remove media"></a></td>
                </tr>
<?php } ?>
        	</tbody>
        </table>
        <br class="clear"/>        

        <!-- NAVIGATION -->
        <dl class="float_left">
        <dd>
            <input class="gray_btn prev" type="submit" tabindex="100" value="Prev" name="Navigation[Prev]">            
            <!--<a  class="gray_btn prev" id="prev_sixth" tabindex="100">Prev</a>-->
        </dd>
        </dl>
        <dl class="float_left">
        <dd>
            <input class="blue_btn next submit" type="submit" tabindex="110" value="Next" name="Navigation[Next]">
            <!--<a  class="blue_btn next submit" id="submit_sixth" tabindex="40">Next</a>-->
        </dd>
        </dl>
        
    </fieldset>
</div>
<?php $this->endWidget(); ?>
