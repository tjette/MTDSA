<?php /* Template Name: Buddy Walk */

get_header(); ?>
<div class="grop-page <?php echo esc_attr($groppe_layout_class .' '. $groppe_content_padding .' '. $groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<div class="<?php echo esc_attr( $groppe_column_class ); ?>">
		<?php
			while ( have_posts() ) : the_post();
				the_content();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
			  ?>
        <div class='buddyWalkHeader'>
          <h1>Buddy Walk</h1>
        </div>
        <div class='buddyWalkInfo'>
          <h3>Buddy Walk 2017</h3>
          <a href='http://5crowphoto.pass.us/buddy-walk-2-1/'><button class='btn btn-primary'>Photos</button></a>
        </div>

		<?php
			wp_reset_postdata();  // avoid errors further down the page
		?>
	</div><!-- Content Area -->
	<?php
	if ( $groppe_page_layout === 'left-sidebar' || $groppe_page_layout === 'right-sidebar') { get_sidebar(); }?>
</div>

<?php
if($above_footer_widget) {
	if (is_active_sidebar('above-footer')) {
	  dynamic_sidebar('above-footer');
	}
}
get_footer();
