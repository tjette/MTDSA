<?php
/* Template Name: Resources */

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
        <div class='resourcesHeader'>
          <h1>RESOURCES</h1>
        </div>
        <div class='financialInfo'>
          <h3>Financial Assistance Application</h3>
          <a href='https://mtdsa.org/wp-content/uploads/2017/11/MTDSA-Financial-Assistance-Application.pdf'><button class='btn btn-primary'>Application</button></a>
          <p> Please send application to Montana Down Syndrome Association, PO Box 16717, Missoula, MT 59808</p>
          <p> If you have any questions, email Philip at <a mailto='Philip@mtdsa.org'</a>Philip@mtdsa.org</p>
        </div>
        <div class='dsAssociations'>
          <div class='dsAssociationItem'>
            <h3>Down syndrome Associations</h3>
            <p>Chances are you know an individual with Down syndrome. Maybe a child in school, a neighbor, or someone you see regularly around town. One in every 691 babies in the the United States is born with Down syndrome, making it the most common genetic condition. Approximately 400,000 Americans have Down syndrome and about 6,000 babies with Down syndrome are born in the United States each year.
            Down syndrome is a genetic condition that occurs when an individual has a full or partial extra copy of chromosome 21. That's all it takes to affect the individual's health, development, and physical appearance. Every single person with Down syndrome is different. Some go to college and others struggle to communicate or need help being independent. The most common physical characteristics of Down syndrome are low muscle tone, small stature, an upward slant to the eyes, and a single deep crease across the center of the palm. Although it may seem like individuals with Down syndrome look similar, everyone is different and we encourage you to think of Down syndrome as just one piece of the total person. Taking the time to learn about Down syndrome is important, but it's even more important to learn about the individual person so that you can celebrate their unique contributions to our community.
            Check out these resources to learn more:</p>
          </div>
          <div class='dsAssociationItem'>
            <h3><a href="http://www.ndss.org/" target="_blank">National Down Syndrome Society</a></h3>
            The mission of the National Down Syndrome Society is to be the national advocate for the value, acceptance and inclusion of people with Down syndrome. The NDSS website provides basic information about Down syndrome as well as specific resources for parents.
            <a href='http://www.ndss.org/'><button class='btn btn-success'>Find Out More</button></a>
          </div>
          <div class='dsAssociationItem'>
            <h3><a href="http://www.globaldownsyndrome.org/" target="_blank">Global Down Syndrome Foundation</a></h3>
            The Global Down Syndrome Foundation is a public non-profit 501(c)(3) dedicated to significantly improving the lives of people with Down syndrome through research, medical care, Education and Advocacy. One of their programs provides educational grants to Down syndrome associations throughout the country. In 2014, the Montana Down Syndrome Association received a grant to create a lending library and provide workshops in the Missoula community.
            <a href='http://www.globaldownsyndrome.org/'><button class='btn btn-success'>Find Out More</button></a>
          </div>
          <div class='dsAssociationItem'>
            <h3><a href="http://www.ndsccenter.org/" target="_blank">National Down Syndrome Congress</a></h3>
            The National Down Syndrome Congress is the country’s oldest national organization for people with Down syndrome, their families, and the professionals who work with them. They provide information, advocacy and support concerning all aspects of life for individuals with Down syndrome.
            <a href='http://www.ndsccenter.org/'><button class='btn btn-success'>Find Out More</button></a>
          </div>
          <div class='dsAssociationItem'>
            <h3><a href="http://www.dream-mt.org/" target="_blank">D.R.E.A.M.</a></h3>
            Bozeman, MT. Buddy Walk date: October 3, 2015. Gallatin Regional Park 11am.
            <a href='http://www.dream-mt.org/'><button class='btn btn-success'>Find Out More</button></a>
          </div>
          <div class='dsAssociationItem'>
            <h3>Yes Kids</h3>
            Billings,MT. Buddy Walk date: October 3, 2015.
          </div>
          <div class='dsAssociationItem'>
          <h3><a href="https://sites.google.com/site/underthebigskydsparentgroup/" target="_blank">Under the Big Sky Buddy Walk</a></h3>
          Great Falls, MT. Buddy Walk date: Oct 3, 2015.
          </div>
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
