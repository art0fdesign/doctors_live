<?php
/**
 * Created by Lemmy.
 * Date: 10/5/12
 * Time: 5:55 PM
 */
?>
<div class="textblock_left widget">
    <h2><a href="#">TOP DOCTORS <span>OF THE MONTH </span><span style="text-transform: none">(<?php echo date('F Y'); ?>)</span></a></h2>
    <div class="doctorsPic">
        <?php foreach($doctors as $item): ?>
        <a href="<?php echo $reviewBaseUrl . $item->id . '/' . MyFunctions::parseForSEO($item->getFullName()); ?>">
            <?php if(!$item->getThumbSrc('desk'))
                $img = Yii::app()->baseUrl . '/themes/doctors/img/bgr_picframe.jpg';
            else $img = $item->getThumbSrc('desk'); ?>
            <!--<img src="<?php //echo Yii::app()->baseUrl . '/themes/doctors/img/bgr_picframe.jpg'; ?>" alt="" width="110px" height="110px">-->
            <img src="<?php echo $img; ?>" alt="" width="110px" height="110px">
            <?php $defaultLoc = DoctorsUserLocation::getDefaultLocation($item->id);
                $city = @$defaultLoc->location->city;
                $stateCode = @$defaultLoc->location->state_code;
            ?>
            <div class="line">
                Dr.&nbsp;<?php echo $item->getFullName() ?>
                <span><?php echo $city;?>, <?php echo $stateCode;?></span>
            </div>
        </a>
        <?php endforeach ?>
    </div>
</div>