<div class="side-bar">
    <?php if ( is_sidebar_active('primary_widget_area') ) : ?>
        <div class="widget-area">
            <ul class="widget-area-list">
                <?php dynamic_sidebar('primary_widget_area'); ?>
            </ul>
        </div>
    <?php endif; ?>       
</div>