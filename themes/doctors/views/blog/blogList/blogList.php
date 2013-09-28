<?php
/**
 * Created by Lemmy.
 * Date: 8/9/12
 * Time: 11:32 AM
 */
 $url = Yii::app()->request->baseUrl . '/' . $detailsUrl;
 ?>
<h1 class="title">Blog</h1>

<div class="route general">
    <?php echo @$sets['blogList-intro']['set_value']; ?>
</div>

<?php foreach($models as $model): ?>
    <div class="blog">
        <a href="<?php echo $url; ?>/<?php echo MyFunctions::parseForSEO($model->blog_name); ?>" tabindex="90">
            <img width="202" height="157" alt="blog img" src="<?php echo $model->loadBlogImage(); ?>"></a>
        <h3><?php echo $model->blog_name; ?></h3>
        <p class="subtitle">date: <?php echo $model->formatDate(); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>by: <?php echo $model->blog_author; ?></b><br />
            <em><?php echo $model->getNumOfComments(). ' ' .$model->getRightTextForComments();?></em></p>
        <?php echo strip_tags($model->getShortText($model->blog_content, 200)); ?>
        <a class="blue_btn submit" href="<?php echo $url; ?>/<?php echo MyFunctions::parseForSEO($model->blog_name); ?>" tabindex="90">read more</a>
    </div>
<?php endforeach; ?>
