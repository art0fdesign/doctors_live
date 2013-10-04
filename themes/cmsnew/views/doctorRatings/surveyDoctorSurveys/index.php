<div class="titleBlock">
    <span>DOCTOR SURVEYS: List of Doctor Surveys</span>
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

        <table class="display dAjaxTable">

        <thead>
    		<tr>       
                <th>ID</th>
                <th>Doctor</th>
                <th>Survey</th>
                <th>Type</th>
        		<th>Actions</th>        
            </tr>
        </thead>
        
        <tbody>
    		<tr>
    			<td colspan="4" class="dataTables_empty">Loading data from server</td>
    		</tr>
        </tbody>
        
        </table>

    </div>

</div>
