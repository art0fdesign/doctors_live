<span class="path">
    <a href="<?php echo $url['cat'];?>"><?php echo $model->category->cat_name; ?></a>&#32;&raquo;&#32;
    <?php if( is_object( $model->speciality ) ):?>
    <a href="<?php echo $url['spec'];?>"><?php echo @$model->speciality->spec_name; ?></a>&#32;&raquo;&#32;
    <?php endif;?>
    <?php if( is_object( $model->subspeciality ) ):?>
    <a href="<?php echo $url['sspec'];?>"><?php echo @$model->subspeciality->subspec_name;?></a>&#32;&raquo;&#32;
    <?php endif;?>
    <a href="<?php echo $url['name'];?>">Dr. <?php echo $model->fullName;?></a>
</span>
