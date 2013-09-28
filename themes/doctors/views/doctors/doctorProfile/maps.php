
<?php echo $breadcrumb?>	

<h1 class="title">Locations and Directions:</h1>

<div class="map">
<?php echo @$gmap;?>
</div>	

<?php foreach( $maps as $item ){ ?> 
<?php $mapItem = $item->location;?>
<div class="route">	

    <h1 class="title"><?php echo $mapItem->facility; ?></h1>

    <h2><?php echo $mapItem->address . ', ' . $mapItem->city . ' ' . $mapItem->zip_code; ?></h2>

<?php foreach( $item->directions as $direction ){ ?>
    <h3><?php echo $direction->direction;?></h3>

    <p>
    <?php echo $direction->description;?>
    </p>

<?php } ?>

</div>
<?php } ?>
