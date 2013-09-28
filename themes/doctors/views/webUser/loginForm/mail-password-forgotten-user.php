<?php 
$html = @$settings['password-forgotten-user-message']['set_value'];
$html = str_replace( '{href}', $href, $html );
?>

<?php if( empty($html) ):?>
You can reset Your password by <a href="<?php echo $href;?>">clicking here</a>.
<?php else:?>
<?php echo $html;?>
<?php endif;?>
