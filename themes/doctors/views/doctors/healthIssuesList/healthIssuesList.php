

<h1 class="title">Health and Medical Issues</h1>

<div class="route general">
    <?php echo @$sets['list-intro']['set_value']; ?>
</div>
    <?php foreach($categories as $category): ?>
<?php //MyFunctions::echoArray(count($category->issues)); ?>
    <h1 <?php if(strlen($category->cat_name_issue)>20) echo 'class="title_halfmore"'; else echo 'class="title_half"'; ?>>
        <?php echo $category->cat_name_issue . " - list of ilness:"; ?>
    </h1>
        <?php $issues = $this->healthIssues($category, 20);
                $detailsUrl = $urlDetails;
                $categoryUrl = $urlCategory;
                $name = $category->cat_name_issue;
                $text = '... see all';
                ?>
        <?php foreach($this->sortArray($issues, $detailsUrl, $categoryUrl, $name, $text) as $tmpIssues): ?>
            <div class="health_links">
                <?php foreach($tmpIssues as $issue): ?>
                <a href="<?php  echo $issue['url']; ?>/<?php echo MyFunctions::parseForSEO($issue['name']); ?>">
                    <?php echo $issue['text'];?></a>
                <?php endforeach;  ?>
            </div>
        <?php endforeach ?>
        <!--<a href="<?php  //echo $urlCategory; ?>/<?php //echo MyFunctions::parseForSEO($category->cat_name_issue); ?>">
            <?php //echo '..see all';?></a>-->
        <div class="clear"></div>
    <?php endforeach ?>


