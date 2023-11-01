<?php $bg = get_sub_field('background_color'); ?>

<div class="content-slider content-block <?php echo $bg ?>">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?php if( have_rows('slide') ): ?>
        <?php while( have_rows('slide') ) : the_row(); 
          $slideImage = get_sub_field('image');
        ?>
          <div class="swiper-slide">
			<div class="slide-image">
              <img alt="<?php echo esc_attr($slideImage['title']); ?>" 
                   src="<?php echo esc_url($slideImage['sizes']['medium']); ?>" 
                   srcset="<?php echo esc_url($slideImage['sizes']['medium_large']) . ' ' . esc_attr($slideImage['sizes']['medium_large-width']) . 'w, ' . 
						esc_url($slideImage['sizes']['medium']) . ' ' . esc_attr($slideImage['sizes']['medium-width']) . 'w, ' . 
						esc_url($slideImage['sizes']['thumbnail']) . ' ' . esc_attr($slideImage['sizes']['thumbnail-width']) . 'w'; ?>">
			</div>
		</div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
	<div class="swiper-pagination"></div>
	</div>
  </div>
</div>

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
