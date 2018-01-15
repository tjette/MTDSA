<?php /* Template Name: Home Page */

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
        <div class='homeContainer'>
          <h1 class='homeHeader'>MTDSA</h1>
          <h3 class='mission'>We envision a world in which every individual with Down syndrome has the necessary tools and meaningful opportunities to be an active member of the community.</h3>
        </div>
        <div class='mtdsaDescription'>
          <p>The Montana Down Syndrome Association was formed in Missoula, Montana in the spring of 2014 by families and friends of persons with Down syndrome. We recognize the need for families to get together to learn from each other and provide support. We also wanted to make sure that families know about the resources, research, and services that are available for individuals with Down syndrome.
Our mission is to honor and nurture the extraordinary lives of people with Down syndrome by advocating for them as well as providing educational, financial, social, and emotional support.
MTDSA is a 501(c)(3) Organization: Tax ID#: 47-1115039</p>
        </div>
        <div class='resourceContainer'>
          <h1>RESOURCES</h1>
        </div>
        <div class='resources'>
          <div class='resourceInfo'>
            <i class="fa fa-money fa-5x resourceInfoItem" aria-hidden="true"></i>
              <a href='/wordpress/resources'><button class='btn btn-primary resourceInfoItem'>Financial Assistance</button></a>
          </div>
          <div class='resourceInfo'>
            <i class="fa fa-sitemap fa-5x resourceInfoItem" aria-hidden="true"></i>
            <a href='/wordpress/resources'><button class='btn btn-primary resourceInfoItem'>Down syndrome Associations</button></a>
          </div>
        </div>
        <div class='boardMemberHeader'>
          <h1>BOARD MEMBERS</h1>
        </div>
        <div class='boardMembers'>
          <div class='boardMember'>
            <img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/11/philipBioPic.png' />
            <h5>Philip L. Yasenak, President</h5>
          </div>
          <div class='boardMember'>
            <img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/11/rachelleJetteBioPic.jpg' />
            <h5>Rachelle Jette, Vice President</h5>
          </div>
          <div class='boardMember'>
            <img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/11/Professional-Pic-Sam-e1510093437968.jpg' />
            <h5>Sam Foshag, Treasurer</h5>
          </div>
					<div class='boardMember'>
            <img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/12/431918_755037177726_751259633_n-e1513651811840.jpg' />
            <h5>Erika Surmi, Secretary</h5>
          </div>
					<div class='boardMember'>
						<img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/11/karenBaileyBioPic.png' />
						<h5>Karen Bailey</h5>
					</div>
          <div class='boardMember'>
            <img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/11/katieBioPic.jpg' />
            <h5>Katie Seaman</h5>
          </div>
          <div class='boardMember'>
            <img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/11/erinBioPic.jpg' />
            <h5>Erin Thorsen</h5>
          </div>
          <div class='boardMember'>
            <img class='boardMemberImage'src='https://mtdsa.org/wp-content/uploads/2017/11/jessieCrowleyBioPic.png' />
            <h5>Jessie Crowley</h5>
          </div>
          <div class='boardMember'>
            <img class='boardMemberImage' src='https://mtdsa.org/wp-content/uploads/2017/11/kelsey-Lexar-0005-e1511547216908.jpg' />
            <h5>Kelsey Adcock</h5>
          </div>
        </div>
        <div class=''>
          <div class='donateHeader'>
            <h1>DONATE</h1>
          </div>
          <h3 class='helpDonate'>Help us with a donation</h3>
          <a href='/wordpress/donate'><button class='btn btn-primary donateButton'>Click here to donate</button></a>
        </div>

    <div class='sponsorSlider'>
      <div class='mtdsaSponsors'>
        <h1>MTDSA SPONSORS</h1>
      </div>
    <?php
    echo do_shortcode('[smartslider3 slider=3]');
    ?>
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
