	<ul>
        <?php foreach( $menus as $item ){ ?>
        <li class="<?php echo $item['class'];?>"><a href="<?php echo $item['href']; ?>"><?php echo $item['title']; ?></a></li>
        <?php } ?>	
	</ul>