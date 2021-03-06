<div class="titleBlock">
    <span>TESTIMONIALS: List of Testimonials</span>
    <span class="blockMenu">
    <?php echo CHtml::link('Widgets',array('viewWidgets')); ?></span>
</div>
<div class="wideContent">
	<!-- Table -->
    <div class="widget">
		<div class="title"></div>
<!--
		<div class="title">
			<div class="filter">
                <form action="<?php //echo Yii::app()->createUrl($this->route); ?>" method="POST">
                    <div class="select-list">
                        <?php //echo CHtml::dropDownList('filter', $selectedFilterItem, $filterOptions, $htmlOptions = array( 'submit' => '', ));?>
                    </div>
                </form>
			</div>
		</div>
-->
        <table class="display dTable">

        <thead>
    		<tr>       
                <th class="center">ID</th>
                <th>Name</th>
                <th>Title</th>
                <th>Image</th>
                <th>Widget</th>
                <th>Status</th>
        		<th class="center">Actions</th>
            </tr>
        </thead>
        
        <tbody>
        <?php  foreach($models as $item) : ?>
        	
        <tr class='<?php if($item->f_status==1) echo 'gradeA'; else echo 'gradeC'; ?>'>
        <td class="center"><?php echo $item->primaryKey;?></td>
        <td><?php echo $item->name;?></td>
        <td><?php echo $item->title;?></td>
        <td><?php echo $item->image;?></td>
        <td><?php echo $item->getWidgetText($item->f_widget);?></td>
        <td><?php echo $item->getStatusText($item->f_status);?></td>
        <td class='center'>
        <?php echo CHtml::link('', array('view', 'id'=>$item->id), array('title'=>'View Testimonials', 'class'=>'action BtnView')); ?>
        <?php echo CHtml::link('', array('update', 'id'=>$item->id), array('title'=>'Edit Testimonials', 'class'=>'action BtnEdit')); ?>
        <?php echo CHtml::link('', '', array('submit'=>array('activate', 'id'=>$item->id), 'title'=>'Active/Inactive', 'class'=>'action BtnRead')); ?>
        <?php echo CHtml::link('', '', array('submit'=>array('delete', 'id'=>$item->id), 'confirm' => 'Are you sure?', 'title'=>'Delete Testimonials', 'class'=>'action BtnDelete')); ?>
		</td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        
        </table>
        <div class="tfooter">Total number of Testimonials: <?php echo count($models);?></div>
    </div>

</div>
