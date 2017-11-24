<?php
/*
 * The template for project category pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

if (is_post_type('project')) {
	$groppe_project_style = cs_get_option('project_style');
	$groppe_project_column = cs_get_option('project_column');
	$groppe_project_no_space = cs_get_option('project_no_space');
	$groppe_project_pagination = cs_get_option('project_pagination');

	$groppe_project_style = $groppe_project_style ? $groppe_project_style : 'one';
	$groppe_project_column = $groppe_project_column ? $groppe_project_column : 'bpw-col-3';
	$groppe_project_no_space = $groppe_project_no_space ? 'bpw-no-gutter' : '';
}
?>

<div class="container grop-content-area">
	<div class="row">
		<?php if (is_post_type('project')) { ?>
		<!-- Project Start -->
	  <div class="grop-projects bpw-style-<?php echo esc_attr($groppe_project_style); ?> <?php echo esc_attr($groppe_project_column); ?> <?php echo esc_attr($groppe_project_no_space); ?>">
	    <div class="grid-sizer"></div>
	    <div class="gutter-sizer"></div>

			<?php
			/* Start the Loop */
			if (have_posts()) : while (have_posts()) : the_post();
					/* Template */
					get_template_part( 'layouts/project/project', $groppe_project_style );
				endwhile;
			else :
				get_template_part( 'layouts/post/content', 'none' );
			endif;
			wp_reset_postdata(); ?>

		</div><!-- Projects End -->
		<?php
			if ($groppe_project_pagination) {
			  groppe_paging_nav();
			}
		wp_reset_postdata();
		} // Post Type Project
		?>
	</div> <!-- Row -->
</div> <!-- Container -->

<?php
get_footer();