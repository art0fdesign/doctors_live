<div class="titleBlock">
    <span>SURVEY QUESTIONS: List of Survey Questions</span>
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
                <th>ID</th>
                <th>Survey</th>
                <th>Category</th>
                <th>Question</th>
                <th>Response</th>
                <th>Status</th>
        		<th>Actions</th>        
            </tr>
        </thead>
        
        <tbody>
        <?php  foreach($models as $item) : ?>
        	
        <tr class='<?php if($item->Status_ID==1) echo 'gradeA'; else echo 'gradeC'; ?>'>
        <td><?php echo $item->primaryKey;?></td>
        <td><?php echo $item->Survey->SurveyName;?></td>
        <td><?php echo $item->Category->Code;?></td>
        <td><?php echo MyFunctions::getShortText($item->Question, 50, '...');?></td>
        <td><?php echo $item->ResponseType->response_name;?></td>
        <td><?php echo $item->getQuestionStatusLabel($item->Status_ID);?></td>
        <td class='center'>
<?php if($survey || $category): ?>
        <?php echo CHtml::link('', array('view', 'id'=>$item->id, 'survey'=>$survey, 'category'=>$category), array('title'=>'View Survey Question', 'class'=>'action BtnView')); ?>
        <?php echo CHtml::link('', array('update', 'id'=>$item->id, 'survey'=>$survey, 'category'=>$category), array('title'=>'Edit Survey Question', 'class'=>'action BtnEdit')); ?>
<?php else: ?>
        <?php echo CHtml::link('', array('view', 'id'=>$item->id), array('title'=>'View Survey Question', 'class'=>'action BtnView')); ?>
        <?php echo CHtml::link('', array('update', 'id'=>$item->id), array('title'=>'Edit Survey Question', 'class'=>'action BtnEdit')); ?>
<?php endif; ?>
        <?php echo CHtml::link('', '', array('submit'=>array('activate', 'id'=>$item->id), 'title'=>'Active/Inactive', 'class'=>'action BtnRead')); ?>
        <?php echo CHtml::link('', '', array('submit'=>array('delete', 'id'=>$item->id), 'confirm' => 'Are you sure?', 'title'=>'Delete Survey Question', 'class'=>'action BtnDelete')); ?>
		</td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        
        </table>
        <div class="tfooter">Total number of Survey Questions: <?php echo count($models);?></div>
    </div>

</div>
