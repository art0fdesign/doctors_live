<?php
    $movieSrc = $youtube;
    $movieSrc .= $src;
    $movieSrc .= '?version=' . $version;
    $movieSrc .= '&amp;hl=' . $hl;
?>
<object 
        width="<?php echo $width; ?>" 
        height="<?php echo $height; ?>">
    <param name="movie" value="<?php echo $movieSrc; ?>"></param>
    <param name="allowFullScreen" value="true"></param>
    <param name="allowscriptaccess" value="always"></param>
    <embed 
        src="<?php echo $movieSrc; ?>" 
        type="application/x-shockwave-flash" 
        width="<?php echo $width; ?>" 
        height="<?php echo $height; ?>" 
        allowscriptaccess="always" allowfullscreen="true">
    </embed>
</object>
