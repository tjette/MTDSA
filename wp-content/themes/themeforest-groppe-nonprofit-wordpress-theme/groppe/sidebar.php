<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$groppe_blog_widget = cs_get_option('blog_widget');
$groppe_single_blog_widget = cs_get_option('single_blog_widget');
$single_event_widget = cs_get_option('single_event_widget');
$project_single_blog_widget = cs_get_option('project_single_blog_widget');
$groppe_team_widget = cs_get_option('team_widget');
$single_causes_widget = cs_get_option('single_causes_widget');

if (is_page()) {
	// Page Layout Options
	$groppe_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
	if ($groppe_page_layout) {
		$page_sidebar_widget = $groppe_page_layout['page_sidebar_widget'];
	} else {
		$page_sidebar_widget = '';
	}
	if ($page_sidebar_widget) {
		$page_sidebar_widget = $page_sidebar_widget;
	} else {
		$page_sidebar_widget = cs_get_option('theme_sidebar_widget');
	}
}
?>

<div class="grop-fix  grop-float_right  grop-page-rgt_sidebar">
	<?php if (is_page() && $page_sidebar_widget) {
		if (is_active_sidebar($page_sidebar_widget)) {
			dynamic_sidebar($page_sidebar_widget);
		}
	} elseif (!is_page() && $groppe_blog_widget && !$groppe_single_blog_widget) {
		if (is_active_sidebar($groppe_blog_widget)) {
			dynamic_sidebar($groppe_blog_widget);
		}
	} elseif ($groppe_team_widget && is_singular('team')) {
		if (is_active_sidebar($groppe_team_widget)) {
			dynamic_sidebar($groppe_team_widget);
		}
	} elseif (is_single() && $groppe_single_blog_widget && !tribe_is_event() && !is_singular( 'project' )) {
		if (is_active_sidebar($groppe_single_blog_widget)) {
			dynamic_sidebar($groppe_single_blog_widget);
		}
	} elseif ( is_singular() && tribee_is_event() && $single_event_widget && !is_singular( 'project' )) {
		if (is_active_sidebar($single_event_widget)) {
			dynamic_sidebar($single_event_widget);
		}
	} elseif ( is_singular() && $project_single_blog_widget && is_singular( 'project' )) {
		if (is_active_sidebar($project_single_blog_widget)) {
			dynamic_sidebar($project_single_blog_widget);
		}
	} elseif ( is_singular() && $single_causes_widget && is_singular( 'give_forms' )) {
		if (is_active_sidebar($single_causes_widget)) {
			dynamic_sidebar($single_causes_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary -->