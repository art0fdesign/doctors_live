<?php
/**
 * Created by Lemmy.
 * Date: 9/18/12
 * Time: 4:58 PM
 */?>

<div class="textblock_left widget1">
    <h2 class="widget_title_long">
        <a href="<?php echo $listUrl; ?>">Search by <span>health issue</span></a>
    </h2>
    <div class="articlelist float_left">
        <ul>
            <?php foreach($models as $key=>$model): ?>
                <li>
                    <h3><span><?php echo $key+1;?></span><?php echo $this->getShortText($model->cat_name_issue, 32, false); ?></h3><br />
                    <p>
                        <?php foreach($this->healthIssues($model, 5) as $issue): ?>
                            <a style="text-decoration: none; font-size: 12px; float:left; padding: 0; color: #818181; font-family: Arial,Gadget,sans-serif; font-style: normal; margin: 0 0 0px; display: inline;" href="<?php echo $detailsUrl.'/'.MyFunctions::parseForSEO($issue); ?>">
                                *<?php echo $issue; ?>&nbsp;</a>
                        <?php endforeach ?>
                        <br />
                        <a href="<?php echo $categoryUrl . '/' . MyFunctions::parseForSEO($model->cat_name_issue); ?>">
                            ( view all )
                        </a>
                    </p>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>