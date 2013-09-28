<?php
$baseUrl = Yii::app()->theme->baseUrl;
$counter = 0;
?>
<h1 class="title">My Mails &amp; Notifications:</h1>
<!--
		<div class="searchlist topsearch mailsearch">
			<label>Sort by:</label>
			<select id="sort" class="styled" tabindex="200" name="sort">
				<option value="01">Most popular</option>
				<option value="02">Latest</option>
				<option value="03">Oldest</option>
			</select>
		</div>
-->
<ul class="results">

<?php if( count( $mails ) == 0 ): ?>
        <h2>No mails</h2>
<?php endif; ?>
<?php foreach( $mails as $item ){ $counter++; ?>
<?php // do preparation doctors data
$userModel = WebLogin::model()->findByPk( $item['user_id'] )->getRelationModel();
if( empty($userModel) || ! $userModel instanceof Doctor ){ // not found
    $locationText = ''; 
} else {
    $defLocation = DoctorsUserLocation::getDefaultLocation( $item['user_id'] );
    $locationText = ''; 
    if( !empty( $defLocation ) ) {
        //$locationText = $defLocation->location->facility . ' ';
        //$locationText .= $defLocation->location->address . ' ';
        $locationText .= $defLocation->location->city . ', ';
        $locationText .= $defLocation->location->state_code . ' ';
        //$locationText .= $defLocation->location->zip_code;
    } 
} // doctor preparation data
$href = $hrefListBase . '/' . $item['user_id'] . '/' . MyFunctions::parseForSEO( $item['full_name'] );
//$hrefCreate = $hrefCreateBase . '/' . $item['user_id'] . '/' . MyFunctions::parseForSEO( $item['full_name'] );
//MyFunctions::echoArray( $href, $_SERVER );
// prikaz item-a
$params = array(
    'classWhite'    => $counter & 1,
    'imgSrc'        => @$userModel->getThumbSrc('search'),
    'fullName'      => $userModel->getFullName(),
    'locationText'  => $locationText,
    'message'       => $item['message'],
    'createdDT'     => $item['created_dt'],
    'href'          => $href,
    'baseUrl'       => $baseUrl,
    'mailStatus'    => $item['mail_status'],
);
echo $this->render( '_mailing-item', $params, true );
/*
?>
	<li<?php if( $counter & 1 ) echo ' class="white"'; ?>>
        <img class="photo" alt=" " src="<?=@$userModel->getThumbSrc('search');?>" title="<?=$userModel->getFullName()?>" />
		<h2><?=$item['full_name']?>, <em><?=$locationText?></em></h2>
		<p class="mailshort"><?php echo MyFunctions::getShortText( CHtml::encode($item['message']), 100, '...' );?></p>
		<span class="maildate"><?php echo date( 'F jS Y, g:ia', strtotime( $item['created_dt'] ) ); ?></span>
		<a class="read_mail" href="<?=$href?>" id="user_<?=$item['user_id']?>">Read <?php echo $item['mail_count']==1? 'Message': $item['mail_count'] . ' Messages';?></a>
		<img src="<?=$baseUrl?>/img/mail_status_<?=$item['mail_status']?>.png" class="mail_photo" alt=" " />
	</li>
/**/
unset($userModel); } 
?>

</ul>

<?php if( $hrefPagination != '#' ): ?>
<div class="seemore"><a href="<?=$hrefPagination?>">Load More Conversations</a></div>
<?php endif; ?>
<div class="ajaxLoading mailAjax"><img src="<?=$baseUrl?>/img/ajax-loader.gif" /></div>
