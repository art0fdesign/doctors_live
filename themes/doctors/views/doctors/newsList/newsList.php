<?php
/**
 * Created by Lemmy.
 * Date: 9/9/12
 * Time: 10:00 PM
 */?>
<h1 class="title">News</h1>

<div class="route general">
    <p><?php echo @$sets['newsList-intro']['set_value']; ?></p>
</div>

<?php foreach($models as $model): ?>
<div class="blog">
    <img width="202" height="157" alt="blog img" src="<?php echo $model->loadNewsImage(); ?>">
    <h3><?php echo $model->news_name; ?></h3>
    <p class="subtitle">date: <?php echo $model->formatDate(); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;source: <?php echo $model->news_source; ?></p>
    <p><?php echo $model->getShortText($model->news_text, 360); ?></p>
    <a class="blue_btn submit" href="<?php echo $url; ?>/<?php echo MyFunctions::parseForSEO($model->news_name); ?>" tabindex="90">read more</a>
</div>
<?php endforeach; ?>