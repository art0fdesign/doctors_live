<h1 class="title">Change Password:</h1>
<?php
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-password-form', 'enableAjaxValidation'=>false )); 
?>
<fieldset class="leftalign">
    
<?php if( !empty($message)): ?>        
    <div>
        <?php echo $message; ?>&nbsp;
    </div><br class="clear"/><br />
<?php endif; ?>        
<?php if( !$skipPasswordCheck ): ?>

    <dl class="float_left">
        <dt><label>OLD PASSWORD:*</label></dt>
        <dd>
            <input type="password" name="WebPass[old]" class="textbox textbox4" tabindex="10" /> 
        </dd>
    </dl><br class="clear"/><br />
<?php endif; ?>        

    <dl class="float_left">
        <dt><label>NEW PASSWORD:*</label></dt>
        <dd>
            <input type="password" name="WebPass[new]" class="textbox textbox4" value="<?=@$_POST['WebPass']['new'];?>" tabindex="20" /> 
        </dd>
    </dl><br class="clear"/>
    
    <dl class="float_left">
        <dt><label>CONFIRM PASSWORD:*</label></dt>
        <dd>
            <input type="password" name="WebPass[repeat]" class="textbox textbox4" value="<?=@$_POST['WebPass']['repeat'];?>" tabindex="30" /> 
        </dd>
    </dl><br class="clear"/>
    
    <dl class="float_left">
        <dd>
            <!--<a class="blue_btn submit" tabindex="90" href="#">Submit form</a>-->
            <input type="submit" class="blue_btn submit" name="Profile[Password]" value="Submit form" />
        </dd>
    </dl>
</fieldset>
<?php $this->endWidget();?>
