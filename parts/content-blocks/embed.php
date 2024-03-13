<?php
	$theEmbed = get_sub_field('embed');
    $theCaption = get_sub_field('caption');
?>
<div class="content-block embed">
    <div class="grid-container">
        <div class="embed flex-video">
            <?php echo $theEmbed ?>
        </div>
        <p class="caption"><?php echo $theCaption ?></p>
    </div>
</div>