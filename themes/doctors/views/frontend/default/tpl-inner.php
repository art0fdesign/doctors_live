<?php 
    $this->layout='tpl-inner';
    // theme baseUrl
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;
?>

<div class="wrapper">

<!--================HEADER===============-->

<div class="header">
<?php include('_header.php'); ?>
</div>


<!--================TOP NAVIGATION===============-->

<div class="center">
    <div class="nav">

        <div class="leftnav">&#32;</div>

        <?php echo @$block['top-navigation']; ?>

        <div class="rightnav">&#32;</div>

    </div>
</div>

<!--================CONTENT===============-->

<div class="content">
<div class="center">


<div class="left_content">

    <?php echo @$block['sidebar-left']; ?>
    
</div>


<div class="middle">

    <?php echo @$block['content']; ?>
    
</div>



<div class="right_content">

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

