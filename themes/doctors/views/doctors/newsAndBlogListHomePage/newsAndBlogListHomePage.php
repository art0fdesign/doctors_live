<?php
/**
 * Created by Lemmy.
 * Date: 9/18/12
 * Time: 6:28 PM
 */?>
<div class="textblock_left widget1">
    <div class="bloglist float_left">
        <h2 class="widget_title">
            <a href="<?php echo $listUrlN; ?>">Latest <span>News</span></a>
        </h2>
        <ul>
            <?php foreach($news as $new): ?>
                <li>
                    <a href="<?php echo $detailsUrlN .'/'. MyFunctions::parseForSEO($new->news_name); ?>">
                        <img src="<?php echo $new->loadNewsImageHomePage(); ?>" width="50px" height="55px">
                    </a>

                    <p>
                        <?php echo $new->getShortText($new->news_text, 75) ?><br />
                        <a href="<?php echo $detailsUrlN .'/'. MyFunctions::parseForSEO($new->news_name); ?>">
                            <?php echo $new->news_name; ?>
                        </a>
                    </p>
                </li>
                <br />
            <?php endforeach ?>
        </ul>
    </div>

    <div class="bloglist float_right">
        <h2 class="widget_title">
            <a href="<?php echo $listUrlP; ?>">Latest <span>Blog Posts</span></a>
        </h2>
        <ul>
            <?php foreach($posts as $post): ?>
            <li>
                <a href="<?php echo $detailsUrlP .'/'. MyFunctions::parseForSEO($post->blog_name); ?>">
                    <img src="<?php echo $post->loadBlogImageHomePage(); ?>" width="50px" height="55px">
                </a>
                <p>
                    <?php echo $post->getShortText($post->blog_content, 75); ?><br />
                    <a href="<?php echo $detailsUrlP .'/'. MyFunctions::parseForSEO($post->blog_name); ?>">
                        <?php echo $post->blog_name; ?>
                    </a>
                </p>
            </li><br />
            <?php endforeach; ?>
        </ul>
    </div>

</div>
