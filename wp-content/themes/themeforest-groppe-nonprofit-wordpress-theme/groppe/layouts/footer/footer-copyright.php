<?php
	// Main Text
	$groppe_need_copyright = cs_get_option('need_copyright');
	$groppe_footer_copyright_layout = cs_get_option('footer_copyright_layout');

	if ($groppe_footer_copyright_layout === 'copyright-1') {
		$groppe_copyright_layout_class = 'col-sm-6';
		$groppe_copyright_seclayout_class = 'text-right';
	} elseif ($groppe_footer_copyright_layout === 'copyright-2') {
		$groppe_copyright_layout_class = 'col-sm-6 pull-right text-right';
		$groppe_copyright_seclayout_class = 'text-left';
	} elseif ($groppe_footer_copyright_layout === 'copyright-3') {
		$groppe_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$groppe_copyright_layout_class = '';
		$groppe_copyright_seclayout_class = '';
	}

	if (isset($groppe_need_copyright)) {
?>

<!-- Copyright Bar -->
<div class="grop-footer-bottom">
	<div class="container">
		<div class="row  grop-fix">
			<div class="grop-copyright <?php echo esc_attr($groppe_copyright_layout_class); ?>">
				<?php
					$groppe_copyright_text = cs_get_option('copyright_text');
					if ($groppe_copyright_text) {
						echo '<p class="grop-copyright">'. do_shortcode($groppe_copyright_text) .'</p>';
					} else {
						echo '
									<div class="mtdsaFooter">
										<a class="mtdsaFooterItem" href="https://twitter.com/MontanaDSA" ><i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>
										<a class="mtdsaFooterItem" href="https://www.facebook.com/mtdownsyndromeassociation/" ><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
										<a class="mtdsaFooterItem" href="mailto:philip@mtdsa.org"><i class="fa fa-envelope-o fa-3x" alt="Contact Us" aria-hidden="true"></i></a>
									</div>';
					}
				?>
			</div>
			<?php if ($groppe_footer_copyright_layout != 'copyright-3') { ?>
			<div class="col-sm-6 copy-secondary <?php echo esc_attr($groppe_copyright_seclayout_class); ?>">
				<?php
					$groppe_secondary_text = cs_get_option('secondary_text');
					echo do_shortcode($groppe_secondary_text);
				?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Copyright Bar -->
<?php }
