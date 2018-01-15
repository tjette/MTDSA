<?php /* Template Name: Who We Are*/

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
        <div class='container'>
        <div class='whoWeAreHeader'>
          <h1>Who We Are</h1>
        </div>
        <div class='whoWeAreInfo'>
          <img class="alignright size-large wp-image-161" src="https://mtdsa.org/wp-content/uploads/2017/10/buddy-walk-2-buddy-walk-2-0045.jpg" alt="family" width="600" />The Montana Down Syndrome Association was formed in Missoula, Montana in the spring of 2014 by families and friends of persons with Down syndrome. We recognize the need for families to get together to learn from each other and provide support. We also wanted to make sure that families know about the resources, research, and services that are available for individuals with Down syndrome.
          <p class='ourMission'>Our mission is to honor and nurture the extraordinary lives of people with Down syndrome by advocating for them as well as providing educational, financial, social, and emotional support.</p>
          <p class='projectExploring'>Here are the projects we will be exploring:</p>
          <ul>
           	<li>Providing social events for people with Down syndrome.</li>
           	<li>Sharing books, toys, and other resources.</li>
           	<li>Providing resources to families with new babies with Down syndrome</li>
           	<li>Promoting Down syndrome awareness.</li>
           	<li>Conducting workshops on topics for children through adults.</li>
           	<li>Organizing networking opportunities for families.</li>
           	<li>Expanding an existing book club to other interested participants.</li>
           	<li>Being active in Down syndrome advocacy at the local, state, and national levels, which includes focusing on issues related to education, healthcare, research, employment and transition.</li>
           	<li>Expanding opportunities for life enrichment for adults with Down syndrome unique to individual needs and interests.</li>
          </ul>
        </div>
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
