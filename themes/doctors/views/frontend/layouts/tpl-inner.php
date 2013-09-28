<?php
if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $this->blocks['description']; ?>">
    <meta name="keywords" content="<?php echo $this->blocks['keywords']; ?>">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--<link href="favicon.ico" rel="shortcut icon">-->
    <link href="<?php echo $baseUrl; ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>/css/css_browser_selector.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>/css/carousel.css" rel="stylesheet">
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>

    <title><?php echo $this->blocks['title']; ?></title>

    <link href="<?php echo $baseUrl; ?>/css/jquery-ui-1.8.23.custom.css" rel="stylesheet"  />
    <script src="<?php echo $baseUrl; ?>/js/browser_selector/css_browser_selector.js"></script>
    <script src="<?php echo $baseUrl; ?>/js/selectform/form_element.js"></script>
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/popup/jquery.bpopup.min.js"></script>

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


        /*
        var msg = 'content: ' + content + "\n";
        msg += 'helpdesk: ' + helpdesk + "\n";
        msg += 'affiliation: ' + affiliation + "\n";
        msg += 'advertisement: ' + advertisement + "\n";
        //var msg = $('div.red_menu').css('min-height');
        alert( msg );
        /**/
    });
/*]]>*/
</script>


</body>

</html>