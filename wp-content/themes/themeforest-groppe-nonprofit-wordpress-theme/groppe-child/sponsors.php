<?php
/* Template Name: Sponsors */

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
        <div class="sponsorContainer">
					<h4 class="widgettitle">buddywalk <span class="accent-color">best buddy sponsors</span></h4>

          <div class='pureWestContainer'>
            <a href="http://purewestrealestate.com/agents/detail/devinkhoury" target="_blank"><img class='pureWestImage' src="https://mtdsa.org/wp-content/uploads/2017/10/pureWest-e1509213058743.jpg"></a>
          </div>
					<div class="logoSponsorContainer">

              <div class='logoSponsorItem'>
                <a href="http://missoulavetclinic.com/" target="_blank">Missoula Vet Clinic<img class='logoSponsorImage' src="https://mtdsa.org/wp-content/uploads/2017/11/Missoula-vet-clinic-300x154.jpg"></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="http://draughtworksbrewery.com" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/Draught-Works-Logo-e1509213297137.png'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="http://northwesternenergy.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/NWE-e1509213286759.png'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="https://www.citizensalliancebank.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/Citizens-Alliance-HZ-Blk-e1509213230524.jpg'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="https://www.stockmanbank.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/Stockman-Logo-2016-Black-Stacked-FDIC-e1509213222258.jpg'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="http://www.outdoorsmenchurch.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/Outdoorsmen-Church-e1509213211636.jpg'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="http://yfcmt.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/Youth-for-Christ-e1509213201356.jpg'></a>
              </div>
              <div class='logoSponsorItem'>
                <img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/Charity-Schoemer-Photography-e1509213189791.png'>
              </div>
              <div class='logoSponsorItem'>
                <a href="https://fuelmtmedia.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/Fuel-NewLogo-e1509213176787.png'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="http://963theblaze.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/KBAZ-Official-e1509213151371.png'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="http://1075zoofm.com/" target='_blank'><img class='logoSponsorItemImage' src='https://mtdsa.org/wp-content/uploads/2017/10/KENR-Official-e1509213167501.png'></a>
              </div>
              <div class='logoSponsorItem'>
                <a href="http://kyssfm.com/" target="_blank"><img class='logoSponsorItemImage' src="https://mtdsa.org/wp-content/uploads/2017/11/KYSS-FM-NEW-300x275.png"></a>
              </div>
				  </div>
              <div class='goodBuddyContainer'>
                <h4 class="widgettitle">buddywalk <span class="accent-color">good buddy sponsors</span></h4>
    						<ul class="sponsor_list">
    							<li>Summit Beverage</li>
    							<li>Montana Independant Bankers</li>
    							<li>Montana Neuropsychological Associaties</li>
    							<li>Wipfli CPAs and Consultants</li>
    							<li>First Security Bank</li>
    							<li>Good Food Store</li>
    							<li>Rick's Auto Body</li>
    							<li>Montana Pediatric Dentistry</li>
    						</ul>

              </div>
              <div class='littleBuddyContainer'>
    						<h4 class="widgettitle" style="margin-top:24px;">buddywalk <span class="accent-color">little buddy sponsors</span></h4>
    						<ul class="sponsor_list">
    							<li>Grizzly Sports & Family Chiropractic</li>
    							<li>John R. Velk Law Offices</li>
    							<li>The Muffler Bandit</li>
    							<li>Deer Lodge Rotary</li>
    							<li>James Brown Law Office</li>
    							<li>Russ's Body and Paint</li>
    							<li>Three Rivers Bank</li>
    							<li>Mountain Pearl Photography</li>
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
