<div class="titleBlock">
    <span>TEMPLATES: View Template - <?php echo $model->name; ?></span>

<?php if( isset(Yii::app()->params['admin_plus']['display']) && Yii::app()->params['admin_plus']['display'] ):?>
    <span class="blockMenu">
        <?php echo CHtml::link('Layout',array('template/updateLayout', 'id'=>$model->id)); ?>&nbsp;&nbsp;&nbsp;
        <?php echo CHtml::link('Sectors',array('template/updateSectors', 'id'=>$model->id)); ?>&nbsp;&nbsp;&nbsp;
    </span>
<?php  endif; ?>

</div>

<?php echo $this->renderPartial('_view', array('model'=>$model)); ?>
