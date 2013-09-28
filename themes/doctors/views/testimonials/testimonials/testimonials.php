<?php
/**
 * Created by Lemmy.
 * Date: 10/25/12
 * Time: 1:46 PM
 */?>
<div class="Fleft1">
    <ul id="fader1">
        <?php foreach($testimonials as $testimonial):?>
        <li class="slide1">
            <span class="title"><a href="#">Testimonials</a></span>
            <p><?php echo $testimonial->content;?><br /></p>
            <span class="signature"><?php echo $testimonial->title;?>&nbsp;<?php echo $testimonial->name;?></span>
        </li>
        <?php endforeach ?>
    </ul>
</div>