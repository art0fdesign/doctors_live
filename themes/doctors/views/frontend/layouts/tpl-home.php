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
    <!--<link href="favicon.ico" rel="shortcut icon">-->
    <link href="<?php echo $baseUrl; ?>/css/jquery-ui-1.8.23.custom.css" rel="stylesheet"  />
    <link href="<?php echo $baseUrl; ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>/css/css_browser_selector.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>/css/carousel.css" rel="stylesheet">

    <link href="<?php echo $baseUrl; ?>/js/fader/css/plusslider.css" rel="stylesheet">

    <title><?php echo $this->blocks['title']; ?></title>

    <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jquery-ui-1.9.1.custom.js"></script>-->
    <script src="<?php echo $baseUrl; ?>/js/browser_selector/css_browser_selector.js"></script>
    <script src="<?php echo $baseUrl; ?>/js/selectform/form_element.js"></script>

    <script src="<?php echo $baseUrl; ?>/js/rangeslider/selectToUISlider.jQuery.js"></script>

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/js/rangeslider/css/redmond/jquery-ui-1.7.1.custom.css">
    <link rel="Stylesheet" href="<?php echo $baseUrl; ?>/js/rangeslider/css/ui.slider.extras.css">

    <script src="<?php echo $baseUrl; ?>/js/fader/jquery.plusslider.js"></script>
    <script src="<?php echo $baseUrl; ?>/js/fader/jquery.easing.1.3.js"></script>
    <script src="<?php echo $baseUrl; ?>/js/fader/plusslider-controls.js"></script>

    <script src="<?php echo $baseUrl; ?>/js/tabber/tabber.js"></script>

</head>

<body>


<?php echo $content; ?>

<script type="text/javascript">tabberAutomatic(tabberOptions);</script>
</body>

</html>