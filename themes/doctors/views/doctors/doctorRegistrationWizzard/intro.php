<?php 
if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;    
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-registration-form' )); 
?>

<div>

<h1 class="title">Welcome doctor: <span><?php echo !empty($doctor)? $doctor->fullName: Yii::app()->webuser->fullName; ?></span></h1>


    
    <?php echo @$settings['wizzard-intro-above']['set_value'];?>
        




	<img src="<?php echo $baseUrl; ?>/img/pic_steps.png" alt="steps" class="steps">


    
    <?php echo @$settings['wizzard-intro-bellow']['set_value'];?>
        



   <input id="form_submit" class="blue_btn submit" type="submit" tabindex="10" value="Application  wizard" name="Navigation[Next]">

</div>
<?php $this->endWidget(); ?>
