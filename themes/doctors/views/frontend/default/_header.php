<?php
/** selected city name from cookie */
$headerCity = isset(Yii::app()->request->cookies['doctors_header_city']) ? Yii::app()->request->cookies['doctors_header_city']->value : '';
$dashBaseUrl = Yii::app()->baseUrl . '/';
if(Yii::app()->webuser->isGuest){ // not logged, prepare signup links
    $pageID = Frontend::getPageIDByWidget( 'doctorRegistrationWizzard' );
    $signupDoctorUrl = $dashBaseUrl . Frontend::getPageData( $pageID );
    $pageID = Frontend::getPageIDByWidget( 'personalRegistration' );
    $signupPersonalUrl = $dashBaseUrl . Frontend::getPageData( $pageID );
} else { // logged; prepare account-profile-dashboard links
    if( Yii::app()->webuser->relation == 'doctor' ){
        $pageID = Frontend::getPageIDByWidget( 'doctorProfile');
        $profileUrlData = Frontend::getPageData( $pageID );
        $accountUrl = $dashBaseUrl . $profileUrlData . '/account';
        $passwordUrl = $dashBaseUrl . $profileUrlData . '/password';
        $profileUrl = $dashBaseUrl . $profileUrlData . '/profile';
    } else {
        $pageID = Frontend::getPageIDByWidget( 'userProfile');
        $profileUrlData = Frontend::getPageData( $pageID );
        $accountUrl = $dashBaseUrl . $profileUrlData . '/account';    
        $passwordUrl = $dashBaseUrl . $profileUrlData . '/password';    
        $profileUrl = $dashBaseUrl . $profileUrlData . '/profile';    
    }
    $pageID = Frontend::getHomePageID();
    $logoutUrl = $dashBaseUrl . Frontend::getPageData( $pageID ) . '/logout';
}
$url = '#';
/** PopUp login manipulation */
$themeUrl = Yii::app()->theme->baseUrl;
Yii::app()->clientScript->registerScriptFile($themeUrl.'/js/template/jquery.tmpl.min.js');
Yii::app()->clientScript->registerScriptFile($themeUrl.'/js/popup/css-pop.js');

?>
    <div class="center">

        <div class="logo">
            <a href="<?php echo @$block['url-home']; ?>" title="...back to home page">&#32;</a>
            <span><?php echo $headerCity; ?></span>
        </div>
<?php //MyFunctions::echoArray(Yii::app()->webuser->isGuest, Yii::app()->webuser->model->attributes);?>
<?php if( Yii::app()->webuser->isGuest ): ?>
<?php /* NOT LOGGED; render signup/login options */ ?>
    <ul class="headmenu">
        <li><a>Login</a></li>
        <li class="separator">&nbsp;</li>
        <li><a>SignUp</a></li>
    </ul>
<?php else: ?>
<?php /* LOGGED, prikaz dashboard-a sa logout linkom */ ?>
<div class="top">
	<div class="loged">
        <span><?php echo Yii::app()->webuser->model->user_name; ?></span>
    </div>
    <div class="dash_div">        
		<ul class="dash_ul">
            <li><a href="<?=$accountUrl?>">My Account</a></li>
            <li><a href="<?=$profileUrl?>">My Profile</a></li>			
			<li><a href="#">Advertise</a></li>
			<li><a href="<?=$logoutUrl?>">LogOut</a></li>			
			<li><a href="#">Help</a></li>			
		</ul>
	</div>
</div>
<?php endif; ?>

        <ul class="topmenu">
            <li class="info_center"><a>Info Center</a>
                <div class="info_block">
                    <div class="block">
                        <h3>HEALTH INFORMATION</h3>
                        <?php echo @$block['health-menu']; ?>
                    </div>
                </div>
            </li>
            
            <li class="separator">&#32;</li>
            
            <li class="info_center"><a>About us</a>
                <div class="info_block">
                    <div class="block">
                        <h3>ABOUT US</h3>
                        <?php echo @$block['about-menu']; ?>
                    </div>
                </div>
            </li>
            
            <li class="separator">&#32;</li>
            
            <li class="info_center"><a>Help &amp; Support</a>
                <div class="info_block">
                    <div class="block">
                        <h3>HELP &amp; SUPPORT</h3>
                        <?php echo @$block['help-support-menu']; ?>
                    </div>
                </div>
            </li>
            
        </ul>

    </div>
