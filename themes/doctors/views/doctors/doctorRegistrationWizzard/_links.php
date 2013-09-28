<?php
//$postStep = '';
//if( isset($_POST['Navigation'])) $postStep = Yii::app()->session[ 'aod_doctor_profile_current_step' ];
//
$active = array(0=>'', '', '', '', '', '', '', '');
if( $this->pars[1] == 'intro' ) $active[0] = ' class="active"';
elseif( $this->pars[1] == 'step1' ) $active[1] = ' class="active"';
elseif( $this->pars[1] == 'step2' ) $active[2] = ' class="active"';
elseif( $this->pars[1] == 'step3' ) $active[3] = ' class="active"';
elseif( $this->pars[1] == 'step4' ) $active[4] = ' class="active"';
elseif( $this->pars[1] == 'step5' ) $active[5] = ' class="active"';
elseif( $this->pars[1] == 'step6' ) $active[6] = ' class="active"';
//
$baseUrl = Frontend::getPageIDByWidget('doctorRegistrationWizzard');
$baseUrl = Frontend::getPageData( $baseUrl );
$baseUrl = Yii::app()->request->baseUrl . '/' . $baseUrl;
?>
    <div class="title step_links">
        <a href="<?php echo $baseUrl . '/intro';?>"<?=$active[0]?> title="Intro">Intro</a>&nbsp;&nbsp;
        <a href="<?php echo $baseUrl . '/step1';?>"<?=$active[1]?> title="Profile Details">Step 1</a>&nbsp;&nbsp;
        <a href="<?php echo $baseUrl . '/step2';?>"<?=$active[2]?> title="Speciality">Step 2</a>&nbsp;&nbsp;
        <a href="<?php echo $baseUrl . '/step3';?>"<?=$active[3]?> title="Professionals Details">Step 3</a>&nbsp;&nbsp;
        <a href="<?php echo $baseUrl . '/step4';?>"<?=$active[4]?> title="Locations">Step 4</a>&nbsp;&nbsp;
        <a href="<?php echo $baseUrl . '/step5';?>"<?=$active[5]?> title="Photos & Videos">Step 5</a>&nbsp;&nbsp;
        <a href="<?php echo $baseUrl . '/step6';?>"<?=$active[6]?> title="Social Media">Step 6</a>
    </div>
