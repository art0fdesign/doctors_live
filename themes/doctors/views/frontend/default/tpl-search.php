<?php 
    $this->layout='tpl-search';
    // theme baseUrl
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;
?>

<div class="wrapper">

<!--================HEADER===============-->

<div class="header header3">
<?php include('_header.php'); ?>
</div>


<!--=====================BANNER==================-->

<div class="banner banner_home" style="height: 180px !important;">
    <div class="center" style="height:auto !important;">
        
        <?php echo @$block['banner']; ?>

    </div>
</div>
<!--================CONTENT===============-->

<div class="content">
<div class="center">

<div class="middle" style="min-height:0; width:770px; padding-right:20px;">

    <?php echo @$block['content']; ?>
    
</div>


<div class="right_content" style="min-height:0;">

    <?php echo @$block['sidebar-right']; ?>
    
</div>

</div>
</div>

<div class="push">&#32;</div>

</div> <!--END WRAPPER -->


<!--=============SLIDER LINE==============-->

<div class="sliderline">
    <div class="center">

        <?php echo @$block['slider-line']; ?>
    
    </div>
</div>


<!--================FOOTER===============-->


<div class="footer">
    <div class="center">

        <?php echo @$block['footer']; ?>

    </div>
</div>

<div class="copyright">
    <div class="center">
        <?php echo @$block['copyright']; ?>
    </div>
</div>

<?php include('_popup.php'); ?>

