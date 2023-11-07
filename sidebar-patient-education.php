<div id="patient-education" class="sidebar small-12 medium-12 large-3 cell" role="complementary">

    <?php if ( is_active_sidebar( 'patient-education' ) ) : ?>

        <div class="cell medium-12 large-3 sidebar-nav desktop" data-sticky-container>
            <div class="sticky navbox" data-sticky data-top-anchor="top-anchor:top" data-btm-anchor="bottom-anchor:bottom" data-options="marginTop:4;">
                <?php dynamic_sidebar( 'patient-education' ); ?>
            </div>
        </div>

        <div class="cell medium-12 large-3 sidebar-nav tablet" data-sticky-container>
            <div class="sticky navbox" data-options="marginTop:4;">
                <?php dynamic_sidebar( 'patient-education' ); ?>
            </div>
        </div>

    <?php endif; ?>

</div>
