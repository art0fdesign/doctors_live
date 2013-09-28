<?php
$counter = 1;
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-registration-form', 'enableAjaxValidation'=>false )); 
?>
<div>
<?php include_once('_links.php'); ?>

    <h1 class="title step_title">Step 3: Professionals Details</h1>
    
    <?php echo @$settings['wizzard-step3-intro']['set_value'];?>
        
    <fieldset class="leftalign">
        
        <div id="template-group-div">
        <?php foreach( $choiceList as $listItem ){ ?>
<?php 
    $description = '';
    foreach( $choices as $item ){
        if( $item->choice == $listItem->id ) $description = $item->description;
    } 
?>
        <div class="template-item">
            <dl class="float_left short long">
                <dt style="margin-top:0px;"><span>&nbsp;</span></dt>
                <dd>
                    <input type="text" class="textbox textbox4" name="Professionals[choice][<?=$listItem->id?>]" value="<?=$listItem->choice_name?>" readonly="readonly" />
                </dd>
            </dl><br class="clear"/>
            
            <dl class="float_left">
                <dt><label>&nbsp;</label></dt>
                <dd class="wlink">
                    <textarea name="Professionals[description][<?=$listItem->id?>]" class="textbox textbox3"><?php echo $description;// nl2br($description);?></textarea>
                </dd>
            </dl>
        </div>
        <div class="clear"></div>
        <?php } //foreach( $choiceList ) ?>
        </div>

        <!-- NAVIGATION -->
        <dl class="float_left">
        <dd>
            <input class="gray_btn prev" type="submit" tabindex="40" value="Prev" name="Navigation[Prev]">            
            <!--<a  class="gray_btn prev" id="prev_fourth" tabindex="40">Prev</a>-->
        </dd>
        </dl>
        <dl class="float_left">
        <dd>
            <input class="blue_btn next submit" type="submit" tabindex="50" value="Next" name="Navigation[Next]">
            <!--<a  class="blue_btn next submit" id="submit_fourth" tabindex="50">Next</a>-->
        </dd>
        </dl>
    </fieldset>
</div>
<?php $this->endWidget(); ?>
