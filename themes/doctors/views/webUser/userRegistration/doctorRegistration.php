<?php
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;    
    $states = CMap::mergeArray( array(''=>'----'),  Doctor::getUSStates() );
?>
<div class="picture">



    <img src="<?php echo $baseUrl; ?>/img/pic_member.jpg" alt="Picture">

    <h1 class="title1"><span class="blue">update your profile</span><br/>

        for free!<br/>

        <em>giving patients an opportunity<br/>

            to find you easier</em>

    </h1>



</div>

<div class="ajaxLoading">
    <img src="<?php echo $baseUrl; ?>/img/ajax-loader.gif" alt="Form is submitting" />
</div>

<h1 class="title">Doctor Registration:</h1>

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'web-user-registration-form',
    //'htmlOptions'=>array('class'=>'form'),
	'enableAjaxValidation'=>true,
)); 
?>

    <fieldset>

        <?php //echo $form->errorSummary( $model ); ?>

        <dl class="float_left">
            <dt><label>FIRST NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'first_name', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'first_name' ); ?>
            </dd>
        </dl>

        <dl class="float_left">
            <dt><label>LAST NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'last_name', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'last_name' ); ?>
            </dd>
        </dl><br class="clear">



        <dl class="float_left">

            <dt><label>E-MAIL ADDRESS:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'email', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'email' ); ?>
            </dd>

        </dl>



        <dl class="float_left">
            <dt><label>CONFIRM E-MAIL ADDRESS:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'email_repeat', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'email_repeat' ); ?>
            </dd>
        </dl><br class="clear">



        <dl class="float_left">
            <dt><label>USER NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'user_name', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'user_name' ); ?>
            </dd>
        </dl><br class="clear">



        <dl class="float_left">
            <dt><label>PASSWORD:*</label></dt>
            <dd>
                <?php echo $form->passwordField( $model, 'user_pwd', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'user_pwd' ); ?>
            </dd>
        </dl>

        <dl class="float_left">
            <dt><label>CONFIRM PASSWORD:*</label></dt>
            <dd>
                <?php echo $form->passwordField( $model, 'user_pwd_repeat', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'user_pwd_repeat' ); ?>
            </dd>
        </dl><br class="clear" />

        <dl class="float_left">
            <dt><label>NPI NUMBER:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'npi', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'npi' ); ?>
            </dd>
        </dl><br class="clear" />

<!--         <dl class="float_left short long">
            <dt><label>STATE:*</label></dt>
            <dd>
                <span class="select selectWrapper">----</span>
                <select name="WebLogin[npi_state]" class="stled">
                <?php foreach( $states as $key=>$value ){ ?>
                    <option value="<?php echo $key;?>"<?php if( $key == @$model->npi_state ) echo ' selected="selected"'; ?>><?php echo $value;?></option>
                <?php } ?>
                </select>
            </dd>
        </dl>

        <dl class="float_left" style="margin-left:50px;">
            <dt><label>LICENSE NUMBER:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'npi_license', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'npi_license' ); ?>
            </dd>
        </dl>
 -->

        <dl class="float_left check">

            <dd>
                <?php echo $form->checkBox( $model, 'f_newsletter', array( 'class'=>'styled', 'id'=>'news', 'checked'=>'checked' )); ?>
            </dd>

            <dt><label for="news">I would like to receive important news updates and offers from TopDoctors.com and its health-friendly partners</label></dt>

        </dl>

        <br/>

        <dl class="float_left check">

            <dd>
                <input type="checkbox" name="terms" id="terms" class="styled">
            </dd>

            <dt>
                <label for="terms">I agree to the <a href="#" id="show_terms">Terms of Use and Privacy Policy</a></label>
                <!--<span>Returning User? <a href="#">Login now</a></span>-->
            </dt><br class="clear" />
            <div class="errorMessage mt10" id="terms_error_msg" style="display:none">&nbsp;</div> 

        </dl>



        <dl class="float_left">

            <dd>
                <input type="hidden" name="Action" value="Registration">
                <input id="form_submit" class="blue_btn submit" type="submit" value="Submit" name="Save">
            </dd>

        </dl>



    </fieldset>

<?php $this->endWidget(); ?>

<script id="terms-script-id" type="text/x-jquery-tmpl">
    <div id="blanket" style="display:none;"></div>
    <div id="popUpDiv" style="display:none; min-height:550px; height:auto; background-image:none; padding:25px;">

             <a class="back" href="#">close</a>

            <h2 class="mb20 blue">Terms of Use and Privacy Policy</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tortor magna, at elementum elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur sagittis nisl a dui mollis porttitor. Vestibulum velit quam, egestas sed dignissim tempus, egestas nec neque. Mauris non ipsum convallis libero mattis aliquet. Donec pharetra lacinia est ac congue. Pellentesque eros velit, aliquet ac consequat a, mattis sed magna. Aliquam velit metus, aliquet ultrices convallis vel, elementum eu lorem.</p><br class="clear" />
			<h3>Fusce et elit quam</h3>
			<p>Fusce libero augue, ultrices ut convallis et, rutrum vitae ligula. Fusce in malesuada risus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam tortor arcu, auctor quis ornare at, pharetra vel quam. Sed et tortor at lacus lobortis scelerisque sit amet a massa. Aenean odio felis, accumsan dapibus imperdiet placerat, rutrum vel purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris ut massa nec nisi rutrum eleifend sit amet quis felis.</p><br class="clear" />
			<h3>Lorem ipsum dolor sit amet</h3>
			<p>In tempus dolor sed massa porttitor posuere. Integer eleifend elementum odio, sed pulvinar nibh volutpat in. Phasellus in metus in ante dignissim egestas vel et tellus. Vestibulum dapibus vulputate enim a hendrerit. Nunc porta gravida nisl vel hendrerit. Sed vel risus vitae orci ornare congue. Nunc eget nisi sit amet libero porttitor egestas. Donec massa risus, consequat eu sodales eu, tristique ac urna.</p><br class="clear" />
			<h3>Fusce et elit quam</h3>
			<p>Fusce et elit quam. Aenean non est at diam pretium lobortis ac non augue. Donec tempor est quis neque tincidunt volutpat. Nullam suscipit odio a odio ultricies vel luctus erat molestie. Quisque eget diam ut quam facilisis imperdiet. In quis felis sit amet libero pulvinar posuere. Nullam viverra dui vitae urna sodales molestie. Etiam enim diam, luctus vitae vulputate eget, consectetur eu libero. In laoreet imperdiet rhoncus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas hendrerit, ligula at ornare volutpat, risus augue hendrerit sem, tempor ultrices arcu dui eu mauris. Proin dignissim porta odio, sit amet blandit mauris bibendum id. Pellentesque quis leo vel augue posuere rutrum. Ut diam urna, congue sit amet vulputate sit amet, venenatis auctor est. Nam commodo tristique accumsan. </p><br class="clear" />
			<h3>Lorem ipsum dolor sit amet</h3>
			<p>In tempus dolor sed massa porttitor posuere. Integer eleifend elementum odio, sed pulvinar nibh volutpat in. Phasellus in metus in ante dignissim egestas vel et tellus. Vestibulum dapibus vulputate enim a hendrerit. Nunc porta gravida nisl vel hendrerit. Sed vel risus vitae orci ornare congue. Nunc eget nisi sit amet libero porttitor egestas. Donec massa risus, consequat eu sodales eu, tristique ac urna.</p><br class="clear" />

        </div>

    </div>
</script>

