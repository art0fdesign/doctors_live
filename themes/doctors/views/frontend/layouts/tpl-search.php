<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $this->blocks['description']; ?>">
    <meta name="keywords" content="<?php echo $this->blocks['keywords']; ?>">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;
    ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>

    <title><?php echo $this->blocks['title']; ?></title>

    <!--<link href="favicon.ico" rel="shortcut icon">-->
    <link href="<?php echo $baseUrl; ?>/css/jquery-ui-1.8.23.custom.css" rel="stylesheet"  />
    <link href="<?php echo $baseUrl; ?>/css/main.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/css/css_browser_selector.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/css/carousel.css" rel="stylesheet" />

    <link href="<?php echo $baseUrl; ?>/js/fader/css/plusslider.css" rel="stylesheet" />

    <script src="<?php echo $baseUrl; ?>/js/browser_selector/css_browser_selector.js"></script>
    <script src="<?php echo $baseUrl; ?>/js/selectform/form_element.js"></script>

    <script src="<?php echo $baseUrl; ?>/js/rangeslider/selectToUISlider.jQuery.js"></script>

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/js/rangeslider/css/redmond/jquery-ui-1.7.1.custom.css" />
    <link rel="Stylesheet" href="<?php echo $baseUrl; ?>/js/rangeslider/css/ui.slider.extras.css" />

    <script src="<?php echo $baseUrl; ?>/js/tabber/tabber.js"></script>


</head>

<body>


<?php echo $content; ?>


<!--================CAROUSEL SCRIPT===============-->

<script src="<?php echo $baseUrl; ?>/js/carousel/carousel.js"></script>

<script type="text/javascript">
/*<![CDATA[*/
    $(document).ready(function() {
        var content = parseInt( $('div.content').css('height') );
        var helpdesk = parseInt( $('div.helpdesk').css('height') );
        var affiliation = parseInt( $('div.affiliation').css('height') );
        //
        var advertisement  = content - 90;
        if( ! isNaN( helpdesk ) ) advertisement -= helpdesk + 30;
        if( ! isNaN( affiliation ) ) advertisement -= affiliation + 35;
        //
        $('div.red_menu:not([fixed])').css('min-height', ( content - 90 ) + 'px');
        $('div.advertisment').css('min-height', advertisement + 'px');
    });
/*]]>*/
</script>

<script type="text/javascript">
/*<![CDATA[*/
    tabberAutomatic(tabberOptions);
/*]]>*/
</script>
</body>

</html>