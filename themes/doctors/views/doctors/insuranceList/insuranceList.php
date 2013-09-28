<h1 class="title">Health Insurance Companies:</h1>
    <div class="route general">
        <?php echo @$sets['insuranceList-intro']['set_value']; ?>
    </div>

        <?php foreach($models as $model): ?>
            <div class="insurance">
                <img alt="img1" src="<?php echo $model->loadLogo(); ?>" width="134px" height="70px">
                <h2><?php echo $model->name; ?></h2>
                <h4><?php echo $model->address; ?></h4>
                <p class="excerpt"><?php echo $model->description; ?></p>
            </div>
        <?php endforeach ?>

    <div class="clear"></div>