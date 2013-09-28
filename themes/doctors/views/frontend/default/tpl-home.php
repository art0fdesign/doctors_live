<?php 
    $this->layout='tpl-home';
    // theme baseUrl
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;
    /** Test Purpose Only */
    $linkHome = Frontend::getPageData(1);
    /** Real links... uncomment this when widget will be defined... */
    //$linkHome = Frontend::getPageIDByWidget( 'someHomePageWidgetName' );
?>

<div class="wrapper">

<!--================HEADER===============-->

<div class="header header1">
<?php include('_header.php'); ?>
</div>


<!--=====================BANNER==================-->

<div class="banner banner_home">
    <div class="center">

        <img src="<?php echo $baseUrl; ?>/img/banner_index1.jpg" alt="BANNER" class="indexPic" />

        <?php echo @$block['banner-widget']; ?>
        
        <img src="<?php echo $baseUrl; ?>/img/banner_shadow.png" alt="" class="bannerShadow" />

        <?php echo @$block['banner']; ?>

    </div>
</div>


<!--================CONTENT===============-->

<div class="content" style="margin-top: 175px;">
<div class="center">

    <?php echo @$block['content-top']; ?>
    
    <div class="left_content1">

        <?php echo @$block['content-left']; ?>

    </div>

    <div class="right_content1">

        <?php echo @$block['content-right']; ?>

    </div>

</div>

<div class="textblock_big widget1">

    <div class="features"></div>

    <div class="center">

        <?php echo @$block['features']; ?>

    </div>
</div>

</div>

<div class="push">&#32;</div>

</div> <!--END WRAPPER -->


<!--=============SLIDER LINE==============

<div class="sliderline">
<div class="center">

<div id="left_scroll">
    <a href='javascript:slide("left");'><img src="img/arrow_left.png" alt="LEFT"></a>
</div>

<div id="carousel_inner">
    <ul id='carousel_ul'>
        <li><a href="#" class="logo1"></a></li>
        <li><a href="#" class="logo2"></a></li>
        <li><a href="#" class="logo3"></a></li>
        <li><a href="#" class="logo4"></a></li>
        <li><a href="#" class="logo5"></a></li>
        <li><a href="#" class="logo1"></a></li>
        <li><a href="#" class="logo2"></a></li>
    </ul>
</div>

<div id="right_scroll">
    <a href='javascript:slide("right");'><img src="img/arrow_right.png" alt="RIGHT"></a>
</div>

</div>
</div>-->


<!--================FOOTER===============-->


<div class="footer Fhome">
    <div class="center">

        <?php echo @$block['footer']; ?>

        <div class="links first">            
            <?php echo @$block['footer-links-first-title']; ?>
            <?php echo @$block['footer-links-first']; ?>
        </div>

        <div class="links second">            
            <?php echo @$block['footer-links-second-title']; ?>
            <?php echo @$block['footer-links-second']; ?>
        </div>

        <div class="links third">            
            <?php echo @$block['footer-links-third-title']; ?>
            <?php echo @$block['footer-links-third']; ?>
        </div>

        <div class="links fourth">            
            <?php echo @$block['footer-links-fourth-title']; ?>
            <?php echo @$block['footer-links-fourth']; ?>
        </div>

    </div>
</div>

<div class="copyright">
    <div class="center">
        <?php echo @$block['copyright']; ?>
    </div>
</div>


<?php include('_popup.php'); ?>

