<?php 
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-password-form', 'enableAjaxValidation'=>false )); 
?>

    <h1 class="title">Change Password:</h1>

    <fieldset class="leftalign">

<?php if( !empty($message)): ?>        
        <dl class="float_left">
            <?php echo $message; ?>&nbsp;
        </dl><br class="clear"/><br />
<?php endif; ?>        
<?php if( !$skipPasswordCheck ): ?>
        <dl class="float_left short long">
            <dt><span>OLD PASSWORD:</span></dt>
            <dd>
                <input type="password" name="WebPass[old]" class="textbox textbox4" tabindex="10" /> 
            </dd>
        </dl><br class="clear"/><br />
<?php endif; ?>        
        <dl class="float_left short long">
            <dt><span>NEW PASSWORD:</span></dt>
            <dd>
                <input type="password" name="WebPass[new]" class="textbox textbox4" value="<?=@$_POST['WebPass']['new'];?>" tabindex="20" /> 
            </dd><br class="clear"/>
            <dt><span>REPEAT PASSWORD:</span></dt>
            <dd>
                <input type="password" name="WebPass[repeat]" class="textbox textbox4" value="<?=@$_POST['WebPass']['repeat'];?>" tabindex="30" /> 
            </dd><br class="clear"/>
        </dl>

        <dl class="float_left">
        <dd>
            <input class="blue_btn submit" type="submit" tabindex="40" value="Submit" name="Submit" />
        </dd>
        </dl>
        

    </fieldset>
<?php $this->endWidget();?>
