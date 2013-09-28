<?php
$userName = Yii::app()->webuser->model->user_name; 
$pWord = MyFunctions::generatePassword( 12, 1 );
$pageID = Frontend::getPageIDByWidget('doctorProfile');
$pcUrl = Yii::app()->baseUrl . '/' . Frontend::getPageData( $pageID ) . '/password'; 
//
$pageID = Frontend::getPageIDByWidget('doctorSearchSidebar');
$url['base'] = Yii::app()->request->baseUrl . '/' . Frontend::getPageData( $pageID );
$url['cat'] = $url['base'] . '/' . $model->category->url; 
$url['spec'] = $url['cat'] . '/' . MyFunctions::parseForSEO( is_object( $model->speciality )? $model->speciality->spec_name: 'not-defined' );
$url['sspec'] = $url['spec'] . '/' . MyFunctions::parseForSEO( is_object( $model->subspeciality )? $model->subspeciality->subspec_name: 'not-defined' );
$url['name'] = $url['sspec'] . '/' . MyFunctions::parseForSEO( $model->fullName );
//
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-account-form', 'enableAjaxValidation'=>true )); 
?>
<span class="path">
    <a href="<?php echo $url['cat'];?>"><?php echo $model->category->cat_name; ?></a>&#32;&raquo;&#32;
    <?php if( is_object( $model->speciality ) ):?>
    <a href="<?php echo $url['spec'];?>"><?php echo @$model->speciality->spec_name; ?></a>&#32;&raquo;&#32;
    <?php endif;?>
    <?php if( is_object( $model->subspeciality ) ):?>
    <a href="<?php echo $url['sspec'];?>"><?php echo @$model->subspeciality->subspec_name;?></a>&#32;&raquo;&#32;
    <?php endif;?>
    <a href="<?php echo $url['name'];?>">Dr. <?php echo $model->fullName;?></a>
</span>
	

    <h1 class="title">Account data:</h1>

    <fieldset class="leftalign">

        <dl class="float_left">
            <?php $form->errorSummary( $model ); ?>&nbsp;
        </dl><br class="clear"/><br />
        
        <dl class="float_left short long">
            <dt><span>USERNAME:</span></dt>
            <dd>
                <input type="text" name="Login[username]" class="textbox textbox4" value="<?=$userName?>" disabled="disabled" tabindex="110" />
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left short long">
            <dt><span>PASSWORD:</span></dt>
            <dd>
                <div class="pass_wrapper"><a href="<?=$pcUrl?>">Change password</a></div>
            </dd>
        </dl><br class="clear"/><br />
        
        <dl class="float_left short long">
            <dt><span>FIRST NAME*:</span></dt>
            <dd>
                <?php echo $form->textField( $model, 'first_name', array( 'class'=>'textbox textbox4', 'tabindex'=>'10' ) ); ?>
                <?php echo $form->error( $model, 'first_name'); ?>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left short long">
            <dt><span>MIDDLE NAME*:</span></dt>
            <dd>
                <?php echo $form->textField( $model, 'middle_name', array( 'class'=>'textbox textbox4', 'tabindex'=>'20' ) ); ?>
                <?php echo $form->error( $model, 'middle_name'); ?>
            </dd><br class="clear"/>

            <dt><span>LAST NAME*:</span></dt>
            <dd>
                <?php echo $form->textField( $model, 'last_name', array( 'class'=>'textbox textbox4', 'tabindex'=>'30' ) ); ?>
                <?php echo $form->error( $model, 'last_name'); ?>
            </dd><br class="clear"/>

            <dt><span>E-MAIL*:</span></dt>
            <dd>
                <?php echo $form->textField( $model, 'email', array( 'class'=>'textbox textbox4', 'tabindex'=>'40' ) ); ?>
                <?php echo $form->error( $model, 'email'); ?>
            </dd><br class="clear"/>
        </dl>

        <dl class="float_left">
        <dd>
            <input class="blue_btn submit" type="submit" tabindex="50" value="Save" name="Submit" />
        </dd>
        </dl>
        

    </fieldset>
<?php $this->endWidget();?>
