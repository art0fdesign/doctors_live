	<ul>	
		<li class="medical<?php echo @$active['medical']; ?>"><a href="<?php echo $pageUrl . 'medical'; ?>"><em>medical doctors</em></a></li>	
		<li class="dental<?php echo @$active['dental']; ?>"><a href="<?php echo $pageUrl . 'dental'; ?>"><em>dental doctors</em></a></li>
		<li class="animal<?php echo @$active['mental']; ?>"><a href="<?php echo $pageUrl . 'mental'; ?>"><em>mental doctors</em></a></li>
		<li class="alternative<?php echo @$active['alternative']; ?>"><a href="<?php echo $pageUrl . 'alternative'; ?>"><em>alternative doctors</em></a></li>
	</ul>