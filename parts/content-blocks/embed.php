<?php
	$theEmbed = get_sub_field('embed');
    $theCaption = get_sub_field('caption');
?>
<div class="content-block embed">
    <div class="grid-container">
        <?php if ($theEmbed) : ?>
            <div class="embed flex-video">
                <?php echo $theEmbed; ?>
            </div>
        <?php endif; ?>
        <?php if ($theCaption): ?>
            <p class="caption">
                <?php echo $theCaption; ?>
            </p>
        <?php endif; ?>
    </div>
</div>
